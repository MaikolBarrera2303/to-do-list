<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginAuthRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Throwable;

class AuthenticationController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view("auth.login");
    }

    /**
     * @param LoginAuthRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function login(LoginAuthRequest $request): Redirector|RedirectResponse|Application
    {
        try
        {
            $user = User::where("email",$request->email)->first();
            if ($user && Hash::check($request->password,$user->password))
            {
                Auth::login($user,$request->boolean("remember"));
                return redirect(route("task.index"));
            }
            return redirect(route("/"))->with("error","Email o Contraseña Incorrectas");
        }
        catch (Throwable $throwable)
        {
            Log::channel("error_system")->error("LOGIN AUTH CONTROLLER : ".$throwable->getMessage());
            return redirect(route("/"))->with("error","Error Inicio Sesion");
        }
    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function logout(): Redirector|RedirectResponse|Application
    {
        try
        {
            Auth::logout();
            session()->invalidate();
            session()->regenerate();
            return redirect(route("/"));
        }
        catch (Throwable $throwable)
        {
            Log::channel("error_system")->error("LOGOUT AUTH CONTROLLER : ".$throwable->getMessage());
            return redirect(route("task.index"))->with("error","Error Cerrando Sesion");
        }
    }

}
