<x-app-layout>
    <x-slot name="title">日記編集ページ</x-slot>
    <x-slot name="header">Blog Name</x-slot>
    
    <div class="max-w-md mx-auto mt-8">
        <form action="/diaries/{{ $diary->id }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div class="book">
                <h2 class="text-lg font-semibold">読んだ本を選択</h2>
                <select name="diary[book_id]" class="border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                    @foreach($books as $book)
                        <option value="{{ $book->id }}" {{ $diary->book_id == $book->id ? 'selected' : '' }}>{{ $book->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="date">
                <h2 class="text-lg font-semibold">記録の日付</h2>
                <input name="diary[date]" type="date" class="border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" value="{{ old('diary.date', $diary->date) }}">
                <p class="date__error mt-1 text-red-500">{{ $errors->first('diary.date') }}</p>
            </div>
            <div class="page">
                <h2 class="text-lg font-semibold">読んだページ数</h2>
                <input type="number" name="diary[page]" class="border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" placeholder="ページ数を入力(半角数字)" value="{{ old('diary.page', $diary->page) }}">
                <p class="page__error mt-1 text-red-500">{{ $errors->first('diary.page') }}</p>
            </div>
            <div class="body">
                <h2 class="text-lg font-semibold">読書日記</h2>
                <textarea name="diary[body]" class="border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 w-full h-32 resize-none" placeholder="読書日記を入力">{{ old('diary.body', $diary->body) }}</textarea>
                <p class="body__error mt-1 text-red-500">{{ $errors->first('diary.body') }}</p>
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
