<x-app-layout>
    <x-slot name="title">ショップページ</x-slot>
    <x-slot name="header">Blog Name</x-slot>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .search-form {
            margin-bottom: 20px;
        }
        .items {
            display: flex;
            flex-wrap: wrap;
        }
        .item {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            width: calc(25% - 40px);
            box-sizing: border-box;
            text-align: center;
        }
        .item img {
            width: 100%;
            height: auto;
        }
        .item h2 {
            font-size: 16px;
            margin: 10px 0;
        }
        .item p {
            font-size: 14px;
            color: #333;
        }
    </style>
    <h1>検索結果</h1>
    <div class="search-form">
        <form action="{{ route('searchIndex') }}" method="GET">
            <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="キーワードを入力">
            <button type="submit">検索</button>
        </form>
    </div>

    @if (!empty($items))
        <div class="items">
            @foreach ($items as $item)
                <div class="item">
                    <img src="{!! $item['img_src'] !!}" alt="{!! $item['title'] !!}">
                    <h2>{!! $item['title'] !!}</h2>
                    <p>価格: {{ number_format($item['price']) }}円</p>
                    <!--購入ページボタン-->
                </div>
            @endforeach
        </div>
    @else
        <p>検索結果が見つかりませんでした。</p>
    @endif
</x-app-layout>
