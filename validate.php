<?php
    session_start();
    class User {
        public $username;
        public $phone;
        public $email;
        public $password;
        public $loggedIn = false;
    }

    function validateFields() {
        $usernamePattern = "/^[a-z]+$/i";
        $phonePattern = "/^\+[0-9]{9}$/i";
        $emailPattern = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/i";
        $passwordUpperPattern = "/^.*[A-Z].*$/";
        $passwordSpecialPattern = "/^.*[\*\-\.].*$/i";
        $usernameValid = preg_match($usernamePattern, $_POST["username"]);
        $phoneValid = preg_match($phonePattern, $_POST["phone"]);
        $emailValid = preg_match($emailPattern, $_POST["email"]);
        $passwordValid = false;
        if (strlen($_POST["password"]) > 5) {
            $passwordValid = preg_match($passwordSpecialPattern, $_POST["password"]) && preg_match($passwordUpperPattern, $_POST["password"]);
        }


        if ($usernameValid && $emailValid && $passwordValid && $phoneValid) {
            $user = new User();
            $user->username = $_POST["username"];
            $user->phone = $_POST["phone"];
            $user->email = $_POST["email"];
            $user->password = $_POST["password"];
            $_SESSION['user-username'] = $_POST["username"];
            $_SESSION['user-password'] = $_POST["password"];
            $_SESSION['user'] = $user;
            header("Location: login.php");
        } else {
            $_SESSION['username-error'] = $usernameValid ? '' : "The username can't be empty and must only contain letters";
            $_SESSION['email-error'] = $emailValid ? '' : "The email must have a valid format. Ex: applicant@talent.com";
            $_SESSION['phone-error'] = $phoneValid ? '' : "The phone must start with + and contain exactly 9 numbers";
            $_SESSION['password-error'] = $passwordValid ? '' : 'The password must contain a ".", "*" or "-", one upper-cased letter and at least 6 characters';
            header("Location: index.php");
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        validateFields();
    }
?>