// タイピング風アニメーションのJS
document.addEventListener("DOMContentLoaded", () => {
    const titleText = "自家製サーバーテスト";
    const titleElement = document.getElementById("dynamic-title");
    let index = 0;

    function typeWriter() {
        if (index < titleText.length) {
            titleElement.textContent += titleText.charAt(index);
            index++;
            setTimeout(typeWriter, 100); // 文字のスピード
        }
    }

    typeWriter();
});

// ブラウザ情報取得
const browserSpan = document.getElementById('browser');
browserSpan.textContent = navigator.userAgent;

// IPアドレス取得（無料APIを利用）
fetch('https://api.ipify.org?format=json')
    .then(response => response.json())
    .then(data => {
        document.getElementById('ip').textContent = data.ip;
    })
    .catch(() => {
        document.getElementById('ip').textContent = '取得失敗';
    });