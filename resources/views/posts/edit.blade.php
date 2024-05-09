<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='content__title'>
                    <h2>タイトル</h2>
                    <input type='text' name='post[title]' value="{{ $post->title }}">
                </div>
                <!--<div class="categories">-->
                <!--    <h2>category</h2>-->
                <!--    <select name="post[category]">-->
                <!--      <option value="category1">First Value</option>-->
                <!--      <option value="category2" selected>Second Value</option>-->
                <!--      <option value="category3">Third Value</option>-->
                <!--    </select>-->
                <!--</div>-->
                <div class='content__body'>
                    <h2>本文</h2>
                    <input type='text' name='post[body]' value="{{ $post->body }}">
                </div>
                <input type="submit" value="保存">
            </form>
            <div class="back">
                [<a href="/">戻る</a>]
            </div>
        </div>
    </body>
</html>