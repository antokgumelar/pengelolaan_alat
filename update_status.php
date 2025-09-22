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
    $nik_pegawai = $_POST['nik_pegawai'];
    $nama_pegawai = $_POST['nama_pegawai'];
    $no_wa_pegawai = $_POST['no_wa_pegawai'];
    $nama_proyek = $_POST['nama_proyek'];
    $kode_alat = $_POST['kode_alat'];
    $nama_alat = $_POST['nama_alat'];
    $qty = $_POST['qty'];
    $status_peminjaman = $_POST['status_peminjaman'];

    // Jika status dibatalkan, kembalikan qty ke stok alat
    if ($status_peminjaman === "Dibatalkan") {
        // Ambil stok saat ini
        $getStok = $mysqli->prepare("SELECT jumlah_stok FROM katalog_alat WHERE kode_alat = ?");
        $getStok->bind_param("s", $kode_alat);
        $getStok->execute();
        $getStok->bind_result($stokSaatIni);
        $getStok->fetch();
        $getStok->close();

        // Tambahkan qty ke stok
        $stokBaru = $stokSaatIni + $qty;
        $updateStok = $mysqli->prepare("UPDATE katalog_alat SET jumlah_stok = ? WHERE kode_alat = ?");
        $updateStok->bind_param("is", $stokBaru, $kode_alat);
        $updateStok->execute();
        $updateStok->close();
    }

    // Query update
    $sql = "UPDATE pinjam_alat 
            SET tanggal_pinjam = ?, tanggal_kembali = ?, nik_pegawai = ?,  nama_pegawai = ?, no_wa_pegawai = ?, nama_proyek = ?,  kode_alat = ?, nama_alat = ?, qty = ?, status_peminjaman = ? 
            WHERE id_pinjam = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('sssssssssss', $tanggal_pinjam, $tanggal_kembali, $nik_pegawai, $nama_pegawai, $no_wa_pegawai, $nama_proyek, $kode_alat, $nama_alat, $qty, $status_peminjaman, $id_pinjam);
        if ($stmt->execute()) {
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

header("refresh:3; url=cari_pinjam.php");

$mysqli->close();
?>
