<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;  //外部にあるPostControllerクラスをインポート。

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

// '/'にGetリクエストが来たら、PostControllerのindexメソッドを実行する
Route::get('/', [PostController::class, 'index']);

Route::get('/posts/create', [PostController::class, 'create']);
// '/posts/{対象データのID}'にGetリクエストが来たら、PostControllerのshowメソッドを実行する
Route::get('/posts/{post}', [PostController::class ,'show']);
// createメソッドで作成した情報を受け付ける＝DBへ保存するstoreメソッドを実行する
Route::post('/posts', [PostController::class, 'store']);

Route::get('/posts/{post}/edit', [PostController::class, 'edit']);

Route::put('/posts/{post}', [PostController::class, 'update']);
