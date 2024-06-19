<x-app-layout>
    <x-slot name="title">投稿閲覧画面</x-slot>
    <x-slot name="header">Blog Name</x-slot>
    
    <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
    <a href="/categories/{{ $post->category->id }}" class="text-blue-500 hover:underline">{{ $post->category->name }}</a>
    <div class="mt-4">
        <h3 class="text-lg font-semibold">本文</h3>
        <p>{{ $post->body }}</p>    
    </div>
    @if( Auth::id() == $post->user_id )
        <div class="mt-8">
            <a href="/posts/{{ $post->id }}/edit" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                編集
            </a>
        </div>
    @endif
    <div class="mt-8">
        [<a href="#" onclick="history.back()" class="text-blue-500 hover:underline">戻る</a>]
    </div>
</x-app-layout>
