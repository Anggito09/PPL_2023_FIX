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
Route::get("/home", function () {
    return redirect()->intended();
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
    Route::get("/dp/{name}", function ($name) {
        if (\Illuminate\Support\Facades\Storage::has("/dp/" . $name)) {
            return response()->file(storage_path("/app/dp/" . $name));
        }
        abort(404);
    });
    Route::get("/logout", [\App\Http\Controllers\AuthController::class, "logout"]);
    Route::get("/me", [\App\Http\Controllers\AuthController::class, "profile"]);
    Route::get("/editme", [\App\Http\Controllers\AuthController::class, "editprofileform"]);
    Route::post("/editme", [\App\Http\Controllers\AuthController::class, "editprofile"]);
    Route::get("/proposalinvestor/{id}", [\App\Http\Controllers\BantutaniController::class, "fileproposal"]);
    Route::get("/berkastani/{id}", [\App\Http\Controllers\BantutaniController::class, "filebantutani"]);
    Route::get("/listbantutani", [\App\Http\Controllers\BantutaniController::class, "listbantutani"]);
    Route::get("/bantutani", [\App\Http\Controllers\BantutaniController::class, "index"]);
    Route::get("/ruangchat", [\App\Http\Controllers\ChatController::class, "index"]);
    Route::get("/chat/{id}", [\App\Http\Controllers\ChatController::class, "chat"]);

    Route::post("/pushchat/{id}", [\App\Http\Controllers\ChatController::class, "pushChat"]);
    Route::get("/fetchchat/{id}", [\App\Http\Controllers\ChatController::class, "fetchChat"]);
    Route::get("/riwayatchat", [\App\Http\Controllers\ChatController::class, "riwayat"]);

    Route::get("/profile/{id}", [\App\Http\Controllers\AuthController::class, "publicprofile"]);

    Route::get("/ruangdiskusi", [\App\Http\Controllers\DiskusiController::class, "index"]);
    Route::post("/diskusi", [\App\Http\Controllers\DiskusiController::class, "post"]);

    Route::middleware(["isadmin"])->group(function () {
        Route::get("/activatechat/{id}", [\App\Http\Controllers\ChatController::class, "activate"]);

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
        Route::get("/monitor/chat", [\App\Http\Controllers\ChatController::class, "monitor"]);
    });

    Route::middleware(["isnotpakar"])->group(function () {
        Route::get("/listinvestasi", [\App\Http\Controllers\BantutaniController::class, "listinvestasi"]);
    });

    Route::middleware(["ispetaniorinvestor"])->group(function () {
        Route::get("/listtransaksi", [\App\Http\Controllers\ChatController::class, "listtransaksi"]);
        Route::get("/startchat/{id}", [\App\Http\Controllers\ChatController::class, "startchat"]);
        Route::get("/pricelist", [\App\Http\Controllers\ChatController::class, "pricelist"]);
        Route::post("/premium", [\App\Http\Controllers\ChatController::class, "createPremium"]);
        Route::get("/confirmpayment", [\App\Http\Controllers\ChatController::class, "confirmform"]);
        Route::post("/confirmpayment", [\App\Http\Controllers\ChatController::class, "confirm"]);
    });

    Route::middleware(["ispetani"])->group(function () {
        Route::get("/daftartani", [\App\Http\Controllers\BantutaniController::class, "daftartaniform"]);
        Route::post("/daftartani", [\App\Http\Controllers\BantutaniController::class, "daftartani"]);
        Route::get("/bantutani/{id}", [\App\Http\Controllers\BantutaniController::class, "detailbantutani"]);
        Route::get("/edittani/{id}", [\App\Http\Controllers\BantutaniController::class, "edittaniform"]);
        Route::post("/edittani/{id}", [\App\Http\Controllers\BantutaniController::class, "edittani"]);
    });
    Route::middleware(["isinvestor"])->group(function () {
        Route::get("/investasi", [\App\Http\Controllers\BantutaniController::class, "investasiform"]);
        Route::post("/investasi", [\App\Http\Controllers\BantutaniController::class, "investasi"]);
        Route::get("/investasiconfirm", [\App\Http\Controllers\BantutaniController::class, "investasiconfirm"]);
    });
});
