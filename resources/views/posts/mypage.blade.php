<x-app-layout>
    <x-slot name="title">マイページ</x-slot>
    <x-slot name="header">Blog Name</x-slot>

    <div class="bg-white p-6 rounded-lg shadow-md mb-8">
        <!-- ユーザー情報 -->
        <div class="text-left">
            <h2 class="text-2xl font-semibold mb-2">
                {{ $user->name }}
            </h2>
    
            <!-- フォローボタン -->
            @if ($auth_user && $auth_user->id !== $user->id)
                @if ($auth_user->is_user_followed_by_auth_user($user->id))
                    <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-success btn-sm" style="display: flex; align-items: center;">
                            アンフォロー
                        </button>
                    </form>
                @else
                    <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-secondary btn-sm" style="display: flex; align-items: center;">
                            フォロー
                        </button>
                    </form>
                @endif
            @endif
    
            <!-- フォロー数とフォロワー数の表示 -->
            <div class="flex justify-start items-center mb-2">
                <p class="text-gray-600 mr-4">
                    フォロー中: <span class="font-thin">{{ $user->followers()->count() }}</span>
                </p>
                <p class="text-gray-600 ml-4">
                    フォロワー数: <span class="font-thin">{{ $user->followees()->count() }}</span>
                </p>
            </div>
            
            <!-- 自己紹介文 -->
            <div class="border border-gray-300 p-2 mb-2 rounded-lg">
                <p class="text-gray-600 break-words" style="word-wrap: break-word;">
                    {{ $user->introduce ?? '' }}
                </p>
            </div>
        </div>
        
        <!-- 自分のプロフィールの場合 -->
        @if ($auth_user && $auth_user->id == $user->id)
            <div class="flex justify-between">
                <form action="/posts/create" method="GET">
                    <button type="submit" class="px-4 py-2 bg-orange-400 text-white rounded-md hover:bg-orange-500">
                        新しい投稿の作成
                    </button>
                </form>
                <form action="/profile" method="GET">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                        プロフィールの編集
                    </button>
                </form>
            </div>
        @endif
    </div>

        <div>
            <h2 class="text-xl font-semibold mb-4 border-b pb-2">自分の投稿一覧</h2>
        </div>
        <!--カテゴリー検索-->
        @foreach ($posts as $post)
        @if ($auth_user && $auth_user->id == $user->id)
            <div class="border border-gray-300 rounded-lg p-4 mb-4">
                <h2 class="text-xl font-semibold mb-2">{{ $post->title }}</h2>
                <p class="text-blue-500 mb-2">{{ $post->category->name }}</p>
                <p class="text-lg">{{ $post->body }}</p>
                <div class="flex justify-between mt-4">
                    <form action="/posts/{{ $post->id }}" method="GET">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            詳細
                        </button>
                    </form>
                    <!--投稿削除ボタン-->
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})" class="px-4 py-2 text-white rounded-md">
                            <svg class="h-8 w-8 text-red-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="18" y1="6" x2="6" y2="18" />  <line x1="6" y1="6" x2="18" y2="18" /></svg>
                        </button> 
                    </form>
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
                    <button type="submit" class="btn btn-secondary btn-sm" style="display: flex; align-items: center;">
                    <svg class="text-gray-500"  fill="none"  width="32" height="32" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    <span class="badge ml-2">{{ $post->likes->count() }}</span></button>
                </form>
                @endif
            </div>
        @else
            <div class="border border-gray-300 rounded-lg p-4 mb-4">
                <h2 class="text-xl font-semibold mb-2">{{ $post->title }}</h2>
                <p class="text-blue-500 mb-2">{{ $post->category->name }}</p>
                <p class="text-lg">{{ $post->body }}</p>
                <div class="flex justify-between mt-4">
                    <form action="/posts/{{ $post->id }}" method="GET">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            詳細
                        </button>
                    </form>
                </div>
                <!--いいね機能-->
                @if($is_ownPage)
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
                    <button type="submit" class="btn btn-secondary btn-sm" style="display: flex; align-items: center;">
                    <svg class="text-gray-500"  fill="none"  width="32" height="32" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    <span class="badge ml-2">{{ $post->likes->count() }}</span></button>
                </form>
                @endif
            </div>
        @endif
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
