<?php
session_start();

if (time() == $_SESSION['LAST_ACTIVITY']) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!doctype html>

<head>
    <title>Beranda</title>
</head>

<body>
    <h1>Halaman Index</h1>
    <p>Selamat datang <strong> <?= $_SESSION["username"] ?></strong>, Anda berhasil login!</p>
    <p> <?= $_SESSION["LAST_ACTIVITY"] - time() ?></p>
</body>

</html>