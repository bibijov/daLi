<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Hash;
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
Route::apiResource('posts', PostController::class);





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//create a user route
Route::get('/user-create', function(Request $request){
    App\Models\User::create([
        'name'=>'Bogdan Jovanovic',
        'email'=>'bibijovano@gmail.com',
        'password'=>Hash::make('lobico')
    ]);
});
//login a user

Route::get('/login', function(Request $request){
    $credentials=[
        'email'=>'bibijovano@gmail.com',
        'password'=>'lobico'
    ];
    $credentials= request()->only(['email','password']);
    $token=auth('api')->attempt($credentials);

    return $token;
});

// get authenticated user

Route::middleware('auth:api')->get('/me',function(){
    $user = auth()->user();

    return $user;
});
//logout a user