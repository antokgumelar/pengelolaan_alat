<?php
    header('Content-Type: application/json');

    // Koneksi ke database
    $databaseHost = 'localhost';
    $databaseName = 'gudang_alat';
    $databaseUsername = 'root';
    $databasePassword = '';

    $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

    if (!$mysqli) {
        echo json_encode(["status" => "error", "message" => "Gagal Terkoneksi: " . mysqli_connect_error()]);
        exit();
    }

    $sql = "SELECT kode_alat, nama_alat FROM katalog_alat";
    $result = $mysqli->query($sql);

    if (!$result) {
        echo json_encode(["status" => "error", "message" => "Query gagal: " . $mysqli->error]);
        exit();
    }

    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row; // Simpan data kode alat dan nama alat
        }
    }

    $mysqli->close();

    echo json_encode(["status" => "success", "data" => $data]);
?>