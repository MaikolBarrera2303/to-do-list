<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterAuthRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Throwable;

class RegisterController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function register(): View|Factory|Application
    {
        return view("auth.register");
    }

    public function store(RegisterAuthRequest $request)
    {
        try
        {
           $user = User::create([
               "name" => $request->name,
               "email" => $request->email,
               "password" => $request->password,
           ]);
           Auth::login($user);
           return redirect(route("task.index"));
        }
        catch (Throwable $throwable)
        {
            Log::channel("error_system")->error("STORE REGISTER CONTROLLER : ".$throwable->getMessage());
            return redirect(route("register"))->with("error","Error Registrando el usuario");
        }
    }
}
