<x-app-layout>
    <x-slot name="title">本の詳細ページ</x-slot>
    <x-slot name="header">Blog Name</x-slot>
    
    <div class="mt-8">
        <form action="/{{ Auth::id() }}/library/create" method="GET">
            <button type="submit" class="px-6 py-3 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                新しく本を登録する
            </button>
        </form>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
            @foreach ($books as $book)
                @if ( Auth::id()  == $book->user_id )
                    <div class="border border-gray-300 rounded-lg p-4">
                        <h2 class="text-xl font-semibold mb-2">{{ $book->title }}</h2>
                        <a href="/book_categories/{{ $book->book_category->id }}" class="text-blue-500 hover:underline">{{ $book->book_category->name }}</a>
                        <a href="/{{ Auth::id() }}/library/{{ $book->id }}">
                            <img src="{{ $book->image_url }}" alt="画像が読み込めません。" class="mt-4">
                        </a>
                        <form action="/{{ Auth::id() }}/library/{{ $book->id }}" id="form_{{ $book->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="deletePost({{ $book->id }})" class="mt-4 px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                                削除
                            </button> 
                        </form>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class='paginate mt-4'>
        {{$books->links() }}
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
