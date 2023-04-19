<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::post('/login', [AuthController::class, 'signin']);
//Route::post('/register', [AuthController::class, 'signup']);
//Route::post('/pakarregister', [AuthController::class, 'signupPakar']);
//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
//
//Route::get("/pakar", function (Request $request){
//   $pakar = \App\Models\role::where("role_name", "pakar")->get();
//    return response($pakar[0]->id);
//});
//
//Route::get("/test", function (Request $request) {
//   return response("ini test");
//});
