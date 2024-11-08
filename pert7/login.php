<?php
session_start();

$array = $_SESSION['array'] ?? [];
$userMsg = $passMsg = "";

// username
if (isset($_POST['add_user'])) {
    $newUser = $_POST['new_user'] ?? '';
    $_SESSION['temp_user'] = $newUser;
    $userMsg = "<p>Username $newUser berhasil ditambahkan!</p>";
}

// password
if (isset($_POST['add_pass']) && isset($_SESSION['temp_user'])) {
    $newPass = $_POST['new_password'] ?? '';
    $_SESSION['array'][$_SESSION['temp_user']] = $newPass;
    unset($_SESSION['temp_user']);
    $passMsg = "<p>Password berhasil ditambahkan!</p>";
}

//  login
if (isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    if (isset($array[$username]) && $array[$username] === $password) {
        $_SESSION['username'] = $username;
        $_SESSION['LAST_ACTIVITY'] = time() + 10;
        header("Location: index.php");
        exit();
    }
}

// Logout
if (isset($_SESSION['LAST_ACTIVITY']) && time() > $_SESSION['LAST_ACTIVITY']) {
    session_unset();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <h2>Tambahkan Username!</h2>
    <form method="POST" action="">
        <input type="text" name="new_user" placeholder="Username" required>
        <input type="submit" name="add_user" value="Tambah Username">
    </form>
    <?= $userMsg; ?>

    <h2>Tambahkan Password!</h2>
    <form method="POST" action="">
        <input type="password" name="new_password" placeholder="Password" required>
        <input type="submit" name="add_pass" value="Tambah Password">
    </form>
    <?= $passMsg; ?>

    <h2>Silakan Login!</h2>
    <form method="POST" action="">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Login" name="login"></td>
            </tr>
        </table>
    </form>
</body>

</html>