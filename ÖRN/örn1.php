<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Başlıksız Belge</title>
</head>

<body style="background-color: aqua" >
	<?php
session_start();

// Oturum açma işlemi
if (isset($_POST['submit'])) {
    $username = 'admin';
    $password = '123';
    if ($_POST['username'] == $username && $_POST['password'] == $password) {
        // Kullanıcı adı ve şifre doğruysa oturum başlat
        $_SESSION['loggedin'] = true;
        header('Location: index.php');
        exit;
    } else {
        // Kullanıcı adı veya şifre yanlış
        $error = "Kullanıcı adı veya şifre yanlış!";
    }
}

// Oturum kapatma işlemi
if (isset($_POST['logout'])) {
    // Cookie'yi sil
    setcookie(session_name(), '', time() - 3600);
    // Oturumu sonlandır
    session_unset();
    session_destroy();
}

// Kullanıcı oturum açmadıysa
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Giriş formu göster
    echo "
        <form method='post' action='index.php'>
            <label>Kullanıcı adı:</label>
            <input type='text' name='username'><br>
            <label>Şifre:</label>
            <input type='password' name='password'><br>
            <input type='submit' name='submit' value='Oturum aç'>
        </form>
    ";
} else {
    // Kullanıcı oturum açtıysa
    $username = 'admin';
    echo "Merhaba, $username! <br>";
    echo "
        <form method='post' action='index.php'>
            <input type='hidden' name='logout' value='1'>
            <input type='submit' value='Oturumu kapat'>
        </form>
    ";
}

if (isset($error)) {
    echo $error;
}
?>
</body>
</html>