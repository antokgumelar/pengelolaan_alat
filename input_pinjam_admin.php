<?php
    // Koneksi database
    $databaseHost = 'localhost';
    $databaseName = 'gudang_alat';
    $databaseUsername = 'root';
    $databasePassword = '';

    $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

    if ($mysqli->connect_error) {
        die("Gagal Terkoneksi: " . $mysqli->connect_error);
    }

    // Input data dari form
    $id_pinjam = $_POST['id_pinjam'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $nik_pegawai = $_POST['nik_pegawai'];
    $nama_pegawai = $_POST['nama_pegawai'];
    $no_wa_pegawai = $_POST['no_wa_pegawai'];
    $nama_proyek = $_POST['nama_proyek'];
    $kode_alat = $_POST['kode_alat'];
    $nama_alat = $_POST['nama_alat'];
    $qty = (int)$_POST['qty'];
    $status_peminjaman = $_POST['status_peminjaman'];

    // Validasi stok alat
        $result = $mysqli->query("SELECT jumlah_stok FROM katalog_alat WHERE kode_alat = '$kode_alat'");
        if ($result && $row = $result->fetch_assoc()) {
            $stok_sekarang = $row['jumlah_stok'];

            if ($stok_sekarang >= $qty) {
                // Kurangi stok alat
                $stok_baru = $stok_sekarang - $qty;
                $mysqli->query("UPDATE katalog_alat SET jumlah_stok = $stok_baru WHERE kode_alat = '$kode_alat'");

                // Masukkan data peminjaman ke tabel pinjam_alat
                $sql = "INSERT INTO pinjam_alat (id_pinjam, tanggal_pinjam, tanggal_kembali, nik_pegawai, nama_pegawai, no_wa_pegawai, nama_proyek, kode_alat, nama_alat, qty, status_peminjaman)
                VALUES ('$id_pinjam', '$tanggal_pinjam', '$tanggal_kembali','$nik_pegawai','$nama_pegawai','$no_wa_pegawai','$nama_proyek', '$kode_alat', '$nama_alat', '$qty', '$status_peminjaman')";

                if ($mysqli->query($sql) === TRUE) {
                    echo "Peminjaman Berhasil!";
                } else {
                    echo "Gagal menyimpan data peminjaman: " . $mysqli->error;
                }
            } else {
                // Stok tidak mencukupi
                echo "Stok alat tidak mencukupi! Stok tersedia: $stok_sekarang.";
            }
        } else {
            echo "Kode alat tidak ditemukan.";
        }

    header("refresh:3; url=home.php");
    $mysqli->close();
?>
