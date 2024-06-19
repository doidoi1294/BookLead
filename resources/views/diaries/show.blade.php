<x-app-layout>
    <x-slot name="title">日記詳細ページ</x-slot>
    <x-slot name="header">Blog Name</x-slot>
    
    <div class="book mb-8">
        <h3 class="text-xl font-semibold">本のタイトル</h3>
        <a href="/{{ $diary->book->user_id }}/library/{{ $diary->book->id }}" class="text-blue-500 hover:underline">{{ $diary->book->title }}</a>
    </div>
    <div class="content mb-8">
        <div class="content__date">
            <h3 class="text-xl font-semibold">読んだ日付</h3>
            <p>{{ $diary->date }}</p>    
        </div>
        <div class="content__page">
            <h3 class="text-xl font-semibold">読んだページ数</h3>
            <p>{{ $diary->page }}</p>    
        </div>
        <div class="content__date">
            <h3 class="text-xl font-semibold">読書日記の本文</h3>
            <p>{{ $diary->body }}</p>    
        </div>
    </div>
    @if ( Auth::id()  == $diary->book->user_id )
        <div class="flex justify-between mb-8">
            <div class="edit">
                <a href="/diaries/{{ $diary->id }}/edit" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                    編集
                </a>
            </div>
            <form action="/diaries/{{ $diary->id }}" id="form_{{ $diary->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deletePost({{ $diary->id }})" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                    削除
                </button> 
            </form>
        </div>
    @endif
    <div class="back">
        [<a href="#" onclick="history.back()" class="text-blue-500 hover:underline">戻る</a>]
    </div>
</x-app-layout>
