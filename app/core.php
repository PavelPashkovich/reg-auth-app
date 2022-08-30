<?php

function render($template = '') {
    $path = __DIR__ . "/../views/" . $template;
    if (file_exists($path) && is_file($path)) {
        include $path;
    } else {
        echo "VIEW NOT FOUND";
    }
}

function getDatabase() {
    $db_path = __DIR__ . '/../storage/database.json';
    $database = json_decode(file_get_contents($db_path), true);
    return $database['users'];
}

function saveDatabase($users) {
    $db_path = __DIR__ . '/../storage/database.json';
    $database = json_decode(file_get_contents($db_path), true);
    $database['users'] = $users;
    file_put_contents($db_path, json_encode($database));
}
