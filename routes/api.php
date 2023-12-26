<?php

use App\Http\Controllers\Api\V1\Ticket\TicketController;
use Illuminate\Support\Facades\Route;

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
Route::group(['prefix' => 'auth'], function($router) {
    $router->post('/register', [\App\Http\Controllers\Api\V1\Auth\RegisterController::class, 'register']);
    $router->post('/login', [\App\Http\Controllers\Api\V1\Auth\LoginController::class, 'login']);
});

Route::middleware(['auth:api'])->group(function ($router) {
    $router->Apiresource('ticket', TicketController::class);
    $router->get('user/{passportId}', [\App\Http\Controllers\Api\V1\User\UserController::class, 'show'])
        ->middleware('checkPassportIdExist');
});
