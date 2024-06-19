<x-app-layout>
    <x-slot name="title">投稿編集画面</x-slot>
    <x-slot name="header">Blog Name</x-slot>
    <div class="content">
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__title'>
                <h2>タイトル</h2>
                <input type='text' name='post[title]' value="{{ $post->title }}">
            </div>
            <div class='content__body'>
                <h2>本文</h2>
                <input type='text' name='post[body]' value="{{ $post->body }}">
            </div>
            <input type="submit" value="保存">
        </form>
        <div class="back">
            [<a href="#" onclick="history.back()">戻る</a>]
        </div>
    </div>
</x-app-layout>