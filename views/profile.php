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
    <script src="//code.jquery.com/jquery-3.6.0.js"></script>
    <script src="/js/ajax.js"></script>
</head>
<body>

<header>
    <nav><b>Hello, <?php echo $_SESSION['name']; ?>! <a href='/logout'>Logout</a> <a href='/'>Home</a></b></nav>
</header>

<div class="wrapper">

    <div>
        <h1>Hello, <?php echo $_SESSION['name']; ?>!</h1>
        <div>
            <a type='button' href='/edit-user'>Edit</a>
            <button onclick='delete_f()'>Delete</button>
        </div>
    </div>

    <input type="text" hidden id="registered_user_name" value="<?php echo $_SESSION['name']; ?>">
    <input type="text" hidden id="registered_user_login" value="<?php echo $_SESSION['login']; ?>">
    <input type="text" hidden id="registered_user_email" value="<?php echo $_SESSION['email']; ?>">
    <input type="text" hidden id="registered_user_password" value="<?php echo $_SESSION['password']; ?>">

</div>

</body>
</html>