<?php
    $databaseHost = 'localhost';
    $databaseName = 'gudang_alat';
    $databaseUsername = 'root';
    $databasePassword = '';

    $mysqli = mysqli_connect($databaseHost,$databaseUsername,$databasePassword,$databaseName);
    if ($mysqli->connect_error) {
        die("Koneksi gagal: ". $mysqli->connect_error);
    }

    $notifikasi = false;
    $sql = "SELECT COUNT(*) as total FROM pinjam_alat WHERE status_peminjaman = 'Sedang Diajukan'";
    $result = $mysqli->query($sql);

    if ($result && $row = $result->fetch_assoc()) {
        if ($row['total'] > 0) {
            $notifikasi = true;
            $totalNotif = $row['total'];
        } 
    }
 
?>