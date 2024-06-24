<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ホーム画面</title>

        <!-- Fonts -->
        <!--<link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">-->

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
            html{line-height:1.15;-webkit-text-size-adjust:100%}
            body{margin:0}a{background-color:transparent}[hidden]{display:none}
            html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}
            a{color:inherit;text-decoration:inherit}
            svg,video{display:block;vertical-align:middle}
            video{max-width:100%;height:auto}
            .bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}
            .bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}
            .border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}
            .border-t{border-top-width:1px}
            .flex{display:flex}
            .grid{display:grid}
            .hidden{display:none}
            .items-center{align-items:center}
            .justify-center{justify-content:center}
            .font-semibold{font-weight:600}
            .h-5{height:1.25rem}
            .h-8{height:2rem}
            .h-16{height:4rem}
            .text-sm{font-size:.875rem}
            .text-lg{font-size:1.125rem}
            .leading-7{line-height:1.75rem}
            .mx-auto{margin-left:auto;margin-right:auto}
            .ml-1{margin-left:.25rem}
            .mt-2{margin-top:.5rem}
            .mr-2{margin-right:.5rem}
            .ml-2{margin-left:.5rem}
            .mt-4{margin-top:1rem}
            .ml-4{margin-left:1rem}
            .mt-8{margin-top:2rem}
            .ml-12{margin-left:3rem}
            .-mt-px{margin-top:-1px}
            .max-w-6xl{max-width:72rem}
            .min-h-screen{min-height:100vh}
            .overflow-hidden{overflow:hidden}
            .p-6{padding:1.5rem}
            .py-4{padding-top:1rem;padding-bottom:1rem}
            .px-6{padding-left:1.5rem;padding-right:1.5rem}
            .pt-8{padding-top:2rem}.fixed{position:fixed}
            .relative{position:relative}
            .top-0{top:0}.right-0{right:0}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .button {
                background-color: #4CAF50;
                border: none;
                color: white;
                padding: 16px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                transition-duration: 0.4s;
                cursor: pointer;
                border-radius: 12px;
            }

            .button:hover {
                background-color: white;
                color: black;
                border: 2px solid #4CAF50;
            }

            .text-lg {
                font-size: 1.5rem;
            }

            .p-6 {
                padding: 3rem;
            }

            .grid-cols-2 {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }

            .button-spacing {
                margin: 2rem 3rem;
            }
            
            .logo {
                color: orange;
                font-size: 3rem;
                font-weight: bold;
                font-family: 'Arial', sans-serif;
                text-shadow:
                       1px 1px 0px #fff, -1px -1px 0px #fff,
                      -1px 1px 0px #fff,  1px -1px 0px #fff,
                       1px 0px 0px #fff, -1px  0px 0px #fff,
                       0px 1px 0px #fff,  0px -1px 0px #fff;
            }
            
            .reflect-x {
              transform: scaleX(-1);
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <div class="logo">Book &nbsp;</div>
                    <div class="logo reflect-x">L</div>
                    <div class="logo">Read</div>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="text-2xl">アイコン</div>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">機能1</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">あ</div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            <div class="flex items-center">
                               <div class="text-2xl">アイコン</div>
                               <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">機能2</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">あ</div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <div class="text-2xl">アイコン</div>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">機能3</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">あ</div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="flex items-center">
                                <div class="text-2xl">アイコン</div>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">機能4</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">あ</div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (Route::has('login'))
                    <div class="mt-6 flex justify-center space-x-8">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="button button-spacing">
                            ダッシュボード
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="button button-spacing">
                            ログイン
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="button button-spacing">
                                新規登録
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </body>
</html>
