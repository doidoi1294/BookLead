<x-app-layout>
    <x-slot name="title">日記編集ページ</x-slot>
    <x-slot name="header">Blog Name</x-slot>
    
    <div class="content">
        <form action="/diaries/{{ $diary->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="book">
                <h2>読んだ本を選択</h2>
                <select name="diary[book_id]">
                    @foreach($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="date">
                <h2>記録の日付</h2>
                <input name="diary[date]" type="date" cmanCLDat="USE:ON" value="{{ old('diary.date', date('Y-m-d')) }}">
                <p class="date__error" style="color:red">{{ $errors->first('diary.date') }}</p>
            </div>
            <div class="page">
                <h2>読んだページ数</h2>
                <input type="number" name="diary[page]" placeholder="ページ数を入力(半角数字)">{{ old('diary.page') }}
                <p class="page__error" style="color:red">{{ $errors->first('diary.page') }}</p>
            </div>
            <div class="body">
                <h2>読書日記</h2>
                <textarea name="diary[body]" placeholder="読書日記を入力">{{ old('diary.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('diary.body') }}</p>
            </div>
            <input type="submit" value="更新">
        </form>
        <div class="back">
                [<a href="#" onclick="history.back()">戻る</a>]
        </div>
    </div>
</x-app-layout>