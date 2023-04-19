<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BantutaniController;
use App\Http\Controllers\GeneralController;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

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

Route::get("/", [GeneralController::class, "index"]);

Route::get("/login", [AuthController::class, "signinform"]);
Route::post("/login", [AuthController::class, "signin"]);

Route::get("/register", [AuthController::class, "registerform"]);
Route::post("/register", [AuthController::class, "register"]);

Route::get("/registerpakar", [AuthController::class, "registerpakarform"]);
Route::post("/registerpakar", [AuthController::class, "registerpakar"]);

Route::get("/bantutani", [BantutaniController::class, "index"]);

Route::get("/daftartani", [BantutaniController::class, "daftartaniform"]);
Route::post("/daftartani", [BantutaniController::class, "daftartani"]);

Route::get("/investor", [BantutaniController::class, "investorform"]);
Route::post("/investor/confirmation", [BantutaniController::class, "investorconfirm"]);
Route::get("/investor/simpan", [BantutaniController::class, "investor"]);

Route::get("/logout", [AuthController::class, "logout"]);
