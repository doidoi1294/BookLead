<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>library</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <p>ログインユーザー：{{ Auth::user()->name }}</p>
        <a href='/'>掲示板</a>
        <a href='/{uesr}/library/create'>本を登録する</a>
        <h1>マイライブラリ</h1>
        <div class='library'>
            @foreach ($books as $book)
                <div class='books'>
                    <h2 class='title'>
                        <a href="/{uesr}/library/{{ $book->id }}">{{ $book->title }}</a>
                    </h2>
                    <a href="/book_categories/{{ $book->book_category->id }}">{{ $book->book_category->name }}</a>
                    <p class='author'>{{ $book->author }}</p>
                    <form action="/{uesr}/library/{{ $book->id }}" id="form_{{ $book->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $book->id }})">delete</button> 
                    </form>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{$books->links() }}
        </div>
    </body>
</html>
<script>
    function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>