<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Guru</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #a7cbf1;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            margin-bottom: 15px;
        }

        button {
            padding: 8px 15px;
            background-color: green;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
        }

        button:hover {
            background-color: darkgreen;
        }
        body>h2{
            text-align: center;
            position: relative;
            top: 30px;
        }
    </style>
</head>
<body>
<h2>Edit Data Guru</h2>

    <div class="container">

   

    <?php
  
    include 'koneksi.php';

    if (isset($_GET['id_guru'])) {
        $id_guru = $_GET['id_guru'];

      
        $query = "SELECT * FROM guru WHERE id_guru = '$id_guru'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    ?>
            <form action="" method="post">
                <input type="hidden" name="id_guru" value="<?php echo $row['id_guru']; ?>">

                <label for="nama_guru">Nama Guru</label>
                <input type="text" id="nama_guru" name="nama_guru" value="<?php echo $row['nama_guru']; ?>" >

            
                <label for="umur">Umur</label>
                <input type="text" id="umur" name="umur" value="<?php echo $row['umur']; ?>" >

                <label for="nip">NIP</label>
                <input type="text" id="nip" name="nip" value="<?php echo $row['nip']; ?>" >

                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>" >
                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="<?php echo $row['email']; ?>" >

                <label for="jenis_kelamin">Jenis Kelamin</label>
                <input type="text" id="jenis_kelamin" name="jenis_kelamin" value="<?php echo $row['jenis_kelamin']; ?>" >

               

                <button type="submit">Simpan Perubahan</button>
            </form>
    <?php
        } else {
            echo "Guru tidak ditemukan.";
        }
    } else {
        echo "ID Guru tidak ditemukan.";
    }

    
    ?>
     </div>
</body>
</html>

<?php
// Koneksi ke database
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $id_guru = $_POST['id_guru'];
    $nama_guru_baru = $_POST['nama_guru'];

    
    $query = "UPDATE guru SET nama_guru = '$nama_guru_baru' WHERE id_guru = '$id_guru'";
    
    if ($conn->query($query)) {
        echo "<script>
                alert('Data guru berhasil diperbarui!');
                window.location.href = 'data_guru.php'; 
              </script>";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}


$conn->close();
?>
