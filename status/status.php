<?php
header('Content-Type: application/json');

// CPU使用率
$load = sys_getloadavg()[0]; // 1分平均
$cpuCore = (int) shell_exec("nproc");
$cpu = min(100, round(($load / $cpuCore) * 100, 1)); // 安全に100%上限

// メモリ使用率
$mem = file_get_contents('/proc/meminfo');
preg_match('/MemTotal:\s+(\d+)/', $mem, $total);
preg_match('/MemAvailable:\s+(\d+)/', $mem, $available);
$memUsage = round((($total[1] - $available[1]) / $total[1]) * 100, 1);

// ディスク使用率
$diskFree = disk_free_space("/");
$diskTotal = disk_total_space("/");
$diskUsage = round((1 - $diskFree / $diskTotal) * 100, 1);

echo json_encode([
    "cpu" => $cpu,
    "mem" => $memUsage,
    "disk" => $diskUsage
]);