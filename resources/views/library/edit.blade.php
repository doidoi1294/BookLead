<x-app-layout>
    <x-slot name="title">本の詳細ページ</x-slot>
    <x-slot name="header">Blog Name</x-slot>
    
        <div class="content">
        <form action="/{{ Auth::id() }}/{{ $book->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="title">
                <h2>本のタイトル</h2>
                <input type="text" name="book[title]" value="{{ $book->title }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('book.title') }}</p>
            </div>
            <div class="book_category">
                <h2>本のカテゴリー</h2>
                <select name="book[book_category_id]" value="{{ $book->book_category->name }}">
                    @foreach($book_categories as $book_category)
                        <option value="{{ $book_category->id }}">{{ $book_category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="author">
                <h2>本の作者</h2>
                <textarea name="book[author]" placeholder="本の作者を入力">{{ old('book.author') }}</textarea>
                <p class="author__error" style="color:red">{{ $errors->first('book.author') }}</p>
            </div>
            <div class="image">
                <input type="file" name="image">
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">
            [<a href="#" onclick="history.back()">戻る</a>]
        </div>
    </div>
</x-app-layout>