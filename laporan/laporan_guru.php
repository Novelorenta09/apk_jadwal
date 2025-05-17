<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>laporan Data Guru</title>
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


$result = $conn->query("SELECT * FROM guru");

if ($result->num_rows > 0) {
    echo "<h2>Daftar Guru</h2>";
    echo "<table border='1'>
            <tr>
            <th>NO</th>
                <th>Id Guru</th>
                <th>Nama Guru</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>NIP</th>
                <th>Jenis Kelamin</th>
                              
            </tr>";

            $counter = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr> 
        <td>{$counter}</td>
                <td>{$row['id_guru']}</td>
                <td>{$row['nama_guru']}</td>
                <td>{$row['umur']}</td>
                <td>{$row['alamat']}</td>
                <td>{$row['email']}</td>
                <td>{$row['nip']}</td>
                <td>{$row['jenis_kelamin']}</td>
                </tr>";
              $counter++;
    }

    echo "</table>";
} else {
    echo "Tidak ada data Guru.";
}

// $conn->close();
?>
    <div class="wrapper">
    <a href="../index.php" class="back">Back</a>
    <a href="cetak_guru.php" target="_blank" class="cetak">Cetak Laporan Guru</a>
    </div>

</body>
</html>


