<x-app-layout>
    <x-slot name="title">マイライブラリ</x-slot>
    <x-slot name="header">Blog Name</x-slot>
    
    <h1>マイライブラリ</h1>
    <form action="/{{ Auth::id() }}/library" method="POST" enctype="multipart/form-data" class="mt-8 mx-auto max-w-md">
        @csrf
        <div class="title mb-4">
            <h2>本のタイトル</h2>
            <input type="text" name="book[title]" placeholder="タイトル" value="{{ old('book.title') }}" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
            <p class="title__error mt-1 text-red-500">{{ $errors->first('book.title') }}</p>
        </div>
        <div class="book_category mb-4">
            <h2>本のカテゴリー</h2>
            <select name="book[book_category_id]" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                @foreach($book_categories as $book_category)
                    <option value="{{ $book_category->id }}">{{ $book_category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="author mb-4">
            <h2>本の作者</h2>
            <textarea name="book[author]" placeholder="本の作者を入力" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">{{ old('book.author') }}</textarea>
            <p class="author__error mt-1 text-red-500">{{ $errors->first('book.author') }}</p>
        </div>
        <div class="image mb-4">
            <input type="file" name="image" class="border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
            <p class="image__error mt-1 text-red-500">{{ $errors->first('book.image_url') }}</p>
        </div>
        <div class="text-center">
            <input type="submit" value="保存" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md shadow-md transition duration-300 ease-in-out transform hover:scale-105">
        </div>
    </form>
    <div class="back mt-4 mx-auto max-w-md">
        [<a href="#" onclick="history.back()" class="text-blue-500 hover:underline">戻る</a>]
    </div>
</x-app-layout>
