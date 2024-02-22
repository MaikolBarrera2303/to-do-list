<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\TaskRequest;
use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Throwable;

class TaskController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view("task.index",[
            "tasks" => Task::where("user_id",Auth::id())->get()
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function bin(): View|Factory|Application
    {
        return view("task.bin",[
        "tasks" => Task::onlyTrashed()->where("user_id",Auth::id())->get()
    ]);
    }

    /**
     * @param TaskRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(TaskRequest $request): Redirector|RedirectResponse|Application
    {
        try
        {
            Task::create([
                "title" => strtoupper($request->title),
                "description" => $request->description,
                "state" => false,
                "user_id" => Auth::id(),
            ]);
            return  redirect(route("task.index"))->with("success","Tarea ". $request->title ." creada");
        }
        catch (Throwable $throwable)
        {
            Log::channel("error_system")->error("STORE TASK CONTROLLER : ".$throwable->getMessage());
            return redirect(route("task.index"))->with("error","Error al Crear la Tarea");
        }
    }

    /**
     * @param TaskRequest $request
     * @param Task $task
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request, Task $task): Redirector|RedirectResponse|Application
    {
        try
        {
            $title = $request->title ?? $task->title;
            $task->update([
                "title" => strtoupper($title),
                "description" => $request->description ?? $task->description,
                "state" => $request->state ?? $task->state,
            ]);
            return  redirect(route("task.index"))->with("success","Tarea ". $title ." actualizada");
        }
        catch (Throwable $throwable)
        {
            Log::channel("error_system")->error("UPDATE TASK CONTROLLER : ".$throwable->getMessage());
            return redirect(route("task.index"))->with("error","Error al Actualizar la Tarea");
        }
    }

    /**
     * @param Task $task
     * @return Application|RedirectResponse|Redirector
     */
    public function restore(Task $task): Redirector|RedirectResponse|Application
    {
        try
        {
            $task->restore();
            return redirect(route("task.index"))->with("success","Tarea ". $task->title ." Restaurada");
        }
        catch (Throwable $throwable)
        {
            Log::channel("error_system")->error("RESTORE TASK CONTROLLER : ".$throwable->getMessage());
            return redirect(route("task.index"))->with("error","Error al Restaurar la Tarea");
        }
    }

    /**
     * @param Task $task
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(Task $task): Redirector|RedirectResponse|Application
    {
        try
        {
            $task->delete();
            return redirect(route("task.index"))->with("success","Tarea ". $task->title ." Eliminada");
        }
        catch (Throwable $throwable)
        {
            Log::channel("error_system")->error("DESTROY TASK CONTROLLER : ".$throwable->getMessage());
            return redirect(route("task.index"))->with("error","Error al Eliminar la Tarea");
        }
    }

    /**
     * @param Task $task
     * @return Application|RedirectResponse|Redirector
     */
    public function forceDelete(Task $task): Redirector|RedirectResponse|Application
    {
        try
        {
            $task->forceDelete();
            return redirect(route("task.bin"))->with("success","Tarea ". $task->title ." Eliminada definitivamente");
        }
        catch (Throwable $throwable)
        {
            Log::channel("error_system")->error("FORCE-DESTROY TASK CONTROLLER : ".$throwable->getMessage());
            return redirect(route("task.index"))->with("error","Error al Eliminar la Tarea");
        }
    }

}
