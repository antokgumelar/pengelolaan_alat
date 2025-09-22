<?php
// Check connection
    $databaseHost = 'localhost';
    $databaseName = 'gudang_alat';
    $databaseUsername = 'root';
    $databasePassword = '';

    $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

    if ($mysqli->connect_error) {
        die("Gagal Terkoneksi: " . $mysqli->connect_error);
    }

    // Input data
    $kode_alat = $_POST['kode_alat'];
    $nama_alat = $_POST['nama_alat'];
    $jenis_alat = $_POST['jenis_alat'];
    $stok_tetap = $_POST['stok_tetap'];
    $jumlah_stok = $_POST['jumlah_stok'];
    $posisi_alat = $_POST['posisi_alat'];

    // Input file gambar
    $gambar_alat = "";
    if (isset($_FILES['gambar_alat']) && $_FILES['gambar_alat']['error'] == 0) {
        // Folder tujuan untuk menyimpan file gambar
        $upload_dir = "rentora/uploads/";
        
        // Pastikan folder uploads ada, jika tidak buat folder
        if (!is_dir($upload_dir)) {
            if (!mkdir($upload_dir, 0755, true)) {
                die("Gagal membuat folder uploads.");
            }
        }

        // Buat nama unik untuk file gambar
        $gambar_nama = uniqid() . "_" . basename($_FILES['gambar_alat']['name']);
        $gambar_alat = $upload_dir . $gambar_nama;

        // Pindahkan file ke folder uploads
        if (move_uploaded_file($_FILES['gambar_alat']['tmp_name'], $gambar_alat)) {
            echo "Gambar berhasil diupload.";
        } else {
            echo "Gagal mengupload gambar.";
            $gambar_nama = ""; // Reset gambar jika gagal
        }
    }

    // Query create
    $sql = "INSERT INTO katalog_alat (kode_alat, nama_alat, jenis_alat,stok_tetap, jumlah_stok, posisi_alat, gambar_alat)
            VALUES ('$kode_alat', '$nama_alat', '$jenis_alat','$stok_tetap','$jumlah_stok', '$posisi_alat', '$gambar_nama')";

    if ($mysqli->query($sql) === TRUE) {
        echo "Data Telah Disimpan!";
    } else {
        echo "Gagal: " . $sql . "<br>" . $mysqli->error;
    }

    // Redirect setelah beberapa detik
    header("Location: cari_katalog.php");
    exit(); // Pastikan untuk menghentikan eksekusi script setelah redirect

    $mysqli->close();
?>