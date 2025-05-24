<?php
header('Content-Type: application/json');

// CPU使用率
$cpuLoad = sys_getloadavg()[0]; // 1分間の平均

// メモリ情報（KB）
$memInfo = file_get_contents('/proc/meminfo');
preg_match('/MemTotal:\s+(\d+)/', $memInfo, $total);
preg_match('/MemAvailable:\s+(\d+)/', $memInfo, $free);
$memUsage = round((($total[1] - $free[1]) / $total[1]) * 100, 1);

// ディスク使用率
$diskFree = disk_free_space("/");
$diskTotal = disk_total_space("/");
$diskUsage = round((1 - $diskFree / $diskTotal) * 100, 1);

echo json_encode([
    'cpu' => $cpuLoad,
    'mem' => $memUsage,
    'disk' => $diskUsage
]);