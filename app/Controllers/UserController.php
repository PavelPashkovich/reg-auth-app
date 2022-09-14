<?php


namespace App\Controllers;

session_start();

class UserController
{
    public function addUser() {
        $name = $_POST['name'];
        $login = trim($_POST['login']);
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirm = $_POST['passwordConfirm'];

        // Go to database.json
        $users = getDatabase();

        $result = [];

        // Check database for existence
        if (!isset($users)) {
            $result = ['message' => 'Database error!'];
        }

        // Validate name
        if (!ctype_alpha($name) || strlen($name) < 2) {
            $result['name_error'] = 'Name must contain only letters (min 2 characters)!';
        }

        // Validate login
        $login = trim($login);
        if (strlen($login) < 6 || in_array(' ', str_split($login))) {
            $result['login_error'] = 'Login must be min 6 characters long! Spaces are not allowed!';
        }

        // Check login for existence
        if (!(isset($_SESSION['login']) && !empty($_SESSION['login']))) {
            foreach ($users as $user) {
                if ($user['login'] == $login) {
                    $result['login_error'] = 'This login already registered!';
                }
            }
        }

        // Validate email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result['email_error'] = 'You must enter a valid email!';
        }

        // Check email for existence
        if (!(isset($_SESSION['email']) && !empty($_SESSION['email']))) {
            foreach ($users as $user) {
                if ($user['email'] == $email) {
                    $result['email_error'] = 'This email already exists!';
                }
            }
        }

        // Validate password
        if (!ctype_alnum($password) || strlen($password) < 6) {
            $result['password_error'] = 'Password must contain only letters and numbers! (min 6 characters)';
        }

        // Validate password-confirm
        if ($password != $password_confirm) {
            $result['password_confirm_error'] = 'Passwords are not equal!';
        }

        // if there are no errors add user to database
        if (empty($result)) {
            $password = md5($password . $login);

            if (isset($_SESSION['login']) && !empty($_SESSION['login'])) {
                foreach ($users as $index => $user) {
                    if ($user['login'] == $_SESSION['login']) {
                        unset($users[$index]);
                    }
                }
                $_SESSION['name'] = $name;
                $_SESSION['login'] = $login;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
            }

            $users[] = ["name" => $name, "login" => $login, "email" => $email, "password" => $password];

            saveDatabase($users);
        }

        //return ajax response
        $response = json_encode($result);
        echo $response;
    }

    public function checkUser() {
        $login = $_POST['login'];
        $password = $_POST['password'];

        // Go to database.json
        $users = getDatabase();

        $result = [];

        // Check database for existence
        if (!isset($users)) {
            $result = ['message' => 'Database error!'];
        }

        // check user and add user data to session
        foreach ($users as $user) {
            if ($user['login'] == $login && $user['password'] == md5($password . $login)) {
                $name = $user['name'];
                $email = $user['email'];
                $_SESSION['name'] = $name;
                $_SESSION['login'] = $login;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $result = [];
                break;
            } else {
                $result['message_auth'] = 'Wrong login or password!';
            }
        }

        //return ajax response
        $response = json_encode($result);
        echo $response;

    }

    public function deleteUser() {
        $registered_user_login = $_POST['registered_user_login'];

        // Go to database.json
        $users = getDatabase();

        $result = [];

        // Check database for existence
        if (!isset($users)) {
            $result = ['message' => 'Database error!'];
        }

        // Find user by login and delete it from database
        foreach ($users as $index => $user) {
            if ($user['login'] == $registered_user_login) {
                unset($users[$index]);
            }
        }

        // Destroy session
        session_destroy();

        // Save database
        saveDatabase($users);

        $response = json_encode($result);
        echo $response;
    }

}