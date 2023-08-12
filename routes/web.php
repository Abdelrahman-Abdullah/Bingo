<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
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

Route::get('/', function (){
    return view('index');
});

Route::controller(PostController::class)->group(function () {
    Route::get('/posts',  'index');
    Route::get('/post/{post:title}', 'show');
});
// TODO: use region to collapse the following routes
#region CRUD

#endregion
// Invokable Controllers  **************
    Route::get('/about', AboutController::class);
    Route::get('/service', ServiceController::class );
    Route::get('/portfolio', PortfolioController::class);
    Route::get('/pricing',PlanController::class);
// End Invokable Controllers  **************

Route::controller(ContactController::class)->group(function (){
    Route::get('/contact', 'index');
    Route::post('/contact',  'store');
});

Route::middleware('auth')->group(function () {;
    Route::post('/comment/{postId}', CommentController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
