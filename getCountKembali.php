<?php
    $databaseHost = 'localhost';
    $databaseName = 'gudang_alat';
    $databaseUsername = 'root';
    $databasePassword = '';

    $pdo = new PDO("mysql:host=$databaseHost;dbname=$databaseName", $databaseUsername, $databasePassword);
    // Query untuk menghitung jumlah data
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM kembali_alat"); // Ganti 'katalog' dengan tabel yang sesuai
    $stmt->execute();

    // Ambil hasilnya
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Kirim jumlah data dalam format JSON
    echo json_encode(['count' => $row['COUNT(*)']]);
?>