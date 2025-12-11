<?php
// controllers/AuthController.php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/session.php';

$action = $_GET['action'] ?? '';

if ($action === 'login') {
    // Tangkap input dari form
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Ambil data user
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND status_aktif = 1");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Compare passwords directly without hashing
    if ($user && $password === $user['password']) {
        // Simpan ke session
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'role' => $user['role'],
            'id_referensi' => $user['id_referensi']
        ];

        // Redirect ke dashboard sesuai role
        header("Location: ../views/{$user['role']}/dashboard.php");
        exit;
    } else {
        header("Location: ../index.php?error=Username atau password salah");
        exit;
    }
}

if ($action === 'logout') {
    session_destroy();
    header("Location: ../index.php");
    exit;
}

echo "Aksi tidak dikenali.";