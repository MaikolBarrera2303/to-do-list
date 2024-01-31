<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginAuthRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view("auth.login");
    }
    public function login(LoginAuthRequest $request)
    {
        dd($request);
    }
}
