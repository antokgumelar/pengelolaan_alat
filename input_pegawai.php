<?php
    $databaseHost = 'localhost';
    $databaseName = 'gudang_alat';
    $databaseUsername = 'root';
    $databasePassword = '';

    $mysqli = mysqli_connect($databaseHost,$databaseUsername,$databasePassword,$databaseName);

    if ($mysqli->connect_error) {
        die("Gagal Terkoneksi: ". $mysqli->connect_error);
    }

    $nik_pegawai = $_POST['nik_pegawai'];
    $nama_pegawai = $_POST['nama_pegawai'];
    $no_wa_pegawai = $_POST['no_wa_pegawai'];

    $sql = "INSERT INTO data_pegawai (nik_pegawai, nama_pegawai, no_wa_pegawai)
            VALUES ('$nik_pegawai','$nama_pegawai','$no_wa_pegawai')";

    if ($mysqli->query($sql) === TRUE) {
        echo "Data Telah Disimpan";
    } else {
        echo "Gagal: ". $sql . "<br>" . $mysqli->error;
    }

    header("Location: cari_pegawai.php");
    exit();

    $mysqli->close();
?>