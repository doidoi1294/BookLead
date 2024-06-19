<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Book_categoryController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\Post_likeController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    // 投稿の一覧の表示のページのURLを変更する
    Route::get('/posts/index', 'index')->name('postIndex');
    Route::post('/posts', 'store')->name('store');
    Route::get('/posts/create', 'create')->name('create');
    Route::get('/posts/{post}', 'show')->name('show');
    Route::put('/posts/{post}', 'update')->name('update');
    Route::delete('/posts/{post}', 'delete')->name('delete');
    Route::get('/posts/{post}/edit', 'edit')->name('edit');
    Route::get('/{user}/posts/mypage', 'mypage')->name('mypage');
});

// /{user}/library でuesrごとに指定

Route::controller(BookController::class)->middleware(['auth'])->group(function(){
    // 投稿の一覧の表示のページのURLを変更する
    Route::get('/{user}/library', 'index')->name('bookIndex');
    Route::post('/{user}/library', 'store')->name('store');
    Route::get('/{user}/library/create', 'create')->name('create');
    Route::get('/{user}/library/{book}', 'show')->name('show');
    Route::put('/{user}/library/{book}', 'update')->name('update');
    Route::delete('/{user}/library/{book}', 'delete')->name('delete');
    Route::get('/{user}/library/{book}/edit', 'edit')->name('edit');
});

Route::controller(DiaryController::class)->middleware(['auth'])->group(function(){
    // 投稿の一覧の表示のページのURLを変更する
    Route::get('/diaries/index', 'index')->name('diaryIndex');
    Route::post('/diaries', 'store')->name('store');
    Route::get('/diaries/create', 'create')->name('create');
    Route::get('/diaries/{diary}', 'show')->name('show');
    Route::put('/diaries/{diary}', 'update')->name('update');
    Route::delete('/diaries/{diary}', 'delete')->name('delete');
    Route::get('/diaries/{diary}/edit', 'edit')->name('edit');
});

// 表示される最初のページ
Route::get('/{user}/home', function () {
    return view('diaries.home');
})->middleware(['auth', 'verified'])->name('home');

// カレンダーのイベント
Route::get('/events', [DiaryController::class, 'getEvents']);

Route::get('/categories/{category}', [CategoryController::class,'index'])->middleware("auth");

Route::get('/book_categories/{book_category}', [Book_categoryController::class,'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// いいね機能
Route::post('/posts/{post}/like', [Post_likeController::class, 'like'])->name('like')->middleware("auth");
Route::post('/posts/{post}/unlike', [Post_likeController::class, 'unlike'])->name('unlike')->middleware("auth");


require __DIR__.'/auth.php';