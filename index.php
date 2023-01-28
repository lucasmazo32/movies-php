<!DOCTYPE html>
<html>
<?php echo file_get_contents("header.html"); ?>
<body class="center">
    <?php
    session_start();
    class User {
        public $username;
        public $phone;
        public $email;
        public $password;
        public $loggedIn;
    }
    $user = $_SESSION['user'];
    if (isset($user->username)) {
        if ($user->loggedIn) {
            header("Location: homepage.php");
        } else {
            header("Location: login.php");
        }
    }
    $usernameError = $_SESSION['username-error'];
    $phoneError = $_SESSION['phone-error'];
    $emailError = $_SESSION['email-error'];
    $passwordError = $_SESSION['password-error'];
    ?>
    <form action="validate.php" method="post" class="form f-fcol">
        <h2>Create Account</h2>
        <label class="f-fcol label">
            username
            <input id="username" name="username" type="text" placeholder="aplicant" />
            <span id="username-error">
                <?php echo $usernameError; ?>
            </span>
        </label>
        <label class="f-fcol label">
            phone
            <input id="phone" name="phone" type="tel" placeholder="+123456789" />
            <span id="phone-error">
                <?php echo $phoneError; ?>
            </span>
        </label>
        <label class="f-fcol label">
            email
            <input id="email" name="email" type="email" placeholder="applicant@talent.com" />
            <span id="email-error">
                <?php echo $emailError; ?>
            </span>
        </label>
        <label class="f-fcol label">
            password
            <input id="password" name="password" type="password" placeholder="password" />
            <span id="password-error">
                <?php echo $passwordError; ?>
            </span>
        </label>
        <button id="button" type="submit" class="submit" disabled>
            Submit
        </button>
    </form>
    <script src="frontval.js"></script>
    <script>
                validateSignUp()
    </script>
</body>
</html>