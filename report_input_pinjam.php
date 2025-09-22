<?php
require_once('vendor/autoload.php');

// Inisialisasi TCPDF
$pdf = new TCPDF();
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor("Rentora");
$pdf->setTitle("Bukti Pinjaman Alat");
$pdf->setHeaderData('', 0, 'Bukti Pinjaman Alat', 'Rentora');

$pdf->setMargins(15, 27, 15);
$pdf->setHeaderMargin(5);
$pdf->setFooterMargin(5);
$pdf->setAutoPageBreak(TRUE, 10);
$pdf->setFont('helvetica', '', '8');

$pdf->AddPage();

// Ambil data dari form
$form_data = $_POST;

// Buat output HTML dari data form
$html = '<h3>Rentora</h3>';
$html .= '<p><strong>ID Peminjaman:</strong> ' . htmlspecialchars($form_data['id_pinjam']) . '</p>';
$html .= '<p><strong>Tanggal Pinjam:</strong> ' . htmlspecialchars($form_data['tanggal_pinjam']) . '</p>';
$html .= '<p><strong>Tanggal Kembali:</strong> ' . htmlspecialchars($form_data['tanggal_kembali']) . '</p>';
$html .= '<p><strong>Nama Peminjam:</strong> ' . htmlspecialchars($form_data['nama_peminjam']) . '</p>';
$html .= '<p><strong>Nomor WA Peminjam:</strong> ' . htmlspecialchars($form_data['nomor_wa_peminjam']) . '</p>';
$html .= '<p><strong>Nomor Induk Karyawan:</strong> ' . htmlspecialchars($form_data['nomor_karyawan']) . '</p>';
$html .= '<p><strong>Departemen:</strong> ' . htmlspecialchars($form_data['nama_departemen']) . '</p>';
$html .= '<p><strong>Kode Alat:</strong> ' . htmlspecialchars($form_data['kode_alat']) . '</p>';
$html .= '<p><strong>Nama Alat:</strong> ' . htmlspecialchars($form_data['nama_alat']) . '</p>';
$html .= '<p><strong>Jumlah (Qty):</strong> ' . htmlspecialchars($form_data['qty']) . '</p>';
$html .= '<p><strong>Status Peminjaman:</strong> ' . htmlspecialchars($form_data['status_peminjaman']) . '</p>';

// Tulis HTML ke PDF
$pdf->writeHTML($html, true, false, true, false, '');
// Output PDF langsung
$pdf->Output('bukti_peminjaman.pdf', 'I');
?>
