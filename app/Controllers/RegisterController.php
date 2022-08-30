<?php

namespace App\Controllers;

session_start();

class RegisterController
{
    public function index() {
        if (isset($_SESSION['name']) && !empty($_SESSION['name'])) {
            header('Location: /profile');
        }
        render('register.php');
    }
}