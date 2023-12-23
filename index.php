<?php
  include 'koneksi.php';

  $query = "SELECT * FROM tb_mahasiswa;";
  $sql = mysqli_query($connection, $query);
  $nomor = 0;
  
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/bootstrap.bundle.min.js"></script>
  
  <!-- Font Awesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<!-- Data Tables -->
<link rel="stylesheet" type="text/css" href="datatables/datatables.css">
<script type="text/javascript" src="datatables/datatables.js"></script>


  <title>Tugas UAS</title>
</head>
<script type="text/javascript">
  $(document).ready(function(){
    $('#dt').DataTable();
  } );
</script>
<body>
  <nav class="navbar bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
        </a>
      </div>
  </nav>

  <!-- judul -->
  <div class="container-fluid">
    <h1 class="mt-3">Data Mahasiswa</h1>
    <figure>
      <blockquote class="blockquote">
        <p>Universitas Udayana</p>
      </blockquote>
      <figcaption class="blockquote-footer">
      Fakultas Teknik<cite title="Source Title"> Tahun Ajaran 2023-2024</cite>
      </figcaption>
    </figure>
    <a href="kelola.php" type="button" class="btn btn-primary mb-3">
      <i class="fas fa-plus-square"></i>

      Tambah Data
    </a>
    <div class="table-responsive">
    <table id="dt" class="table align-middle table-bordered table-hover">
      <thead>
        <tr>
          <th>No.</th>
          <th>NIM</th>
          <th>Nama</th>
          <th>Fakultas</th>
          <th>Jurusan</th>
          <th>Jenis Kelamin</th>
          <th>Alamat</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php
        while($resultquery = mysqli_fetch_assoc($sql)){
    
      ?>
        <tr>
          <td> 
            <?php echo ++$nomor; ?>

          </td>
          <td>
            <?php echo $resultquery['NIM']; ?>
          </td>
          <td>
            <?php echo $resultquery['Nama']; ?>
          </td>
          <td>
            <?php echo $resultquery['Fakultas']; ?>
          </td>
          <td>
            <?php echo $resultquery['Jurusan']; ?>
          </td>
          <td>
            <?php echo $resultquery['Jenis_Kelamin']; ?>
          </td>
          <td>
            <?php echo $resultquery['Alamat']; ?>
          </td>
          <td>
            <a href="kelola.php?ubah=<?php echo $resultquery['Kd_mahasiswa']; ?>" type="button" class="btn btn-success btn-sm">
              <i class="fas fa-pencil-alt"></i>
            </a>
            <a href="proses.php?hapus=<?php echo $resultquery['Kd_mahasiswa']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah Anda yakin menghapus data tersebut?')">
              <i class="fas fa-trash-alt"></i>
            </a>
          </td>
        </tr>
      <?php
        }
      ?>  
      </tbody>
    </table>
    </div>
  </div>
</body>
</html>
