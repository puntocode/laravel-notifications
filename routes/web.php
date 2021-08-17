<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/message', [App\Http\Controllers\HomeController::class, 'message'])->name('message');
Route::get('/message/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('messages.show');
Route::post('/message', [App\Http\Controllers\HomeController::class, 'store'])->name('message.store');

Route::get('/notificaciones', [App\Http\Controllers\NotificationController::class, 'index'])->name('notifications.index');
Route::patch('/notificaciones/{id}', [App\Http\Controllers\NotificationController::class, 'read'])->name('notifications.read');
Route::delete('/notificaciones/{id}', [App\Http\Controllers\NotificationController::class, 'destroy'])->name('notifications.destroy');

Route::resource('posts', PostController::class);
