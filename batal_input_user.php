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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $id_pinjam = $_POST['id_pinjam'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $nomor_karyawan = $_POST['nomor_karyawan'];
    $nama_peminjam = $_POST['nama_peminjam'];
    $no_wa_pegawai = $_POST['no_wa_pegawai'];
    $kode_alat = $_POST['kode_alat'];
    $nama_alat = $_POST['nama_alat'];
    $qty = $_POST['qty'];
    $status_peminjaman = $_POST['status_peminjaman'];

    // Query update data peminjaman
    $sql = "UPDATE pinjam_alat 
            SET tanggal_pinjam = ?, tanggal_kembali = ?, nomor_karyawan = ?, nama_peminjam = ?, no_wa_pegawai = ?, kode_alat = ?, nama_alat = ?, qty = ?, status_peminjaman = ? 
            WHERE id_pinjam = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('ssssssssss', $tanggal_pinjam, $tanggal_kembali, $nomor_karyawan, $nama_peminjam, $no_wa_pegawai, $kode_alat, $nama_alat, $qty, $status_peminjaman, $id_pinjam);
        
        if ($stmt->execute()) {
            // Cek apakah status peminjaman adalah Dikembalikan
            if (strtolower($status_peminjaman) === 'dibatalkan') {
                // Kembalikan stok alat
                $updateStockSql = "UPDATE katalog_alat SET jumlah_stok = jumlah_stok + ? WHERE kode_alat = ?";
                $updateStmt = $mysqli->prepare($updateStockSql);

                if ($updateStmt) {
                    $updateStmt->bind_param('is', $qty, $kode_alat);
                    $updateStmt->execute();
                    $updateStmt->close();
                }
            }

            // Jika berhasil, kirimkan respons sukses
            echo json_encode(['success' => true]);
        } else {
            // Jika gagal, kirimkan respons error
            echo json_encode(['success' => false, 'message' => 'Gagal memperbarui data: ' . $stmt->error]);
        }
        $stmt->close();
    } else {
        // Jika query gagal disiapkan
        echo json_encode(['success' => false, 'message' => 'Query gagal: ' . $mysqli->error]);
    }
}

$mysqli->close();
?>
