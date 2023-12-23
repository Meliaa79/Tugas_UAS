<?php
  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $database = 'db_universitas';

  $connection = mysqli_connect($host, $user, $pass, $database);
  
  if($connection){
    //echo "Koneksi Berhasil";
  }

  mysqli_select_db($connection, $database);
?>