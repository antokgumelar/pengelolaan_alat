<?php
// Konfigurasi koneksi database
$databaseHost = 'localhost';
$databaseName = 'gudang_alat';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

// Ambil ID Peminjaman dari query string
$id_pinjam = $_GET['id_pinjam'] ?? null;

if ($id_pinjam) {
    // Query untuk mengambil data
    $sql = "SELECT tanggal_pinjam, nama_peminjam, kode_alat, nama_alat, qty, admin 
            FROM pinjam_alat WHERE id_pinjam = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('s', $id_pinjam); // Menggunakan 's' untuk string
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            header('Content-Type: application/json'); // Set header untuk JSON
            echo json_encode($result->fetch_assoc());
        } else {
            header('Content-Type: application/json'); // Set header untuk JSON
            echo json_encode(null); // Data tidak ditemukan
        }
        $stmt->close();
    } else {
        header('Content-Type: application/json'); // Set header untuk JSON
        echo json_encode(['error' => 'Query gagal: ' . $mysqli->error]); // Query gagal
    }
} else {
    header('Content-Type: application/json'); // Set header untuk JSON
    echo json_encode(['error' => 'ID tidak valid']); // ID tidak valid
}

$mysqli->close();
exit; // Hentikan eksekusi skrip
?>