<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">
    <!-- Tippy.js CSS -->
    <link href="https://unpkg.com/tippy.js@6/dist/tippy.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <!-- Header Section -->
            <header class="bg-white shadow">
                <div class="container mx-auto px-4 py-4">
                    <div class="flex justify-between items-center">
                        <!-- Site Name and User Info -->
                        <div>
                            <div class="text-3xl font-bold text-gray-900">
                                <a href="/home" class="no-underline">{{ $header }}</a>
                            </div>
                            <p class="text-sm text-gray-700">ログインユーザー：{{ Auth::user()->name }}</p>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Menu Section -->
            <!--<nav class="bg-gray-200 shadow mt-2">-->
            <!--    <div class="container mx-auto px-8 py-2">-->
            <!--        <div class="flex justify-center space-x-8 text-2xl">-->
            <!--            <a href='/{{ Auth::id() }}/home' class="text-gray-900 hover:text-blue-500 hover:bg-gray-300 hover:border-gray-400 py-2 px-4 border-b-4 border-transparent">HOME</a>-->
            <!--            <a href='/{{ Auth::id() }}/library' class="text-gray-900 hover:text-blue-500 hover:bg-gray-300 hover:border-gray-400 py-2 px-4 border-b-4 border-transparent">マイライブラリ</a>-->
            <!--            <a href='/posts/index' class="text-gray-900 hover:text-blue-500 hover:bg-gray-300 hover:border-gray-400 py-2 px-4 border-b-4 border-transparent">掲示板</a>-->
            <!--            <a href='/diaries/index' class="text-gray-900 hover:text-blue-500 hover:bg-gray-300 hover:border-gray-400 py-2 px-4 border-b-4 border-transparent">日記の一覧</a>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</nav>-->
        @endif

        <!-- Page Content -->
        <main class="container mx-auto px-4 py-6">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
