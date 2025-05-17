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
        .form-group input[type="number"] {
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
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
        }

        .form-group button[type="submit"]:hover {
        background-color: #0069d9;
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
        .container{
          width: 50%;
          margin: auto;
        }


    </style>

</head>
<body>

<div class="container">
  <a href="data_guru.php" class="back"> Back</a>

<div class="form-container">
    <h2>Form Pengisian Data Guru</h2>
    <form action="" method="post">
     <div class="form-group">
        <label for="id_guru">Id Guru</label>
        <input type="text" name="id_guru" id="id_guru" size="20">
      </div>
      <div class="form-group">
        <label for="nip">NIP</label>
        <input type="text" name="nip" id="nip">
      </div>
      <div class="form-group">
        <label for="nama_guru">Nama Guru</label>
        <input type="text" name="nama_guru" id="nama_guru">
      </div>

      <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <input type="radio" name="jenis_kelamin" id="jenis_kelamin-perempuan" value="perempuan"> Perempuan

        <input type="radio" name="jenis_kelamin" id="jenis_kelamin-laki-laki" value="laki-laki"> Laki-laki
      </div>

      <div class="form-group">
        <label for="umur">Umur</label>
        <input type="number" name="umur" id="umur">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
      </div>
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat">
      </div>

      <div class="form-group">
        <button type="submit">Simpan</button>
        <button type="reset">Batal</button>
      </div>
    </form>
  </div>
  </div>
</body>
</html>
<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_guru = $_POST["id_guru"];
    $nama_guru = $_POST["nama_guru"];
    $nip = $_POST["nip"];
    $jenis_kelamin = isset($_POST["jenis_kelamin"]) ? $_POST["jenis_kelamin"] : null;
    $umur = $_POST["umur"];
    $email = $_POST["email"];
    $alamat = $_POST["alamat"];

    $stmt = $conn->prepare("INSERT INTO guru (id_guru, nip, nama_guru, jenis_kelamin, umur, email, alamat) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $id_guru, $nip, $nama_guru, $jenis_kelamin, $umur, $email, $alamat);

    if ($stmt->execute()) {
        echo "<script>
                alert('Data berhasil disimpan!');
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Menutup statement
    $stmt->close();
}

// Menutup koneksi
$conn->close();
?>
