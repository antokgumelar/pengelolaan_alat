<?php
//check connection
$databaseHost = 'localhost';
$databaseName = 'gudang_alat';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if ($mysqli->connect_error) {
    die("Gagal Terkoneksi" . $mysqli->connect_error);
}

//input data dari form
$id_kembali = $_POST['id_kembali'];
$tanggal_kembali = $_POST['tanggal_kembali'];
$id_pinjam = $_POST['id_pinjam'];
$tanggal_pinjam = $_POST['tanggal_pinjam'];
$nik_pegawai = $_POST['nik_pegawai'];
$nama_pegawai = $_POST['nama_pegawai'];
$kode_alat = $_POST['kode_alat'];
$nama_alat = $_POST['nama_alat'];
$qty = $_POST['qty'];
$kondisi_alat = $_POST['kondisi_alat'];
$keterangan = $_POST['keterangan'];

if (empty($id_pinjam)) {
    if (strtolower($kondisi_alat) == 'alat rusak' && empty($id_pinjam)) {
        // Simpan hanya data yang relevan
        $insert_rusak_query = "INSERT INTO kembali_alat (id_kembali, tanggal_kembali, kode_alat, nama_alat, qty, kondisi_alat, keterangan)
                               VALUES ('$id_kembali', '$tanggal_kembali', '$kode_alat', '$nama_alat', '$qty', '$kondisi_alat', '$keterangan')";
    
        if ($mysqli->query($insert_rusak_query) === TRUE) {
            // Kurangi stok
            $result = $mysqli->query("SELECT jumlah_stok FROM katalog_alat WHERE kode_alat = '$kode_alat'");
    
            if ($result && $row = $result->fetch_assoc()) {
                $stok_sekarang = $row['jumlah_stok'];
                $stok_baru = $stok_sekarang - $qty;
    
                if ($stok_baru < 0) {
                    echo "Gagal: stok tidak cukup untuk dikurangi.";
                    exit;
                }
    
                $update_stok_query = "UPDATE katalog_alat SET jumlah_stok = $stok_baru WHERE kode_alat = '$kode_alat'";
                if ($mysqli->query($update_stok_query)) {
                    echo "Barang rusak berhasil dicatat dan stok telah dikurangi.";
                } else {
                    echo "Barang rusak dicatat, tapi gagal mengurangi stok: " . $mysqli->error;
                }
            } else {
                echo "Barang rusak dicatat, tapi gagal membaca stok.";
            }
        } else {
            echo "Gagal mencatat barang rusak: " . $mysqli->error;
        }
    
        $mysqli->close();
        header("Location: cari_kembali.php");
        exit;
    }
}

// Ambil qty yang dipinjam berdasarkan id_pinjam dan kode_alat
$query_pinjam = "SELECT qty FROM pinjam_alat WHERE id_pinjam = '$id_pinjam' AND kode_alat = '$kode_alat'";
$result_pinjam = $mysqli->query($query_pinjam);

if ($result_pinjam && $row_pinjam = $result_pinjam->fetch_assoc()) {
    $qty_dipinjam = $row_pinjam['qty'];

    // Hitung total qty yang sudah dikembalikan sebelumnya
    $query_kembali = "SELECT SUM(qty) as total_kembali FROM kembali_alat WHERE id_pinjam = '$id_pinjam' AND kode_alat = '$kode_alat'";
    $result_kembali = $mysqli->query($query_kembali);
    $total_kembali = 0;

    if ($result_kembali && $row_kembali = $result_kembali->fetch_assoc()) {
        $total_kembali = $row_kembali['total_kembali'];
    }

    // Hitung sisa qty yang boleh dikembalikan
    $sisa_qty = $qty_dipinjam - $total_kembali;

    if ($qty > $sisa_qty) {
        echo "Qty yang dikembalikan melebihi jumlah yang dipinjam. Maksimal qty yang bisa dikembalikan: $sisa_qty";
        exit;
    }

    // Simpan data pengembalian terlebih dahulu
    $insert_kembali_query = "INSERT INTO kembali_alat (id_kembali, tanggal_kembali, id_pinjam, tanggal_pinjam, nik_pegawai, nama_pegawai, kode_alat, nama_alat, qty, kondisi_alat, keterangan)
                             VALUES ('$id_kembali', '$tanggal_kembali', '$id_pinjam', '$tanggal_pinjam', '$nik_pegawai', '$nama_pegawai', '$kode_alat', '$nama_alat', '$qty', '$kondisi_alat', '$keterangan')";

    if ($mysqli->query($insert_kembali_query) === TRUE) {

        // Hanya update stok jika kondisi alat bukan "Alat Rusak"
        if (strtolower($kondisi_alat) != 'alat rusak') {
            // Ambil stok alat saat ini
            $result = $mysqli->query("SELECT jumlah_stok FROM katalog_alat WHERE kode_alat = '$kode_alat'");

            if ($result && $row = $result->fetch_assoc()) {
                $stok_sekarang = $row['jumlah_stok'];
                $stok_baru = $stok_sekarang + $qty;

                // Update stok alat
                $update_stok_query = "UPDATE katalog_alat SET jumlah_stok = $stok_baru WHERE kode_alat = '$kode_alat'";

                if ($mysqli->query($update_stok_query)) {
                    echo "Pengembalian Berhasil! Stok alat telah diperbarui.";
                } else {
                    echo "Pengembalian berhasil, namun gagal memperbarui stok alat: " . $mysqli->error;
                }
            } else {
                echo "Pengembalian berhasil, namun kode alat tidak ditemukan untuk update stok.";
            }
        } else {
            echo "Pengembalian Berhasil! Alat rusak tidak dikembalikan ke stok.";
        }

    } else {
        echo "Gagal menyimpan data pengembalian: " . $mysqli->error;
    }
} else {
    echo "Data peminjaman tidak ditemukan.";
}

$mysqli->close();

// Redirect setelah semua proses selesai
header("Location: cari_kembali.php");
?>
