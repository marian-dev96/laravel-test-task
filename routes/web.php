<?php

use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/referrals/{id}', function ($id) {
    $refers = User::with(['referrals'])->where('referred_id', $id)->get();

    return view('referer', compact('id', 'refers'));
});

Route::get('/set-language/{id}', [\App\Http\Controllers\Admin\AdminController::class, 'setLanguage'])
    ->name( 'set-language')
    ->middleware('auth');
