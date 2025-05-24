<?php
session_start();

// ログインしてなかったらログインページへリダイレクト
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: /login/');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <title>シークレットページ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        body {
            background-color: #0a0a0a;
            color: #00ffff;
            font-family: 'Noto Sans JP', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 2rem;
            min-height: 100vh;
            margin: 0;
        }
        header {
            width: 100%;
            max-width: 720px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        h1 {
            margin: 0;
            font-weight: bold;
        }
        a.logout-btn {
            background-color: #00ffff;
            color: #000;
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        a.logout-btn:hover {
            background-color: #00dddd;
        }
        main {
            width: 100%;
            max-width: 720px;
        }
    </style>
</head>
<body>
    <header>
        <h1>シークレットページ</h1>
        <a href="/login/secret/logout.php" class="logout-btn">ログアウト</a>
    </header>
    <main>
        <p>ようこそ、<strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>さん！</p>
        <p>ここはきみだけがアクセスできる秘密のページだぜ…！</p>

        <!-- ここに管理者向けのコンテンツを自由に追加していける！ -->
    </main>
</body>
</html>