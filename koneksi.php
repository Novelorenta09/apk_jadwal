<?php


$server="localhost";
$user="root";
$pass="";
$db="db_jadwal";
$conn=mysqli_connect($server,$user,$pass,$db);
if($conn->connect_error){
    die( "koneksi gagal".$conn->connect_error);
}else{
    // echo "koneksi berhasil";
}
?>