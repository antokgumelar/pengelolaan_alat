<?php
    // Database connection
    $databaseHost = 'localhost';
    $databaseName = 'gudang_alat';
    $databaseUsername = 'root';
    $databasePassword = '';

    $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

    if ($mysqli->connect_error) {
        die("Koneksi gagal: " . $mysqli->connect_error);
    }

    // Mengambil data id_pinjam dan data terkait lainnya
    $sql = "SELECT id_pinjam, tanggal_pinjam, tanggal_kembali, nik_pegawai, nama_pegawai, no_wa_pegawai, nama_proyek, kode_alat, nama_alat, qty, status_peminjaman FROM pinjam_alat WHERE status_peminjaman = 'Alat Sudah Dikembalikan'";
    $result = $mysqli->query($sql);

    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;  // Menyimpan hasil dalam array
        }
        echo json_encode(['status' => 'success', 'data' => $data]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Data tidak ditemukan']);
    }

    $mysqli->close();
?>
