<x-app-layout>
    <x-slot name="title">投稿作成画面</x-slot>
    <x-slot name="header">Blog Name</x-slot>

    <form action="/posts" method="POST" class="max-w-md mx-auto mt-8 space-y-4">
        @csrf
        <div class="title">
            <h2>Title</h2>
            <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}" class="border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 w-full">
            <p class="title__error mt-1 text-red-500">{{ $errors->first('post.title') }}</p>
        </div>
        <div class="category">
            <h2>Category</h2>
            <select name="post[category_id]" class="border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 w-full">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="body">
            <h2>Body</h2>
            <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。" class="border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500 w-full h-32 resize-none">{{ old('post.body') }}</textarea>
            <p class="body__error mt-1 text-red-500">{{ $errors->first('post.body') }}</p>
        </div>
        <div class="flex justify-center">
            <input type="submit" value="保存" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md shadow-md transition duration-300 ease-in-out transform hover:scale-105">
        </div>
    </form>

    <div class="back mt-4 mx-auto max-w-md">
        [<a href="#" onclick="history.back()" class="text-blue-500 hover:underline">戻る</a>]
    </div>
</x-app-layout>
