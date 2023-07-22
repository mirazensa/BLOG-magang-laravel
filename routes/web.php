<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DashboardPostController;
use App\Models\Category;
use App\Models\User;

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
    return view('home', [
        'title' => 'Home',
    ]);
})->name('login');

Route::get('/about', function () {
    return view('about', [
        'title' => 'About',
        'name' => 'Ainul Kurniawan',
        'email' => 'mochainulkurniawan@gmail.com',
        'gambar' => 'iwan.jpg',
    ]);
});

Route::get('/blog', [PostController::class, 'index']);

//route model binding
Route::get('/blog/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'categories' => Category::all(),
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'autentikasi']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [DaftarController::class, 'index'])->middleware('guest');
Route::post('/register', [DaftarController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/blog/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/blog', DashboardPostController::class)->middleware('auth');
