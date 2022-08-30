<?php

namespace App\Controllers;

class MainController
{
    public function index() {
        render('main.php');
    }

    public function notFound() {
        render('404.php');
    }
}