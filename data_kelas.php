<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mata Pelajaran</title>
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
  </style>
</head>
<body>
    <a href="tambah_kelas.php" class="tambah">Tambah Kelas</a>
    <?php
include 'koneksi.php';


$result = $conn->query("SELECT * FROM kelas");

if ($result->num_rows > 0) {
    echo "<h2>Daftar Kelas</h2>";
    echo "<table border='1'>
            <tr>
            <th>NO</th>
                <th>Id Kelas</th>
                <th>Nama Kelas</th>
                <th>Jumlah  Siswa</th>
                <th>Tingkat Kelas</th>
                <th>Aksi</th> 
            </tr>";

            $counter = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>{$counter}</td>
                <td>{$row['id_kelas']}</td>
                <td>{$row['nama_kelas']}</td>
                <td>{$row['jumlah_siswa']}</td>
                <td>{$row['tingkat_kelas']}</td>
                <td>
                <a href='edit_kelas.php?id={$row['id_kelas']}'>Edit</a> |
                <a href='hapus_kelas.php?id={$row['id_kelas']}'>Hapus</a>
                 </td>
              </tr>";
              $counter++;
    }

    echo "</table>";
} else {
    echo "Tidak ada data Daftar Kelas.";
}

// $conn->close();
?>


    <a href="index.php" class="back">Back</a>

</body>
</html>
