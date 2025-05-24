function updateStatus() {
    fetch('status.php')
        .then(res => res.json())
        .then(data => {
            document.getElementById("cpu").textContent = data.cpu + " %";
            document.getElementById("mem").textContent = data.mem + " %";
            document.getElementById("disk").textContent = data.disk + " %";
        })
        .catch(() => {
            document.getElementById("cpu").textContent = "エラー";
            document.getElementById("mem").textContent = "エラー";
            document.getElementById("disk").textContent = "エラー";
        });
}

setInterval(updateStatus, 5000); // 5秒ごとに更新
updateStatus(); // 初回即実行