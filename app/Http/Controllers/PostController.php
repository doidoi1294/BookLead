<?php

namespace App\Http\Controllers;

//use宣言は外部にあるクラスをPostController内にインポートできる。
//この場合、App\Models内のPostクラスをインポートしている。
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
// リレーションを記述したモデル
use App\Models\Category;

class PostController extends Controller
{
    /**
 * Post一覧を表示する
 * 
 * @param Post Postモデル
 * @return array Postモデルリスト
 */
    public function index(Post $post)//インポートしたPostをインスタンス化して$postとして使用。
    {
        //blade内で使う変数'posts'と設定。'posts'の中身にgetByLimit()を呼び出す。
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    /**
     * 特定IDのpostを表示する
     *
     * @params Object Post // 引数の$postはid=1のPostインスタンス
     * @return Reposnse post view
     */
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
        //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    
    // public function create()
    // {
    //     return view('posts.create');
    // }
    public function create(Category $category)
    {
        return view('posts.create')->with(['categories' => $category->get()]);
    }
    
    public function store(Post $post, PostRequest $request) // 引数をRequestからPostRequestにする
    {   
        // PostRequestでバリデーションが通った後、リクエストからのデータは$post変数にセットされている
        $user_id = Auth::id();
        $post = new Post(); // 新しいPostモデルのインスタンスを作成
        $post->user_id = $user_id; // ユーザーIDを設定
        $post->fill($request->post)->save(); // リクエストからのデータをモデルにセットして保存
        return redirect('/posts/'.$post->id);
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
    
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/posts/index');
    }
    
    public function mypage(Post $post, User $user)
    {   
        // まず、投稿データをすべて取得
        $posts = $post->getPaginateByLimit();
        
        foreach ($posts as $post) {
            $post->user = $user->find($post->user_id);
        }
        
        return view('posts.mypage')->with(['posts' => $posts]);
    }

}
