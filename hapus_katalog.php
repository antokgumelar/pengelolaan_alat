<?php
    //check connection
    $databaseHost = 'localhost';
    $databaseName = 'gudang_alat';
    $databaseUsername = 'root';
    $databasePassword = '';

    $mysqli = mysqli_connect($databaseHost,$databaseUsername, $databasePassword, $databaseName);

    if ($mysqli->connect_error) {
        die("Gagal Terkoneksi" . $mysqli->connect_error);
    }

    if (isset($_GET['kode_alat'])) {
        $kode_alat = $_GET['kode_alat'];

        if ($mysqli->connect_error) {
            die("Gagal Terkoneksi" . $mysqli->connect_error);
        }

        $sql = "DELETE FROM katalog_alat WHERE kode_alat = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $kode_alat);

        if ($stmt->execute()) {
            echo "Data berhasil dihapus.";
        } else {
            echo "Error: " . $conn->error;
        }
    
        $stmt->close();
        $mysqli->close();
    
        // Redirect kembali ke halaman utama
        header("Location: cari_katalog.php");
        exit;
    } else {
        echo "kode alat tidak ditemukan.";
    }
?>