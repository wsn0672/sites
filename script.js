// タイピング風タイトル
document.addEventListener("DOMContentLoaded", () => {
    const titleText = "自家製サーバーテスト";
    const titleElement = document.getElementById("dynamic-title");
    let index = 0;

    function typeWriter() {
        if (index < titleText.length) {
            titleElement.textContent += titleText.charAt(index);
            index++;
            setTimeout(typeWriter, 100);
        }
    }

    typeWriter();

    // クライアント情報表示
    document.getElementById('browser').textContent = navigator.userAgent;

    fetch('https://api.ipify.org?format=json')
        .then(res => res.json())
        .then(data => {
            document.getElementById('ip').textContent = data.ip;
        })
        .catch(() => {
            document.getElementById('ip').textContent = '取得失敗';
        });
});