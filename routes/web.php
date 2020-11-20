<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\TweetLikeController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/tweets', [TweetController::class, 'index'])->name('tweets.index');
    Route::post('/tweets', [TweetController::class, 'store'])->name('tweets.store');

    Route::post('/tweets/{tweet}/like', [TweetLikeController::class, 'store'])->name('tweets.like');
    Route::delete('/tweets/{tweet}/like', [TweetLikeController::class, 'destroy'])->name('tweets.dislike');

    Route::post('/profiles/{user:username}/follow', [FollowController::class, 'store'])->name('follows.store');

    Route::middleware('can:update,user')->group(function () {
        Route::get('/profiles/{user:username}/edit', [ProfileController::class, 'edit'])->name('follows.edit');
        Route::put('/profiles/{user:username}', [ProfileController::class, 'update'])->name('follows.update');
    });

    Route::get('/explore', ExploreController::class);
});

Route::get('/profiles/{user:username}', [ProfileController::class, 'show'])->name('profiles.show');

Auth::routes();
