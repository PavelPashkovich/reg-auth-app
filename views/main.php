<?php
    session_start();
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
        <?php
            if ($_SESSION['name']) {
                echo "<b>Hello, " . $_SESSION['name'] . "!   <a href='/logout'>Logout</a> <a href='/profile'>Profile</a></b>";
            } else {
                echo '<nav>Please <a href="/login">login</a> or <a href="/register">register</a></nav>';
            }
        ?>

    </header>

    <div class="wrapper">
        <h1 class="welcome-text">Welcome!</h1>
    </div>

</body>
</html>