<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>library</title>
    </head>
    <body>
        <h1>マイライブラリ</h1>
        <form action="/library" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h2>本のタイトル</h2>
                <input type="text" name="book[title]" placeholder="タイトル" value="{{ old('book.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('book.title') }}</p>
            </div>
            <div class="book_category">
                <h2>本のカテゴリー</h2>
                <select name="book[book_category_id]">
                    @foreach($book_categories as $book_category)
                        <option value="{{ $book_category->id }}">{{ $book_category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="author">
                <h2>本の作者</h2>
                <textarea name="book[author]" placeholder="本の作者を入力。">{{ old('book.author') }}</textarea>
                <p class="author__error" style="color:red">{{ $errors->first('book.author') }}</p>
            </div>
            <div class="image">
                <input type="file" name="image">
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">
            [<a href="/library">戻る</a>]
        </div>
    </body>
</html>