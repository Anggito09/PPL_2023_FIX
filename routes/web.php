<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(["guest"])->group(function () {
    Route::prefix("/register")->group(function () {
        Route::get("/admin", [\App\Http\Controllers\AdminController::class, "registerform"]);
        Route::post("/admin", [\App\Http\Controllers\AdminController::class, "register"]);

        Route::get("/investor", [\App\Http\Controllers\InvestorController::class, "registerform"]);
        Route::post("/investor", [\App\Http\Controllers\InvestorController::class, "register"]);

        Route::get("/petani", [\App\Http\Controllers\PetaniController::class, "registerform"]);
        Route::post("/petani", [\App\Http\Controllers\PetaniController::class, "register"]);

        Route::get("/pakar", [\App\Http\Controllers\PakarController::class, "registerform"]);
        Route::post("/pakar", [\App\Http\Controllers\PakarController::class, "register"]);
    });
    Route::get("/login", [\App\Http\Controllers\AuthController::class, "loginform"])->name("login");
    Route::post("/login", [\App\Http\Controllers\AuthController::class, "login"]);
});

Route::middleware(["auth"])->group(function () {
    Route::get("/logout", [\App\Http\Controllers\AuthController::class, "logout"]);
    Route::get("/me", [\App\Http\Controllers\AuthController::class, "profile"]);
    Route::get("/editme", [\App\Http\Controllers\AuthController::class, "editprofileform"]);
    Route::post("/editme", [\App\Http\Controllers\AuthController::class, "editprofile"]);
    Route::middleware(["isadmin"])->group(function () {
        Route::get("/akunpetani", [\App\Http\Controllers\AdminController::class, "listpetani"]);
        Route::get("/editpetani/{id}", [\App\Http\Controllers\AdminController::class, "editpetaniform"]);
        Route::post("/editpetani/{id}", [\App\Http\Controllers\AdminController::class, "editpetani"]);

        Route::get("/akuninvestor", [\App\Http\Controllers\AdminController::class, "listinvestor"]);
        Route::get("/editinvestor/{id}", [\App\Http\Controllers\AdminController::class, "editinvestorform"]);
        Route::post("/editinvestor/{id}", [\App\Http\Controllers\AdminController::class, "editinvestor"]);

        Route::get("/akunpakar", [\App\Http\Controllers\AdminController::class, "listpakar"]);
        Route::get("/editpakar/{id}", [\App\Http\Controllers\AdminController::class, "editpakarform"]);
        Route::post("/editpakar/{id}", [\App\Http\Controllers\AdminController::class, "editpakar"]);

        Route::get("/confirm/{id}", [\App\Http\Controllers\BantutaniController::class, "confirminvestasi"]);
    });

    Route::middleware(["isnotpakar"])->group(function () {
        Route::get("/bantutani", [\App\Http\Controllers\BantutaniController::class, "index"]);
        Route::get("/listinvestasi", [\App\Http\Controllers\BantutaniController::class, "listinvestasi"]);
    });

    Route::middleware(["ispetani"])->group(function () {
        Route::get("/daftartani", [\App\Http\Controllers\BantutaniController::class, "daftartaniform"]);
        Route::post("/daftartani", [\App\Http\Controllers\BantutaniController::class, "daftartani"]);
        Route::get("/listbantutani", [\App\Http\Controllers\BantutaniController::class, "listbantutani"]);
    });
    Route::middleware(["isinvestor"])->group(function () {
        Route::get("/investasi", [\App\Http\Controllers\BantutaniController::class, "investasiform"]);
        Route::post("/investasi", [\App\Http\Controllers\BantutaniController::class, "investasi"]);
        Route::get("/investasiconfirm", [\App\Http\Controllers\BantutaniController::class, "investasiconfirm"]);
    });
});
