<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form pengisian data kelas</title>
    <style>
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        }

        body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        background-color: #f5f5f5;
        }
        .container{
          width: 50%;
          /* background: greenyellow; */
          margin: auto;
        }
        .form-container {
        width: 500px;
        background-color: #a7cbf1;
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: 50px auto;
        display: flex;
        flex-direction: column;
        }

        .form-container h2 {
        text-align: center;
        margin-bottom: 20px;
        }

        .form-group {
        margin-bottom: 15px;
        }

        .form-group label {
        display: block;
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group textarea[type="text"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        }

        .form-group input[type="text"]:focus,
        .form-group input[type="number"]:focus {
        outline: none;
        box-shadow: 0 0 2px 1px rgba(0, 123, 255, 0.5);
        }

        .form-group button[type="submit"] {
        padding: 8px 15px;
        background-color: green;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
        }

        .form-group button[type="submit"]:hover {
        background-color: darkgreen;
        }
        .form-group button[type="reset"] {
        padding: 8px 15px;
        background-color:#e5383b;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
        }

        .form-group button[type="reset"]:hover {
        background-color: #a4161a;
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
        

    </style>

</head>
<body>
  <div class="container">
  <a href="data_mapel.php" class="back"> Back</a>

  <div class="form-container">
    <h2>Form Pengisian Data Mata Pelajaran</h2>
    <form action="" method="post">
     <div class="form-group">
        <label for="id_mapel">Id Mapel</label>
        <input type="text" name="id_mapel" id="id_mapel">
      </div>
      <div class="form-group">
        <label for="nama_mapel">Nama Mata Pelajaran</label>
        <input type="text" name="nama_mapel" id="nama_mapel">
      </div>
      <div class="form-group">
        <label for="jumlah_les">Jumlah Les</label>
        <input type="number" name="jumlah_les" id="jumlah_les">
      </div>
      <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea type="text" name="deskripsi" id="deskripsi">
        </textarea>
      </div>
      <div class="form-group">
        <button type="submit">Simpan</button>
        <button type="reset">Batal</button>
      </div>
    </form>
  </div>
        <!-- <a href="lihat_mapel.php">Lihat Data</a> -->
  </div>
</body>
</html>
<?php
 include 'koneksi.php';

 
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_mapel = $_POST["id_mapel"];
    $nama_mapel = $_POST["nama_mapel"];
    $jumlah_les = $_POST["jumlah_les"];
    $deskripsi = $_POST["deskripsi"];
    // Menggunakan parameterized query untuk mencegah SQL injection
    $stmt = $conn->prepare("INSERT INTO mapel (id_mapel, nama_mapel, jumlah_les, deskripsi) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $id_mapel, $nama_mapel, $jumlah_les, $deskripsi);

    // Mengeksekusi query
    if ($stmt->execute()) {
        // echo "Data berhasil disimpan.";
        echo "<script>
                alert('data berhasil disimpan!');
                </script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}

?>