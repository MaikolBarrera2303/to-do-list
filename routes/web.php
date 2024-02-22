<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AuthenticationController::class)->group(function (){
    Route::get("/","index")->name("/");
    Route::post("login","login")->name("login");
    Route::post("logout","logout")->name("logout");
});

Route::controller(RegisterController::class)->group(function (){
    Route::get("register","register")->name("register");
    Route::post("register/store","store")->name("register.store");
});

Route::middleware("authentication")->group(function (){
    Route::resource("task",TaskController::class)->except("show","edit","create");
    Route::controller(TaskController::class)->group(function (){
        Route::get("task-bin","bin")->name("task.bin");
        Route::post("task/restore/{task}","restore")
            ->withTrashed()->name("task.restore");
        Route::delete("task/forceDelete/{task}","forceDelete")
            ->withTrashed()->name("task.forceDelete");
    });

    Route::resource("user",UserController::class);
    Route::patch("user/password/{user}",[UserController::class,"password"])->name("user.password");
});


