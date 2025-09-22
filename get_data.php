<?php
    $databaseHost = 'localhost';
    $databaseName = 'gudang_alat';
    $databaseUsername = 'root';
    $databasePassword = '';

    $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

    if ($mysqli->connect_error) {
        die("Koneksi gagal: " . $mysqli->connect_error);
    }

    if (isset($_GET['id_pinjam'])) {
        $id_pinjam = $_GET['id_pinjam'];

        $sql = "SELECT * FROM pinjam_alat WHERE id_pinjam = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $id_pinjam);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            echo json_encode($data);
        } else {
            echo json_encode(null);
        }

        $stmt->close();
    }

    $mysqli->close();
?>