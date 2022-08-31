<?php
session_start();
if (!isset($_SESSION['name'])) {
    header('Location: /');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="/js/ajax.js"></script>
</head>
<body>

<header>
    <nav><b>Hello, <?php echo $_SESSION['name']; ?>! <a href='/profile'>Profile</a> <a href='/logout'>Logout</a> <a href='/'>Home</a></b></nav>
</header>

<div class="wrapper">

    <form action="">

        <label for="user_name">Name</label>
        <input type="text" id="user_name" name="user_name" value="<?php echo $_SESSION['name']; ?>">
        <p id="name_error" hidden></p>

        <label for="login">Login</label>
        <input type="text" id="login" name="login" value="<?php echo $_SESSION['login']; ?>">
        <p id="login_error" hidden></p>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo $_SESSION['email']; ?>">
        <p id="email_error" hidden></p>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter new password here...">
        <p id="password_error" hidden></p>

        <label for="password-confirm">Confirm password</label>
        <input type="password" id="password-confirm" name="password-confirm"
               placeholder="Confirm your new password here...">
        <p id="password_confirm_error" hidden></p>

        <button onclick="register()">Submit</button>

        <p id="message" hidden></p>

    </form>

</div>

</body>
</html>