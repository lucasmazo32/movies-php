<?php
session_start();
class User {
    public $username;
    public $phone;
    public $email;
    public $password;
    public $loggedIn = false;
}

function validateUser() {
    $user = $_SESSION['user'];

    if ($user->username == $_POST['username'] && $user->password == $_POST['password']) {
        $user->loggedIn = true;
        $_SESSION['user'] = $user;
        header("Location: homepage.php");
    } else {
        $_SESSION['login-error'] = 'Wrong username/password combination';
        header("Location: login.php");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    validateUser();
}
?>