<?php

session_start();

function is_logged_in() {
    return isset($_SESSION['user']);
}

function require_login() {
    if (!is_logged_in()) {
        header('Location: ' . BASE_URL . 'views/auth/login.php');
        exit();
    }
}
