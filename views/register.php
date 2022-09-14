<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <noscript>
        <link rel="stylesheet" href="/css/no-js.css">
    </noscript>
    <link rel="stylesheet" href="/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="/js/ajax.js"></script>
</head>
<body>

<header>
    <nav>
        <a href="/">Home</a>
    </nav>
</header>

<div class="wrapper">

    <form action="">

        <label for="user_name">Name</label>
        <input type="text" id="user_name" name="user_name" placeholder="Enter your name here...">
        <p id="name_error" hidden></p>

        <label for="login">Login</label>
        <input type="text" id="login" name="login" placeholder="Enter your login here...">
        <p id="login_error" hidden></p>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email here...">
        <p id="email_error" hidden></p>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password here...">
        <p id="password_error" hidden></p>

        <label for="password-confirm">Confirm password</label>
        <input type="password" id="password-confirm" name="password-confirm"
               placeholder="Enter your password again here...">
        <p id="password_confirm_error" hidden></p>

        <button onclick="register()">Submit</button>

        <p>Already registered? - <a href="/login">login</a>!</p>

        <p id="message" hidden></p>

    </form>

    <h2 class="no-js" hidden>JavaScript is not enabled! Check your browser settings!</h2>

</div>

</body>
</html>