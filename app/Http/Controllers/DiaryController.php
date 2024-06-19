<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diary;
// リレーションを記述したモデル
use App\Models\Book;
// 追加
use App\Http\Requests\DiaryRequest;
use Illuminate\Support\Facades\Auth;

class DiaryController extends Controller
{
    public function home(Diary $diary){
        return view('diaries.home')->with(['diaries' => $diary->get()]);
    }
    
    public function index(Diary $diary){
        // $books = Book::all();
        // dd($books);  // 取得したデータをデバッグ表示
        return view('diaries.index')->with(['diaries' => $diary->getPaginateByLimit()]);
    }
    
    public function create(Book $book){
        
        return view('diaries.create')->with(['books' => $book->get()]);
    }
    // public function create()
    // {   
    //     return view('diaries.create');
    // }
    
    public function store(Diary $diary, DiaryRequest $request)
    {   
        $diary = new Diary(); // 新しいDiaryモデルのインスタンスを作成
        $diary->book_id = $request->diary['book_id']; // フォームから送信されたbook_idを取得
        $diary->fill($request->diary); // リクエストからのデータをモデルにセット
        $diary->save(); // データベースに保存

        $diary->book->user_id = Auth::id();
        return redirect('/'. $diary->book->user_id .'1/home');
    }
    
    public function show(Diary $diary){
        return view('diaries.show')->with(['diary' => $diary]);
    }
    
    public function edit(Diary $diary)
    {
        return view('diaries.edit')->with(['post' => $post]);
    }
    
    public function update(Diary $diary, DiaryRequest $request)
    {
        $input_diary = $request['diary'];
        $diary->fill($input_diary)->save();
    
        return redirect('/diaries/' . $diary->id);
    }
    
    public function delete(Diary $diary)
    {
        $diary->delete();
        return redirect('/diaries/index');
    }
    
    // カレンダーのイベントでデータベースの情報を参照する
    public function getEvents()
    {   
        $bookIds = Book::where('user_id', Auth::id())->pluck('id');       // 自分の本を取得

        // 自分の読書日記を取得
        foreach($bookIds as $bookId){
            $diaries = Diary::where('book_id', $bookId)->get();
            foreach($diaries as $diary) {
                $response[] = [
                    'start' => $diary->date,
                    'title' => $diary->book->title,
                    'url' => url('/diaries/' . $diary->id),
                ];
            }
        }
        
        return response()->json($response);
    }
    }
