const cpuChartCtx = document.getElementById("cpuChart").getContext("2d");
const memChartCtx = document.getElementById("memChart").getContext("2d");
const diskChartCtx = document.getElementById("diskChart").getContext("2d");
// 真ん中に数値を表示するChart.jsプラグイン
const centerTextPlugin = {
    id: 'centerText',
    afterDraw(chart) {
        const { width } = chart;
        const { height } = chart;
        const { ctx } = chart;
        const value = chart.data.datasets[0].data[0];
        ctx.save();
        ctx.font = 'bold 20px Noto Sans JP';
        ctx.fillStyle = '#00ffff';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillText(`${value.toFixed(1)}%`, width / 2, height / 2);
        ctx.restore();
    }
};

function createChart(ctx, label, color) {
    return new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['使用中', '未使用'],
            datasets: [{
                data: [0, 100],
                backgroundColor: [color, '#333'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: { enabled: false },
                centerText: {} // ← 必須
            },
            cutout: '70%'
        },
        plugins: [centerTextPlugin]
    });
}

const cpuChart = createChart(cpuChartCtx, 'CPU', '#00ffff');
const memChart = createChart(memChartCtx, 'Memory', '#ff00ff');
const diskChart = createChart(diskChartCtx, 'Disk', '#00ff88');

function updateStatus() {
    fetch('status.php')
        .then(res => res.json())
        .then(data => {
            cpuChart.data.datasets[0].data = [data.cpu, 100 - data.cpu];
            memChart.data.datasets[0].data = [data.mem, 100 - data.mem];
            diskChart.data.datasets[0].data = [data.disk, 100 - data.disk];

            cpuChart.update();
            memChart.update();
            diskChart.update();
        });
}

setInterval(updateStatus, 1000); // 毎秒更新
updateStatus(); // 初回即実行