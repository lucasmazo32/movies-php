<!DOCTYPE html>
<html>
<?php
session_start();
echo file_get_contents("header.html");
$error = $_SESSION['login-error'];
?>
<body class="flex justify-center items-center h-screen">
    <form action="validate_login.php" method="post" class="form-control w-80">
        <h2 class="text-3xl text-center mb-4">Login</h2>
        <div>
            <label for="username" class="label !pb-1">
                username
            </label>
            <input id="username" name="username" type="text" placeholder="aplicant" class="input input-bordered w-full" />
        </div>
        <div>
            <label for="password" class="label !pb-1">
                password
            </label>
            <input id="password" name="password" type="password" placeholder="password" class="input input-bordered w-full" />
        </div>
        <span class="label text-error">
            <?php echo $error ?>
        </span>
        <button id="button" type="submit" class="btn mt-4">
            Submit
        </button>
    </form>
</body>
</html>