<?php
    require_once('vendor/autoload.php');

    $pdf = new TCPDF();
    $pdf->setCreator(PDF_CREATOR);
    $pdf->setAuthor("Rentora");
    $pdf->setTitle("Laporan Pengembalian Alat");
    $pdf->setHeaderData('', 0, 'Laporan Pengembalian Alat', 'Rentora');

    $pdf->setMargins(15, 27, 15);
    $pdf->setHeaderMargin(5);
    $pdf->setFooterMargin(5);
    $pdf->setAutoPageBreak(TRUE, 10);
    $pdf->setFont('helvetica', '', '7');
    
    $pdf->AddPage('L');

    include 'config.php';

    $tanggal_awal = $_GET['startDate'] ?? '';
    $tanggal_akhir = $_GET['endDate'] ?? '';

    if (!empty($tanggal_awal) && !empty($tanggal_akhir) && preg_match("/^\d{4}-\d{2}-\d{2}$/", $tanggal_awal) && preg_match("/^\d{4}-\d{2}-\d{2}$/", $tanggal_akhir)) {
        $sql = "SELECT * FROM kembali_alat WHERE tanggal_kembali BETWEEN ? AND ? ORDER BY tanggal_kembali DESC";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ss", $tanggal_awal, $tanggal_akhir);
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        $sql = "SELECT * FROM kembali_alat
                ORDER BY tanggal_kembali DESC";
        $result = $mysqli->query($sql);    
    }
    
    $html = '<h3>Rentora</h3>';
    $html .= '<p>Filter Tanggal: ' . $tanggal_awal . ' hingga ' . $tanggal_akhir . '</p>';
    $html .= '<table border="1" cellpadding="5" width="75%">
                <tr style="font-size:8px; white-space: nowrap;">
                    <th width="5%">No</th>
                    <th width="10%">ID Kembali</th>
                    <th width="13%">Tanggal Kembali</th>
                    <th width="10%">ID Pinjam</th>
                    <th width="15%">Tanggal Pinjam</th>
                    <th>NIK Pegawai</th>
                    <th>Nama Pegawai</th>
                    <th width="15%">Kode Alat</th>
                    <th width="15%">Nama Alat</th>
                    <th width="5%">Qty</th>
                    <th width="13%">Kondisi Alat</th>
                    <th width="15%">Keterangan</th>
                </tr>';
    
    $no = 1;
    while ($row = $result->fetch_assoc()) {
        $html .= '<tr>
                    <td>' . $no++ . '</td>
                    <td>' . $row['id_kembali'] . '</td>
                    <td>' . $row['tanggal_kembali'] . '</td>
                    <td>' . $row['id_pinjam'] . '</td>
                    <td>' . $row['tanggal_pinjam'] . '</td>
                    <td>' . $row['nik_pegawai'] . '</td>
                    <td>' . $row['nama_pegawai']. '</td>
                    <td>' . $row['kode_alat'] . '</td>
                    <td>' . $row['nama_alat'] . '</td>
                    <td>' . $row['qty'] . '</td>
                    <td>' . $row['kondisi_alat'] . '</td>
                    <td>' . $row['keterangan'] .'</td>
                </tr>';
    }
    
    $html .= '</table>';
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->output('laporan_pengembalian.pdf', 'I');
?>
