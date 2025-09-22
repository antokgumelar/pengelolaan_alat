<?php
session_start(); // Mulai session

$databaseHost = 'localhost';
$databaseName = 'gudang_alat';
$databaseUsername = 'root';
$databasePassword = '';

try {
    $pdo = new PDO("mysql:host=$databaseHost;dbname=$databaseName;charset=utf8", $databaseUsername, $databasePassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_input(INPUT_POST, 'email_akun', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password_akun'] ?? '';

    if (empty($email) || empty($password)) {
        echo json_encode(['error' => 'Email dan Password harus diisi']);
        exit;
    }

    $stmt = $pdo->prepare('SELECT * FROM user_akun WHERE email_akun = :email_akun');
    $stmt->execute(['email_akun' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo json_encode(['error' => 'Email tidak ditemukan']);
        exit;
    }

    // Verifikasi password yang di-hash
    if (password_verify($password, $user['password_akun'])) {
        $_SESSION['user_id'] = $user['id_akun'];
        echo json_encode(['message' => 'Login Berhasil']);
    } else {
        echo json_encode(['error' => 'Password salah']);
    }
}
?>