<?php
    $databaseHost = 'localhost';
    $databaseName = 'gudang_alat';
    $databaseUsername = 'root';
    $databasePassword = '';

    $mysqli = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName);

    if ($mysqli->connect_error) {
        die("Koneksi gagal: " . $mysqli->connect_error);
    }

    if (isset($_GET['kode_alat'])) {
        $kode_alat = $_GET['kode_alat'];

        $sql = "SELECT nama_alat FROM katalog_alat WHERE kode_alat = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $kode_alat);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        echo json_encode($data);
    }
?>
