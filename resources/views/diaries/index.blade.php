<x-app-layout>
    <x-slot name="title">日記一覧</x-slot>
    <x-slot name="header">Blog Name</x-slot>
    
    <div class="diaries grid gap-4">
        @foreach ($diaries as $diary)
            @if ( Auth::id()  == $diary->book->user_id )
                <div class="diary bg-gray-100 p-4 rounded-md shadow-md">
                    <h2 class="book text-lg font-semibold mb-2">
                        <p>{{ $diary->book->title }}</p>
                    </h2>
                    <h3 class="date mb-2">
                        <a href="/diaries/{{ $diary->id }}">{{ $diary->date }}</a>
                    </h3>
                    <div class="flex justify-between mt-4">
                        <form action="/diaries/{{ $diary->id }}" method="GET">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                詳細
                            </button>
                        </form>
                        <form action="/diaries/{{ $diary->id }}" id="form_{{ $diary->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="deleteDiary({{ $diary->id }})" class="bg-red-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-red-600">
                                削除
                            </button> 
                        </form>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <div class="paginate mt-4">
        {{ $diaries->links() }}
    </div>

    <script>
        function deleteDiary(id) {
            'use strict'
    
            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
</x-app-layout>
