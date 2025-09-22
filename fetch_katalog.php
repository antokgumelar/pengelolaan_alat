<?php
    // Koneksi ke database
    $databaseHost = 'localhost';
    $databaseName = 'gudang_alat';
    $databaseUsername = 'root';
    $databasePassword = '';
    $conn = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Proses pencarian jika form di-submit
    $searchResult = null;
    if (isset($_POST['search'])) {
        $searchQuery = $conn->real_escape_string($_POST['search_query']); // Hindari SQL Injection
        $sql = "SELECT * FROM katalog_alat WHERE kode_alat LIKE '%$searchQuery%' OR nama_alat LIKE '%$searchQuery%'";
        $searchResult = $conn->query($sql);
    }
?>