<x-app-layout>
    <x-slot name="title">トップページ</x-slot>
    <x-slot name="header">Blog Name</x-slot>

    <!--カレンダーを実装する-->
    <div id="my-calendar"></div>
    
    <div class="flex justify-center mt-20">
        <form action="/diaries/create" method="GET">
            <button type="submit" class="bg-orange-400 hover:bg-orange-500 text-white font-bold py-4 px-8 rounded-lg shadow-md transform transition-transform active:scale-95 text-xl">
                読書日記を書く
            </button>
        </form>
    </div>
    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js" defer></script>
    <!-- Tippy.js JS -->
    <script src="https://unpkg.com/@popperjs/core@2" defer></script>
    <script src="https://unpkg.com/tippy.js@6" defer></script>
    <!-- Your custom JS -->
    <script src="{{ asset('js/calendar.js') }}" defer></script>
</x-app-layout>