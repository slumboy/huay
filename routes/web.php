<?php



use App\Http\Controllers\CompareLottery;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\Lotto\LottoController;

use Illuminate\Support\Facades\Auth;

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



// Route::get('/', function () {

//     return view('welcome');

// });



// Auth::routes();
Auth::routes(['register' => false]);





#rgion Lotto Section

Route::get('lotto/create', [LottoController::class, 'create'])->middleware('auth');

Route::get('lotto/list', [LottoController::class, 'index'])->middleware('auth');

Route::get('/remove', [LottoController::class, 'removeLotto'])->middleware('auth');

#endregion



Route::get('/', [CompareLottery::class, 'home'])->middleware('auth')->name('home');

Route::get('/home', [CompareLottery::class, 'home'])->middleware('auth')->name('home');

Route::resource('/shop',ShopController::class)->middleware('auth');

Route::get('/compareMain', [CompareLottery::class, 'index'])->middleware('auth')->name('index');





Route::resource('/shop',ShopController::class)->middleware('auth');

Route::resource('/profile',EditProfileController::class)->middleware('auth');





