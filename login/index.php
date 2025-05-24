<?php
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: /secret/');
    exit;
}
$error = $_GET['error'] ?? '';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <title>ログイン</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        body {
            background-color: #0a0a0a;
            color: #00ffff;
            font-family: 'Noto Sans JP', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-box {
            background: #111;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 0 30px #00ffff88;
            width: 320px;
        }
        h1 {
            margin-bottom: 1.5rem;
            text-align: center;
        }
        label {
            display: block;
            margin-top: 1rem;
            font-weight: bold;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 0.6rem;
            margin-top: 0.4rem;
            border: none;
            border-radius: 6px;
        }
        input[type="submit"] {
            margin-top: 1.5rem;
            width: 100%;
            background-color: #00ffff;
            border: none;
            padding: 0.8rem;
            font-weight: bold;
            cursor: pointer;
            border-radius: 6px;
            color: #000;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #00dddd;
        }
        .error {
            margin-top: 1rem;
            color: #ff4444;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h1>ログイン</h1>
        <?php if ($error): ?>
            <p class="error">ちげぇよバカ</p>
        <?php endif; ?>
        <form action="authenticate.php" method="post">
            <label for="username">ユーザー名</label>
            <input type="text" id="username" name="username" required autocomplete="username" />
            <label for="password">パスワード</label>
            <input type="password" id="password" name="password" required autocomplete="current-password" />
            <input type="submit" value="ログイン" />
        </form>
    </div>
</body>
</html>