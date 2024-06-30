<?php

namespace App\Http\Controllers;

//use宣言は外部にあるクラスをPostController内にインポートできる。
//この場合、App\Models内のPostクラスをインポートしている。
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
    public function index(Request $request, Post $post, Category $category)
    {
        $category_id = $request->input('category_id');
        $query = $post->query();
    
        if ($category_id) {
            $query->where('category_id', $category_id);
        }
    
        $posts = $query->paginate(10);
        $categories = $category->all();
    
        return view('posts.index')->with(['posts' => $posts, 'categories' => $categories]);
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
    
    public function mypage($user_id = null)
    {   
        // ログインユーザーの情報を取得
        $auth_user = Auth::user();
        
        // 特定のユーザーの情報を取得
        if ($user_id) {
            $user = User::findOrFail($user_id);
            $is_ownPage = ($auth_user && $auth_user->id == $user_id);
        } else {
            $user = $auth_user;
            $is_ownPage = true;
        }
    
        // ユーザーの投稿データを取得し、ページネーションで表示
        $posts = Post::where('user_id', $user->id)->paginate(10);
    
        return view('posts.mypage', compact('posts', 'auth_user', 'user', 'is_ownPage'));
    }


}
