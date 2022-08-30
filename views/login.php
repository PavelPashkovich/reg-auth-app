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
    <nav>
        <a href="/">Home</a>
    </nav>
</header>

<div class="wrapper">
        
        <form action="">

            <label for="login_auth">Login</label>
            <input type="text" id="login_auth" name="login" placeholder="Enter your login here...">
            <p id="login_auth_error" hidden></p>

            <label for="password_auth">Password</label>
            <input type="password" id="password_auth" name="password" placeholder="Enter your password here...">
            <p id="password_auth_error" hidden></p>

            <button onclick="login_f()">Submit</button>

            <p>Not registered? - <a href="/register">register</a>!</p>

            <p id="message_auth" hidden></p>
            <p id="message" hidden></p>
            
        </form>

</div>

</body>
</html>