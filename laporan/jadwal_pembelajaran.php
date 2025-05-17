<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jadwal Pembelajaran</title>
  <style>
  body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 20px;
    }

    h2 {
        color: #333;
    }

    .tambah{
        display: block;
        margin: 20px 0;
        width: 150px;
        padding: 10px;
        background-color: #46923c;
        color: #fff;
        text-decoration: none;
        font-weight: bold;
        border-radius: 4px;
    }
    .tambah:hover{
      background-color: #3b8132;

    }
    .back{
        display: block;
        margin: 20px 0;
        width: 100px;
        padding: 10px;
        background-color: black;
        color: #fff;
        text-decoration: none;
        font-weight: bold;
        border-radius: 4px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #007bff;
        color: #fff;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    .wrapper{
        display: flex;
        margin: 20px ;
    }
    .cetak{
        display: block;
        margin: 20px 10px;
        width: 150px;
        padding: 10px;
        background-color:red;
        color: #fff;
        text-decoration: none;
        font-weight: bold;
        border-radius: 4px;
        transition: .4s;
    }
    .cetak:hover{
        background-color: darkred;
    }
  </style>
</head>
<body>
   
    <?php
include '../koneksi.php';


// $result = $conn->query("SELECT * FROM jadwal");
$result = $conn->query("SELECT  jadwal.hari, jadwal.jam_mulai, jadwal.jam_selesai, guru.nama_guru, mapel.nama_mapel, ruangan.nama_ruangan, kelas.nama_kelas
 FROM jadwal
 INNER JOIN guru ON jadwal.id_guru = guru.id_guru
 INNER JOIN ruangan ON jadwal.id_ruangan = ruangan.id_ruangan
 INNER JOIN kelas ON jadwal.id_kelas = kelas.id_kelas
 INNER JOIN mapel ON jadwal.id_mapel = mapel.id_mapel;
 ");

if ($result->num_rows > 0) {
    echo "<h2>Jadwal Pembelajaran</h2>";
    echo "<table border='1'>
            <tr>
            <th>NO</th>
                <th>Hari</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Guru</th>
                <th>Mata Pelajaran</th>
                <th>Ruangan</th>
                <th>Kelas</th>
                              
            </tr>";

            $counter = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr> 
        <td>{$counter}</td>
                <td>{$row['hari']}</td>
                <td>{$row['jam_mulai']}</td>
                <td>{$row['jam_selesai']}</td>
                <td>{$row['nama_guru']}</td>
                <td>{$row['nama_mapel']}</td>
                <td>{$row['nama_ruangan']}</td>
                <td>{$row['nama_kelas']}</td>
                </tr>";
              $counter++;
    }

    echo "</table>";
} else {
    echo "Tidak ada data jadwal.";
}

// $conn->close();
?>
    <div class="wrapper">
    <a href="../index.php" class="back">Back</a>
    <a href="cetak_jadwal.php" target="_blank" class="cetak">Cetak Jadwal Pembelajaran</a>
    </div>

</body>
</html>


