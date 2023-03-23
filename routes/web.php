<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Services\Newsletter;
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

Route::get('/', [PostsController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostsController::class, 'show']);
Route::post('/posts/{post:slug}/comments', [CommentController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

// single action controller
Route::post('newsletter', NewsletterController::class);


Route::get('/login', [SessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('/session', [SessionController::class, 'store'])->middleware('guest');


Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');


Route::get('/admin/posts/create', [PostsController::class, 'create'])->middleware('admin');
Route::post('/admin/posts/store', [PostsController::class, 'store'])->middleware('admin');
