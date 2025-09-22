<?php
    $databaseHost = 'localhost';
    $databaseName = 'gudang_alat';
    $databaseUsername = 'root';
    $databasePassword = '';

    $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

    if (isset($_GET['nik_pegawai'])) {
        $nik = $_GET['nik_pegawai'];
        $sql = "SELECT nama_pegawai,no_wa_pegawai FROM data_pegawai WHERE nik_pegawai = ?";
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $nik);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo json_encode([
                'status' => 'success',
                'data' => [
                    'nama_pegawai' => $row['nama_pegawai'],
                    'no_wa_pegawai' => $row['no_wa_pegawai']
                ]
            ]);
            } else {
            echo json_encode(['status' => 'error', 'message' => 'Data tidak ditemukan']);
        }
        
        $stmt->close();
        $mysqli->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'NIK tidak diberikan']);
    }
?>