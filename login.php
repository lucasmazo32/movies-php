<!DOCTYPE html>
<html>
<?php
    session_start();
    echo file_get_contents("header.html");
    $error = $_SESSION['login-error'];
?>
<body class="center">
    <form action="validate_login.php" method="post" class="form f-fcol">
        <h2>Login</h2>
        <label class="f-fcol label">
            username
            <input id="username" name="username" type="text" placeholder="aplicant" />
        </label>
        <label class="f-fcol label">
            password
            <input id="password" name="password" type="password" placeholder="password" />
        </label>
        <span class="error"><?php echo $error ?></span>
        <button id="button" type="submit" class="submit">
            Submit
        </button>
    </form>
</body>
</html>