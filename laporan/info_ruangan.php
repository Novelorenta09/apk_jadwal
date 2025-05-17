<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Ruangan</title>
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
        margin: 20px;
    }
    .cetak{
        display: block;
        margin: 20px ;
        width: 150px;
        padding: 10px;
        background-color: red;
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


$result = $conn->query("SELECT * FROM ruangan");
if ($result->num_rows > 0) {
    echo "<h2>Daftar Ruangan</h2>";
    echo "<table border='1'>
            <tr>
                <th>NO</th>
                <th>Id Ruangan</th>
                <th>Nama Ruangan</th>
                <th>Kapasitas</th>
                <th>Deskripsi</th>  
                             
            </tr>";

      $counter = 1;
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$counter}</td>
                <td>{$row['id_ruangan']}</td>
                <td>{$row['nama_ruangan']}</td>
                <td>{$row['kapasitas']}</td>
                <td>{$row['deskripsi']}</td>
                
              </tr>";
            $counter++;
    }

    echo "</table>";
} else {
    echo "Tidak ada data Ruangan.";
}

// $conn->close();
?>
    <div class="wrapper">
        <a href="../index.php" class="back">Back</a>
        <a href="cetak_ruangan.php" target="_blank" class="cetak">Cetak Ruangan</a>
    </div>


</body>
</html>
