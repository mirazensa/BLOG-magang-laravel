<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Models\Post;
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
        'active' => 'home',
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'About',
        'active' => 'about',
        'name' => 'Ainul Kurniawan',
        'email' => 'mochainulkurniawan@gmail.com',
        'gambar' => 'iwan.jpg',
    ]);
});

Route::get('/blog', [PostController::class, 'index']);

//route model binding
Route::get('/blog/{post:slug}', [PostController::class, 'show']);

// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'title' => "Post by Category: $category->name",
//         'active' => 'categories',
//         'posts' => $category->posts->load('category', 'author'),
//     ]);
// });

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all(),
    ]);
});

// Route::get('/authors/{author:username}', function (User $author) {
//     return view('posts', [
//         'title' => "Post by Author: $author->name",
//         'active' => 'authors',
//         'posts' => $author->posts->load('category', 'author'),
//     ]);
// });

Route::get('/tambahdata', function () {
    return view('tambahdata');
});
