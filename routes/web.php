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
Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');

Route::get('subscribe', [App\Http\Controllers\SubscribeController::class, 'index'])->name('subscribe.index');

Route::get('subscribe/{plan}', [App\Http\Controllers\SubscribeController::class, 'payment'])->name('subscribe.payment');
Route::post('subscribe', [App\Http\Controllers\SubscribeController::class, 'pay'])->name('subscribe.pay');


});

##### Auth & subscribed routes
Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => ['subscribed']], function()
{

Route::get('myILNK', [App\Http\Controllers\User\PageController::class, 'index'])->name('page.index');

Route::post('myILNK/logo', [App\Http\Controllers\User\PageController::class, 'logoStore'])->name('page.logo.store');
Route::post('myILNK/Rlogo', [App\Http\Controllers\User\PageController::class, 'logoDestroy'])->name('page.logo.destory');

Route::post('myILNK/bgImage', [App\Http\Controllers\User\PageController::class, 'bgStore'])->name('page.bgImage.store');
Route::post('myILNK/RbgImage', [App\Http\Controllers\User\PageController::class, 'bgDestroy'])->name('page.bgImage.destory');


Route::post('myILNK/create', [App\Http\Controllers\User\PageController::class, 'create'])->name('page.create');


});

##### Guest Routes


Route::get('/{user:username}', [App\Http\Controllers\User\GuestController::class, 'showPage'])->name('page.guest');
