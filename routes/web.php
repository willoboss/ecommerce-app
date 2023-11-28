<?php

use App\Http\Controllers\adminController;
use App\Models\admin;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Admin

Route::prefix("admin")->group(function () {
    Route::get("/login",[adminController::class,"index"])->name("login_form");
    Route::get("/register",[adminController::class,"Register"])->name("admin.register");
    Route::post("/register/create",[adminController::class,"AdminRegister"])->name("admin.register.create");
    Route::get("/dashboard",[adminController::class,"Dashboard"])->middleware(['admin'])->name("admin.dashboard");
    Route::post("/login/owner",[adminController::class,"AdminLogin"])->name("admin.login");
    Route::post("/logout",[adminController::class,"Logout"])->name("admin.logout");
    Route::get("/article",[adminController::class,"Articles"])->name("admin.article");


});

Route::get('/', function () {
    $lesArticles =  Article::all();
    return view('welcome', compact('lesArticles'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/monpanier', function () {
    return view('monpanier');
})->middleware(['auth'])->name('panier');

require __DIR__.'/auth.php';
