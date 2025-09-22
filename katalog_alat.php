<?php
    $databaseHost = 'localhost';
    $databaseName = 'gudang_alat';
    $databaseUsername = 'root';
    $databasePassword = '';

    $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

    if (isset($_GET['kode_alat'])) {
        $kode = $_GET['kode_alat'];
        $sql = "SELECT nama_alat FROM katalog_alat WHERE kode_alat = ?";

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $kode);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo json_encode([
                'status' => 'success',
                'data' => [
                    'nama_alat' => $row['nama_alat']
                ]
            ]);
        } else {
            echo json_encode (['status' => 'error', 'message' => 'Tidak ditemukan']);
        }

        $stmt->close();
        $mysqli->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Tidak ada']);
    }
?>