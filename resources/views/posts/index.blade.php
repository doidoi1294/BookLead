<x-app-layout>
    <x-slot name="title">投稿一覧</x-slot>
    <x-slot name="header">Blog Name</x-slot>
    
    <div class="mt-8">
        <h2 class="text-left underline">投稿カテゴリー検索</h2>
        <form action='/posts/index' method="GET" class="flex items-center space-x-4 mt-2 mb-4">
            <select name="category_id" class="border border-gray-300 rounded-md py-2 px-8 focus:outline-none focus:border-blue-500">
                <option value="">全てのカテゴリー</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 ml-4">検索</button>
        </form>
        
        @foreach ($posts as $post)
            <div class="border border-gray-300 rounded-lg p-4 mb-4">
                <!--投稿したユーザーの名前-->
                <h1 class="text-2xl font-semibold mb-2">
                    <a href="/{{ $post->user_id }}/posts/mypage" class="no-underline hover:underline">{{ $post->user->name }}</a>
                </h1>
                <!--投稿のタイトル-->
                <h2 class="text-xl font-semibold mb-2">{{ $post->title }}</h2>
                <!--投稿のカテゴリー-->
                <p class="text-blue-500 mb-2">{{ $post->category->name }}</p>
                <!--投稿の本文-->
                <p class="text-lg">{{ $post->body }}</p>
                <!--投稿の詳細ボタン-->
                <div class="flex justify-between mt-4">
                    <form action="/posts/{{ $post->id }}" method="GET">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            詳細
                        </button>
                    </form>
                    <!--投稿の削除ボタン-->
                    @if ( Auth::id()  == $post->user_id )
                        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="deletePost({{ $post->id }})" class="px-4 py-2 text-white rounded-md hover:bg-red-600">
                                <svg class="h-8 w-8 text-red-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="18" y1="6" x2="6" y2="18" />  <line x1="6" y1="6" x2="18" y2="18" /></svg>
                            </button> 
                        </form>
                    @endif
                </div>
                    <!--いいね機能-->
                    @if($post->is_post_liked_by_auth_user())
                        <form action="{{ route('unlike', ['post' => $post->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm" style="display: flex; align-items: center;">
                                <svg class="text-red-500" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 20 20"><path fill="currentColor" fill-rule="evenodd" d="M3.172 5.172a4 4 0 0 1 5.656 0L10 6.343l1.172-1.171a4 4 0 1 1 5.656 5.656L10 17.657l-6.828-6.829a4 4 0 0 1 0-5.656" clip-rule="evenodd"/></svg>
                                <span class="badge ml-2">{{ $post->likes->count() }}</span>
                            </button>
                        </form>
                    @else
                        <form action="{{ route('like', ['post' => $post->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="mt-2 btn btn-secondary btn-sm" style="display: flex; align-items: center;">
                            <svg class="text-gray-500"  fill="none"  width="32" height="32" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                            <span class="badge ml-2">{{ $post->likes->count() }}</span></button>
                        </form>
                    @endif
            </div>
        @endforeach
    </div>
    <div class='paginate mt-4'>
        {{ $posts->links() }}
    </div>
    <script>
        function deletePost(id) {
            'use strict'
    
            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
</x-app-layout>
