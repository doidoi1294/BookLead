<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h3>本のタイトル</h3>
        <p class="title">
            {{ $book->title }}
        </p>
        <h3>本のカテゴリー</h3>
        <a href="/categories/{{ $book->book_category->id }}">{{ $book->book_category->name }}</a>
        <div class="content">
            <div class="content__post">
                <h3>本の作者</h3>
                <p>{{ $book->author }}</p>
                <h3>本の表紙</h3>
                <img src="{{ $book->image_url }}" alt="画像が読み込めません。"/>
            </div>
        </div>
        <div class="edit">
            <a href="/library/{{ $book->id }}/edit">編集</a>
            </div>
        <div class="footer">
            <a href="/library">戻る</a>
        </div>
    </body>
</html>