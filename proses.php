<?php

  include 'koneksi.php';


  if(isset($_POST['aksi'])){
    if($_POST['aksi'] == "add"){
      
      $Kd_mahasiswa = $_POST['Kd_mahasiswa'];
      $NIM = $_POST['NIM'];
      $Nama = $_POST['Nama'];
      $Fakultas = $_POST['Fakultas'];
      $Jurusan = $_POST['Jurusan'];
      $Jenis_Kelamin = $_POST['Jenis_Kelamin'];
      $Alamat = $_POST['Alamat'];


      $query = "INSERT INTO tb_mahasiswa (Kd_mahasiswa, NIM, Nama, Fakultas, Jurusan, Jenis_Kelamin, Alamat) VALUES ('$Kd_mahasiswa', '$NIM', '$Nama', '$Fakultas', '$Jurusan', '$Jenis_Kelamin', '$Alamat')";

      $sql = mysqli_query($connection, $query);

      if($sql){
        header("location: index.php");
        //echo "Data Berhasil ditambahkan <a href='index.php'>[Home]</a>";
      } else {
          echo $query;
      }


      //echo $NIM." | ".$Nama." | ".$Fakultas." | ".$Jurusan." | ".$Jenis_Kelamin." | ".$Alamat;

      //echo "<br>Tambah Data <a href='index.php'>[Home]</a>";
    } else if($_POST['aksi'] == "edit") {
      echo "Edit Data <a href='index.php'>[Home]</a>";
      //var_dump($_POST);
      $Kd_mahasiswa = $_POST['Kd_mahasiswa'];
      $NIM = $_POST['NIM'];
      $Nama = $_POST['Nama'];
      $Fakultas = $_POST['Fakultas'];
      $Jurusan = $_POST['Jurusan'];
      $Jenis_Kelamin = $_POST['Jenis_Kelamin'];
      $Alamat = $_POST['Alamat'];

      $query = "UPDATE tb_mahasiswa SET NIM='$NIM', Nama='$Nama', Fakultas='$Fakultas', Jurusan='$Jurusan', Jenis_Kelamin='$Jenis_Kelamin', Alamat='$Alamat' WHERE Kd_mahasiswa='$Kd_mahasiswa'";

     //$sql = mysqli_query($connection, $query);

      $sql = mysqli_query($connection, $query);

      if ($sql) {
          header("location: index.php");
          // echo "Data Berhasil ditambahkan <a href='index.php'>[Home]</a>";
      } else {
          echo $query;
          // echo "Gagal melakukan query: " . mysqli_error($connection); // Tambahkan ini untuk menampilkan pesan error MySQL
      }

    }
  }

  if(isset($_GET['hapus'])){
      $Kd_mahasiswa = $_GET['hapus'];
      $query = "DELETE FROM tb_mahasiswa WHERE Kd_mahasiswa = '$Kd_mahasiswa'";
      $sql = mysqli_query($connection, $query);

      if($sql){
        header("location: index.php");
        //echo "Data Berhasil ditambahkan <a href='index.php'>[Home]</a>";
      } else {
          echo $query;
      }
      //echo "Hapus Data <a href='index.php'>[Home]</a>";
    }
?>