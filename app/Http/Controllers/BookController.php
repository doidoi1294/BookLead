<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\User;
// リレーションを記述したモデル
use App\Models\Book_category;
// 画像アップロード用
use Cloudinary;

class BookController extends Controller
{
    public function index(Book $book){
        // $books = Book::all();
        // dd($books);  // 取得したデータをデバッグ表示
        return view('library.index')->with(['books' => $book->getPaginateByLimit()]);
    }
    
    public function create(Book_category $book_category){
        
        return view('library.create')->with(['book_categories' => $book_category->get()]);
    }
    // public function create()
    // {   
    //     return view('library.create');
    // }
    
    public function store(Book $book, BookRequest $request) // 引数をRequestからBookRequestにする
    {   
    // Cloudinaryへ画像を送信し、画像のURLを$image_urlに代入している
    $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
    
    // リクエストデータを取得し、画像のURLを追加
    $input = $request->book;
    $input['image_url'] = $image_url;
    
    // 新しいBookモデルのインスタンスを作成し、データをセットして保存
    $book = new Book();
    $book->user_id = Auth::id(); // ユーザーIDを設定
    $book->fill($input); // リクエストからのデータをモデルにセット
    $book->save(); // データベースに保存
    
    // 保存後にリダイレクト
    return redirect('/'.$book->user_id.'/library/');
    }
    // Userの情報も渡す
    public function show(User $user, Book $book){
        return view('library.show')->with(['book' => $book]);
    }
    
    public function edit(User $user, Book $book)
    {
        return view('library.edit')->with(['book' => $book]);
    }
    
    public function update(Book $book, BookRequest $request)
    {
        $input_book = $request['book'];
        $book->fill($input_book)->save();
        
        $book->user_id = Auth::id();
        return redirect('/'.$book->user_id.'/library/');
    }
    
    public function delete(User $user, Book $book)
    {
        $book->delete();
        
        $book->user_id = Auth::id();
        return redirect('/'.$book->user_id.'/library/');
    }
}
