<?php
    $databaseHost = 'localhost';
    $databaseName = 'gudang_alat';
    $databaseUsername = 'root';
    $databasePassword = '';

    $mysqli = mysqli_connect($databaseHost,$databaseUsername,$databasePassword,$databaseName);

    if ($mysqli->connect_error) {
        die("Gagal Terkoneksi". $mysqli->connect_error);
    }

    if (isset($_GET['nik_pegawai'])) {
        $nik_pegawai = $_GET['nik_pegawai'];

        if ($mysqli->connect_error) {
            die("Gagal Terkoneksi" . $mysqli->connect_error);
        }

        $sql = "DELETE FROM data_pegawai WHERE nik_pegawai =? ";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $nik_pegawai);

        if ($stmt->execute()) {
            echo "Data berhasil dihapus.";
        } else {
            echo "Error: ". $conn-error;
        }

        $stmt->close();
        $mysqli->close();

        header("Location: cari_pegawai.php");
        exit();
    } else {
        echo "nik pegawai tidak ditemukan";
    }
?>