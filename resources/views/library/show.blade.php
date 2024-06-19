<x-app-layout>
    <x-slot name="title">本の詳細ページ</x-slot>
    <x-slot name="header">Blog Name</x-slot>
    
    <div class="p-4">
        <h3 class="text-lg font-semibold">本のタイトル</h3>
        <p class="title mb-4">{{ $book->title }}</p>
        <h3 class="text-lg font-semibold">本のカテゴリー</h3>
        <a href="/book_categories/{{ $book->book_category->id }}" class="text-blue-500 hover:underline">{{ $book->book_category->name }}</a>
        <div class="content mt-4">
            <div class="content__post">
                <h3 class="text-lg font-semibold">本の作者</h3>
                <p>{{ $book->author }}</p>
                <h3 class="text-lg font-semibold">本の表紙</h3>
                <img src="{{ $book->image_url }}" alt="画像が読み込めません。" class="mt-2"/>
            </div>
        </div>
    </div>
    @if ( Auth::id()  == $book->user_id )
        <div class="edit mt-4">
            <a href="/{{ Auth::id() }}/library/{{ $book->id }}/edit" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md shadow-md transition duration-300 ease-in-out transform hover:scale-105">
                編集
            </a>
        </div>
    @endif
    <div class="back mt-4">
        [<a href="#" onclick="history.back()" class="text-blue-500 hover:underline">戻る</a>]
    </div>
</x-app-layout>
