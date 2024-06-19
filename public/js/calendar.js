console.log("calendar.js!!");

document.addEventListener("DOMContentLoaded", function() {
    const elem = document.getElementById("my-calendar");

    // 現在の日付を取得
    const today = new Date();
    const todayStr = today.toISOString().split('T')[0]; // 'YYYY-MM-DD'形式

    // FullCalendarの初期化
    const calendar = new FullCalendar.Calendar(elem, {
        initialView: "dayGridMonth", // 月表示
        initialDate: todayStr, // 現在の日付を初期日付に設定
        events: '/events', // イベントデータを取得するURL
        dateClick: (e) => {
            console.log("dateClick:", e);
        },
        eventClick: (e) => {
            if (e.event.url) {
                window.location.href = e.event.url; // イベントをクリックしたときにURLに移動
                e.jsEvent.preventDefault(); // デフォルトのリンク動作を無効にする
            }
        },
        // eventDidMount: (e) => {
        //     tippy(e.el, {
        //         content: e.event.extendedProps.description,
        //         theme: 'custom', // カスタムテーマを指定
        //     });
        // },
    });

    calendar.render();
});
