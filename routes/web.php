<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\CommentLikeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ArticleController;

use App\Models\Order;
use Illuminate\Http\Request;
Route::get('/articles', function() {
    return view('articles');
})->name('articles');
Route::get('/newest', [PostController::class, 'get_recent'])->name('newest');
Route::get('/articles', [ArticleController::class, 'show_articles'])->name('show.articles');

Route::post('/article-upload', [ArticleController::class, 'add'])->name('article.upload');
Route::get('/articles/{slug}', [ArticleController::class, 'show_article'])->name('article.show');

Route::get('/article-upload', function() {
    return view('article-upload');
})->name('article-upload');
Route::get('/search', function (Request $request) {
    return OrderController::search($request);
})->name('search');
Route::get('/search-article', function (Request $request) {
    return OrderController::search_article($request);
})->name('search-article');
Route::get('/', [PostController::class, 'get_recent'])->name('home');
Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');
Route::get('/newest', [PostController::class, 'get_recent'])->name('newest');
Route::get('/most-liked', [PostController::class, 'get_top'])->name('most-liked');
Route::get('/login', [AuthenticationController::class, 'loginPage'])->name('login-page');
Route::post('login', [AuthenticationController::class, 'authenticate'])->name('login');
Route::post('logout', [AuthenticationController::class, 'logout'])->name('logout');
Route::get('/sign-up', [AuthenticationController::class, 'signupPage'])->name('signup-page');
Route::post('sign-up', [AuthenticationController::class, 'signup'])->name('sign-up');
Route::get('/faq', function () {
    return view('faq');
})->name('faq');
Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact');
Route::get('/posts/{slug}', [PostController::class, 'show_post'])->name('posts.show');

Route::get('/post', function () {
    return view('post-page');
})->name('post-page');
Route::post('post', [PostController::class, 'post'])->name('post');
Route::post('comments', [CommentController::class, 'comment'])->name('comment');
Route::post('comments/like', [CommentLikeController::class, 'commentLike'])->name('like.comment');
Route::post('posts/like', [LikeController::class, 'postLike'])->name('like.post');
