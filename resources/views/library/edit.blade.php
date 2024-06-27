<x-app-layout>
    <x-slot name="title">本の詳細ページ</x-slot>
    <x-slot name="header">Blog Name</x-slot>
    
    <div class="max-w-md mx-auto mt-8">
        <form action="/{{ Auth::id() }}/library/{{ $book->id }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div class="title">
                <h2 class="text-lg font-semibold">本のタイトル</h2>
                <input type="text" name="book[title]" class="border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 w-full" value="{{ old('book.title', $book->title) }}">
                <p class="title__error mt-1 text-red-500">{{ $errors->first('book.title') }}</p>
            </div>
            <div class="book_category">
                <h2 class="text-lg font-semibold">本のカテゴリー</h2>
                <select name="book[book_category_id]" class="border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 w-full">
                    @foreach($book_categories as $book_category)
                        <option value="{{ $book_category->id }}" {{ $book->book_category_id == $book_category->id ? 'selected' : '' }}>{{ $book_category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="author">
                <h2 class="text-lg font-semibold">本の作者</h2>
                <textarea name="book[author]" class="border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 w-full h-20 resize-none" placeholder="本の作者を入力">{{ old('book.author', $book->author) }}</textarea>
                <p class="author__error mt-1 text-red-500">{{ $errors->first('book.author') }}</p>
            </div>
            <div class="image">
                <h2 class="text-lg font-semibold">本の画像</h2>
                @if ($book->image_url)
                    <img src="{{ $book->image_url }}" alt="画像が読み込めません。" class="mb-4 max-w-full h-auto"/>
                @endif
                <input type="file" name="image" class="border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 w-full">
            </div>
            <div class="flex justify-center">
                <input type="submit" value="更新" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md shadow-md transition duration-300 ease-in-out transform hover:scale-105">
            </div>
        </form>
        <div class="back mt-4 mx-auto max-w-md">
            [<a href="#" onclick="history.back()" class="text-blue-500 hover:underline">戻る</a>]
        </div>
    </div>
</x-app-layout>
