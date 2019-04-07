<?php

use Illuminate\Http\Request;

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

// api V1
// получить текущий курс монеты
//todo описание в swagger, доступ по токену, статусы в ответе
Route::get('v1/coin/{coin}/course', 'Api\v1\Coin\Course');
