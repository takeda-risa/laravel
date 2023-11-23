<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\UserController;

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

Auth::routes();

Route::resource('posts', PostController::class);


Route::resource('follows', FollowController::class)->only([
  'index', 'store', 'destroy'
]);
Route::get('/follower', [FollowController::class, 'followerIndex']);

Route::controller(UserController::class)->group(function () { 
  Route::get('/users/edit',  'edit')->name('users.edit');
  Route::patch('/users', 'update')->name('users.update');
  Route::resource('users', UserController::class)->only([
  'show',
  ]);  
});