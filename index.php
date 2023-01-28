<!DOCTYPE html>
<html>
<?php echo file_get_contents("header.html"); ?>
<body class="flex flex-col justify-center items-center h-screen">
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
    <form action="validate.php" method="post" class="form-control w-80">
        <h2 class="text-3xl text-center mb-4">Create Account</h2>
        <div class="form-control w-full">
            <label for="username" class="label !py-1">
                username
            </label>
            <input id="username" name="username" type="text" placeholder="aplicant" class="input input-bordered w-full" />
            <label for="username" id="username-error" class="label text-error !py-1">
                <?php echo $usernameError; ?>
            </label>
        </div>
        <div class="form-control w-full">
            <label for="phone" class="label !py-1">
                phone
            </label>
            <input id="phone" name="phone" type="tel" placeholder="+123456789" class="input input-bordered w-full" />
            <label for="phone" id="phone-error" class="label text-error !py-1">
                <?php echo $phoneError; ?>
            </label>
        </div>
        <div class="form-control w-full">
            <label for="email" class="label !py-1">
                email
            </label>
            <input id="email" name="email" type="email" placeholder="applicant@talent.com" class="input input-bordered w-full" />
            <label for="email" id="email-error" class="label text-error !py-1">
                <?php echo $emailError; ?>
            </label>
        </div>
        <div class="form-control w-full">
            <label for="password" class="label !py-1">
                password
            </label>
            <input id="password" name="password" type="password" placeholder="password" class="input input-bordered w-full" />
            <label for="password" class="label text-error !py-1" id="password-error">
                <?php echo $passwordError; ?>
            </label>
        </div>
        <button id="button" type="submit" class="btn mt-4 transition" disabled>
            Submit
        </button>
    </form>
    <script src="frontval.js"></script>
    <script>
                validateSignUp()
    </script>
</body>
</html>