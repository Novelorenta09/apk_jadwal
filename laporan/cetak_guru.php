<?php
ob_start();
include '../koneksi.php';
require_once('tcpdf/tcpdf.php');

// Membersihkan buffer output
ob_clean();

$result = $conn->query("SELECT * FROM guru");

if ($result->num_rows > 0) {
    // Inisialisasi objek TCPDF
    $pdf = new TCPDF();
    $pdf->SetCreator('My PDF Generator');
    $pdf->SetAuthor('Nove Sihotang');
    $pdf->SetTitle('Laporan Data Guru');
    $pdf->SetSubject('Data Guru');

    // Tambahkan halaman
    $pdf->AddPage();

    // Tambahkan konten ke PDF
    $pdf->SetFont('times', '', 12);

    $html = '<h2>Laporan Data Guru</h2>';
    $html .= '<table border="1">';
    $html .= '<tr>
                <th>No</th>
                <th>Nama Guru</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>NIP</th>
                <th>Jenis Kelamin</th>
            </tr>';

    $counter = 1;
    while ($row = $result->fetch_assoc()) {
        $html .= '<tr>';
        $html .= '<td>' . $counter . '</td>';
        $html .= '<td>' . $row['nama_guru'] . '</td>';
        $html .= '<td>' . $row['umur'] . '</td>';
        $html .= '<td>' . $row['alamat'] . '</td>';
        $html .= '<td>' . $row['email'] . '</td>';
        $html .= '<td>' . $row['nip'] . '</td>';
        $html .= '<td>' . $row['jenis_kelamin'] . '</td>';
        $html .= '</tr>';
        $counter++;
    }

    $html .= '</table>';

    $pdf->writeHTML($html, true, false, true, false, '');

    // Outputkan file PDF ke browser atau simpan ke file
    $pdf->Output('laporan_data_guru.pdf', 'D');
    exit();
} else {
    echo "Tidak ada data Guru.";
}

$conn->close();
?>
