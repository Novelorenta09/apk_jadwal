<?php
ob_start();
include '../koneksi.php';
require_once('tcpdf/tcpdf.php');


ob_clean();

// $result = $conn->query("SELECT * FROM jadwal");

$result = $conn->query("SELECT  jadwal.hari, jadwal.jam_mulai, jadwal.jam_selesai, guru.nama_guru, mapel.nama_mapel, ruangan.nama_ruangan, kelas.nama_kelas
FROM jadwal
INNER JOIN guru ON jadwal.id_guru = guru.id_guru
INNER JOIN ruangan ON jadwal.id_ruangan = ruangan.id_ruangan
INNER JOIN kelas ON jadwal.id_kelas = kelas.id_kelas
INNER JOIN mapel ON jadwal.id_mapel = mapel.id_mapel;
");

if ($result->num_rows > 0) {

    $pdf = new TCPDF();
    $pdf->SetCreator('My PDF Generator');
    $pdf->SetAuthor('Nove Sihotang');
    $pdf->SetTitle('Jadwal Pemebelajaran');
    $pdf->SetSubject('Jadwal Pembelajaran');


    $pdf->AddPage();


    $pdf->SetFont('times', '', 12);

    $html = '<h2>Jadwal Pembelajaran</h2>';
    $html .= '<table border="1">';
    $html .= '<tr>
                <th>No</th>
                <th>Hari</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Guru</th>
                <th>Mata Pelajaran</th>
                <th>Ruangan</th>
                <th>Kelas</th>               
            </tr>';

    $counter = 1;
    while ($row = $result->fetch_assoc()) {
        $html .= '<tr>';
        $html .= '<td>' . $counter . '</td>';
        $html .= '<td>' . $row['hari'] . '</td>';
        $html .= '<td>' . $row['jam_mulai'] . '</td>';
        $html .= '<td>' . $row['jam_selesai'] . '</td>';
        $html .= '<td>' . $row['nama_guru'] . '</td>';
        $html .= '<td>' . $row['nama_mapel'] . '</td>';
        $html .= '<td>' . $row['nama_ruangan'] . '</td>';
        $html .= '<td>' . $row['nama_kelas'] . '</td>';


        
        $html .= '</tr>';
        $counter++;
    }

    $html .= '</table>';

    $pdf->writeHTML($html, true, false, true, false, '');

    $pdf->Output('jadwal_pembelajaran.pdf', 'D');
    exit();
} else {
    echo "Tidak ada data jadwal.";
}

$conn->close();
?>
