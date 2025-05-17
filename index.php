<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard admin</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
    <div class="logo">
      <h1>Sistem informasi jadwal pembelajaran</h1>
    <p>&copy; copyright 2024 | Nove Sihotang |  Tugas OOSE</p>
    </div>
    
<nav>
    <ul>
      <li><a href="#">Home</a></li>
      <li class="dropdown">
        <a href="#">Master Data <i class="fas fa-caret-down"></i></a>
        <ul class="sub-menu">
          <li><a href="data_kelas.php">Data Kelas</a></li>
          <li><a href="data_guru.php">Data Guru</a></li>
          <li><a href="data_ruangan.php">Data Ruangan</a></li>
          <li><a href="jadwal_pelajaran.php">Jadwal Pelajaran</a></li>
          <li><a href="data_mapel.php">Data Mata Pelajaran</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#">Laporan <i class="fas fa-caret-down"></i></a>
        <ul class="sub-menu">
          <li><a href="./laporan/laporan_guru.php">Laporan Data Guru</a></li>
          <li><a href="./laporan/info_ruangan.php">Informasi Ruangan</a></li>
          <li><a href="./laporan/jadwal_pembelajaran.php">Jadwal Pembelajaran</a></li>          
        </ul>
      </li>
      <li><a href="logout.php">Log Out</a></li>
    </ul>
   
  </nav>
  </header>

    <h1>
        Selamat Datang Admin
    </h1>
  
</body>
</html>