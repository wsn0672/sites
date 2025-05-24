<?php
session_start();

// ここでユーザー名・パスワードを設定（ハードコードOK、あとでDBも可）
$valid_users = [
    'admin' => 'ghm45q0988gh8594r0pqg',  // 例: ユーザー名 admin パスワード password123
    'wsn0672' => 'gheq349govh49g54qw' // 好きなユーザー名とパスワードに変えてOK
];

// POSTされた値を取得
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// 認証チェック
if (isset($valid_users[$username]) && $valid_users[$username] === $password) {
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $username;
    header('Location: /login/secret/');
    exit;
} else {
    // 認証失敗はエラーつけてログイン画面に戻る
    header('Location: /login/?error=1');
    exit;
}