<?php
session_start();

// 設定
$maxAttempts = 5;
$lockDuration = 15 * 60; // 15分（秒）

// 現在時刻
$now = time();

// ロック中かチェック
if (isset($_SESSION['lock_until']) && $_SESSION['lock_until'] > $now) {
    header('Location: /login/?error=locked');
    exit;
}

// ユーザー一覧（仮）
$valid_users = [
    'admin' => 'password123',
    'wsn0672' => 'supersecret'
];

// 入力値
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// 認証チェック
if (isset($valid_users[$username]) && $valid_users[$username] === $password) {
    // 成功 → セッション初期化＆ログイン
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $username;
    unset($_SESSION['fail_count'], $_SESSION['lock_until']);
    header('Location: /secret/');
    exit;
} else {
    // 失敗 → カウントアップ
    $_SESSION['fail_count'] = ($_SESSION['fail_count'] ?? 0) + 1;

    if ($_SESSION['fail_count'] >= $maxAttempts) {
        $_SESSION['lock_until'] = $now + $lockDuration;
        unset($_SESSION['fail_count']);
        header('Location: /login/?error=locked');
        exit;
    }

    header('Location: /login/?error=1');
    exit;
}