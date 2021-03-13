<?php

use App\Http\Controllers\CompareLottery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Lotto\LottoController;
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


Route::post('add-lotto', [LottoController::class, 'store']);
Route::get('getLottoWithDate/{lotto_date}/{shop_id}', [LottoController::class, 'getLottoWithDate']);
Route::delete('delete-lotto/{id}', [LottoController::class, 'destroy']);
Route::post('compareLottery', [CompareLottery::class, 'compareLottoNumber']);
Route::post('home', [CompareLottery::class, 'home']);
Route::post('/', [CompareLottery::class, 'home']);
