<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MeetController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Users
Route::get('/users', [UserController::class, 'index']);

Route::patch('/user/{user:slug}/update', [UserController::class, 'update']);
Route::patch('/user/{user:slug}/archive', [UserController::class, 'archive']);
Route::patch('/user/{user:slug}/addToEvent', [UserController::class, 'addToEvent']);

Route::post('/parents/store', [UserController::class, 'store']);
Route::post('/swimmers/store', [UserController::class, 'store']);

// Groups
Route::post('/groups/store', [GroupController::class, 'store']);

// Meets
Route::post('/meets/store', [MeetController::class, 'store']);

// Events
Route::post('/events/store', [EventController::class, 'store']);