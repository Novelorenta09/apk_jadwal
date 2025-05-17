<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
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
  
    <div class="form-container">
    <h2>Silahkan Login Terlebih Dahulu</h2>
    <form action="" method="post">
     <div class="form-group">
        <label for="id">Masukkan ID Anda</label>
        <input type="text" name="id" id="id">
      </div>
      <div class="form-group">
        <label for="username">Masukkan Username</label>
        <input type="text" name="username" id="username">
      </div>

      <div class="form-group">
      <label for="user">Pilih Sebagai</label>
      <select id="user" name="user">
        <option value="admin">Admin</option>
        <option value="Guru">Guru</option>

           
        </select>
      </div>
      
      <div class="form-group">
        <button type="submit">Masuk</button>
        <button type="reset">Batal</button>
      </div>
    </form>
  </div>
  </div>
</body>
</html>
<?php
// Proses login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $username = $_POST["username"];
    $user_type = $_POST["user"];

    // Validasi login di sini
    include 'koneksi.php';

    if ($user_type == 'admin') {
        $query = "SELECT id_admin, username FROM admin WHERE username = ? AND id_admin = ?";
    } elseif ($user_type == 'Guru') {
        $query = "SELECT id_guru, username FROM guru WHERE username = ? AND id_guru = ?";
    }

    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        session_start();
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $username;
        $_SESSION['user_type'] = $user_type;

        // Redirect ke dashboard sesuai jenis pengguna
        if ($user_type == 'admin') {
            header("Location: index.php");
        } elseif ($user_type == 'Guru') {
            header("Location: guru/dashboard_guru.php");
        }
        exit();
    } else {
        $error_message = "Username atau ID tidak valid. Silakan coba lagi.";
    }

    $stmt->close();
    $conn->close();
}
?>
