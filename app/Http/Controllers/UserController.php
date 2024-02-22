<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\DestroyUserRequest;
use App\Http\Requests\User\PasswordUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Throwable;

class UserController extends Controller
{
    /**
     * @param User $user
     * @return Application|Factory|View
     */
    public function show(User $user): View|Factory|Application
    {
        return view("user.show",[
            "user" => $user
        ]);
    }

    /**
     * @param UpdateUserRequest $request
     * @param User $user
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UpdateUserRequest $request, User $user): Redirector|RedirectResponse|Application
    {
        try
        {
            $user->update([
                "name" => $request->name,
                "email" => $request->email,
            ]);
            return redirect(route("user.show",Auth::id()))->with("success","Datos Actualizados");
        }
        catch (Throwable $throwable)
        {
            Log::channel("error_system")->error("UPDATE USER CONTROLLER : ".$throwable->getMessage());
            return redirect(route("user.show",Auth::id()))->with("error","Error al Actualizar los datos");
        }
    }

    /**
     * @param PasswordUserRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function password(PasswordUserRequest $request): Redirector|RedirectResponse|Application
    {
        try
        {
            $user = User::findOrFail(Auth::id());;
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect(route("user.show",Auth::id()))->with("success","Contraseña Actualizada");
        }
        catch (Throwable $throwable)
        {
            Log::channel("error_system")->error("PASSWORD USER CONTROLLER : ".$throwable->getMessage());
            return redirect(route("user.show",Auth::id()))->with("error","Error al Actualizar la Contraseña");
        }
    }

    /**
     * @param DestroyUserRequest $request
     * @param User $user
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(DestroyUserRequest $request , User $user): Redirector|RedirectResponse|Application
    {
        try
        {
            Auth::logout();
            $user->delete();
            session()->invalidate();
            session()->regenerate();
            return redirect(route("/"))->with("success","Cuanta eliminada");
        }
        catch (Throwable $throwable)
        {
            Log::channel("error_system")->error("DESTROY USER CONTROLLER : ".$throwable->getMessage());
            return redirect(route("user.show",Auth::id()))->with("error","Error al Eliminando la Cuenta");
        }
    }
}
