<?php
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $databaseHost = 'localhost';
    $databaseName = 'gudang_alat';
    $databaseUsername = 'root';
    $databasePassword = '';

    try {
        $pdo = new PDO("mysql:host=$databaseHost;dbname=$databaseName; charset=utf8", $databaseUsername, $databasePassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Koneksi gagal: " . $e->getMessage());
    }

    $tanggal_awal = $_GET['startDate'] ?? '';
    $tanggal_akhir = $_GET['endDate'] ?? '';

    if (!empty($tanggal_awal) && !empty($tanggal_akhir)) {
        $stmt = $pdo->prepare('SELECT * FROM pinjam_alat WHERE tanggal_pinjam BETWEEN :tanggal_awal
        AND :tanggal_akhir');

        $stmt->execute([
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir
        ]);

        $laporan = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $stmt = $pdo->query('SELECT *FROM pinjam_alat');
        $laporan = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    if(!empty ($laporan)) {
        $no = 1;
        foreach($laporan as $row) {
            echo "<tr>
                <td>" . $no++ . " </td>
                <td>" . $row['id_pinjam'] . "</td>
                <td>" . $row['tanggal_pinjam'] . "</td>
                <td>" . $row['nama_peminjam'] . "</td>
                <td>" . $row['kode_alat'] . "</td>
                <td>" . $row['nama_alat'] . "</td>
                <td>" . $row['qty'] . "</td>
                <td>" . $row['admin'] . "</td>
                <td>" . $row['status_peminjaman'] . "</td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Tidak ada data.</td></tr>";
    }
?>
