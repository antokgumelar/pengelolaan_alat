<?php
    session_start(); // Mulai session

    // Periksa apakah user_id ada di session
    if (!isset($_SESSION['user_id'])) {
        // Jika tidak ada, redirect ke halaman login
        header('Location: login.php');
        exit;
    }
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
        // Jika session lebih dari 30 menit tidak aktif, hapus session
        session_unset();
        session_destroy();
        header('Location: login.php');
        exit;
    }
    $_SESSION['LAST_ACTIVITY'] = time(); // Update waktu aktivitas terakhir
?>