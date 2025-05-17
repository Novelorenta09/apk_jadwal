<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form pengisian jadwal</title>
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
        .time-group{
            flex: 2;
            display: flex;
            gap: 50px;
            align-items: center; 
        }
        .form-group input[type="time"]{
            padding: 8px 20px;
            border-radius: 4px;
            border: none;
        }
        .form-group select{
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            margin-top: 5px;
        }
        .form-group select:focus{
            outline: none;
            box-shadow: 0 0 2px 1px rgba(0, 123, 255, 0.5);
        }
       
    </style>

</head>
<body>
    <div class="container">
  <a href="index.php" class="back"> Back</a>

<div class="form-container">
    <h2>Form Pengisian jadwal pelajaran</h2>
    <form action="" method="post">
    
      <div class="form-group">
        <label for="hari">Pilih Hari</label>
        <select id="hari" name="hari">
            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jumat">Jumat</option>
            <option value="Sabtu">Sabtu</option>
    </select>
      </div>

      <div class="time-group">    
        <div class="form-group">
            <label for="jam_mulai">Jam Mulai</label>
            <input type="time" name="jam_mulai" id="jam_mulai">
        </div>
        <div class="form-group">
            <label for="jam_selesai">Jam Selesai</label>
            <input type="time" name="jam_selesai" id="jam_selesai">
        </div>
       

        <div class="form-group">
        <label for="id_admin">Pilih Admin</label>
        <select id="id_admin" name="id_admin">
            <?php
            include 'koneksi.php';
            $query_admin = $conn->query("SELECT id_admin, nama_admin FROM admin");
            while ($admin = $query_admin->fetch_assoc()) {
                echo "<option value='{$admin['id_admin']}'>{$admin['nama_admin']}</option>";
            }
           ?>
        </select>
        </div>

      </div>

      <div class="form-group">
         <label for="id_mapel">Pilih Mata Pelajaran</label>
         <select id="id_mapel" name="id_mapel" required>
            <?php
            include 'koneksi.php';
            $query_mapel = $conn->query("SELECT id_mapel, nama_mapel FROM mapel");
            while ($mapel = $query_mapel->fetch_assoc()) {
                echo "<option value='{$mapel['id_mapel']}'>{$mapel['nama_mapel']}</option>";
            }
            ?>
        </select>

      </div>
     
      <div class="form-group">
      <label for="id_guru">Pilih Guru yang Mengajar</label>
      <select id="id_guru" name="id_guru">
             <?php
                 include 'koneksi.php';

                $query_guru= $conn->query("SELECT id_guru, nama_guru FROM guru");
                while ($guru = $query_guru->fetch_assoc()) {
                    echo "<option value='{$guru['id_guru']}'>{$guru['nama_guru']}</option>";
                  }
                 ?>
        </select>
      </div>

      <div class="form-group">
      <label for="id_ruangan">Pilih Ruangan</label>
      <select id="id_ruangan" name="id_ruangan">
             <?php
                 include 'koneksi.php';

                $query_ruangan = $conn->query("SELECT id_ruangan, nama_ruangan FROM ruangan");
                while ($ruangan = $query_ruangan->fetch_assoc()) {
                    echo "<option value='{$ruangan['id_ruangan']}'>{$ruangan['nama_ruangan']}</option>";
                  }
                 ?>
        </select>
      </div>

      <div class="form-group">
      <label for="id_kelas">Pilih Kelas</label>
      <select id="id_kelas" name="id_kelas">
             <?php
                 include 'koneksi.php';

                $query_kelas = $conn->query("SELECT id_kelas,nama_kelas FROM kelas");
                while ($kelas= $query_kelas->fetch_assoc()) {
                    echo "<option value='{$kelas['id_kelas']}'>{$kelas['nama_kelas']}</option>";
                  }
                 ?>
        </select>
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
   
    $hari = $_POST["hari"];
    $jam_mulai = $_POST["jam_mulai"];
    $jam_selesai = $_POST["jam_selesai"];
    $id_mapel = $_POST["id_mapel"];
    $id_guru = $_POST["id_guru"];
    $id_ruangan = $_POST["id_ruangan"];
    $id_admin = $_POST["id_admin"];
    $id_kelas = $_POST["id_kelas"];

    // Periksa jika id_kelas kosong
    if (empty($id_kelas)) {
        echo "Error: id_kelas tidak boleh kosong";
    } else {
        // Definisikan $stmt sebelum penggunaan
        $stmt = $conn->prepare("INSERT INTO jadwal ( hari, jam_mulai, jam_selesai, id_mapel, id_guru, id_ruangan, id_kelas, id_admin) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss",  $hari, $jam_mulai, $jam_selesai, $id_mapel, $id_guru, $id_ruangan, $id_kelas, $id_admin);

        // Debugging
        var_dump($_POST);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Data berhasil disimpan!');
                    window.location.href = 'jadwal_pelajaran.php';
                    </script>";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}

$conn->close();
?>