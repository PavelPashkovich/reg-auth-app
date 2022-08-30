<?php

namespace App\Controllers;

session_start();

class LoginController
{
    public function index() {
        if (isset($_SESSION['name']) && !empty($_SESSION['name'])) {
            header('Location: /profile');
        }
        render('login.php');
    }
}