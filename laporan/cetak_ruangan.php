<?php
ob_start();
include '../koneksi.php';
require_once('tcpdf/tcpdf.php');

// Membersihkan buffer output
ob_clean();

$result = $conn->query("SELECT * FROM ruangan");

if ($result->num_rows > 0) {
    // Inisialisasi objek TCPDF
    $pdf = new TCPDF();
    $pdf->SetCreator('My PDF Generator');
    $pdf->SetAuthor('Nove Sihotang');
    $pdf->SetTitle('Laporan Data Ruangan');
    $pdf->SetSubject('Data Ruangan');

    // Tambahkan halaman
    $pdf->AddPage();

    // Tambahkan konten ke PDF
    $pdf->SetFont('times', '', 12);

    $html = '<h2>Laporan Data Ruangan</h2>';
    $html .= '<table border="1">';
    $html .= '<tr>
                <th>No</th>
                <th>Nama Ruangan</th>
                <th>Kapasitas</th>
                <th>Deskripsi</th>
               
            </tr>';

    $counter = 1;
    while ($row = $result->fetch_assoc()) {
        $html .= '<tr>';
        $html .= '<td>' . $counter . '</td>';
        $html .= '<td>' . $row['nama_ruangan'] . '</td>';
        $html .= '<td>' . $row['kapasitas'] . '</td>';
        $html .= '<td>' . $row['deskripsi'] . '</td>';
        
        $html .= '</tr>';
        $counter++;
    }

    $html .= '</table>';

    $pdf->writeHTML($html, true, false, true, false, '');

    // Outputkan file PDF ke browser atau simpan ke file
    $pdf->Output('laporan_data_ruangan.pdf', 'D');
    exit();
} else {
    echo "Tidak ada data ruangan.";
}

$conn->close();
?>
