<!DOCTYPE html>
<?php
  include 'koneksi.php';

    $NIM = '';
    $Nama = '';
    $Fakultas = '';
    $Jurusan = '';
    $Jenis_Kelamin = '';
    $Alamat = '';



  if(isset($_GET['ubah'])){
    $Kd_mahasiswa = $_GET['ubah'];
    
    $query = "SELECT * FROM tb_mahasiswa WHERE Kd_mahasiswa = '$Kd_mahasiswa';";
    $sql = mysqli_query($connection, $query);

    $result = mysqli_fetch_assoc($sql);

    $NIM = $result['NIM'];
    $Nama = $result['Nama'];
    $Fakultas = $result['Fakultas'];
    $Jurusan = $result['Jurusan'];
    $Jenis_Kelamin = $result['Jenis_Kelamin'];
    $Alamat = $result['Alamat'];




  }
?>

<html>
<head>
  <meta charset="utf-8">
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/bootstrap.bundle.min.js"></script>
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <title>Tugas UAS</title>
</head>
<body>
  <nav class="navbar bg-body-tertiary mb-3">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
        </a>
      </div>
  </nav>
  <div class="container">
    <form method="POST" action="proses.php">
      <input type="hidden" name="Kd_mahasiswa" value="<?php echo $Kd_mahasiswa; ?>">


        <div class="mb-3 row">
            <label for="NIM" class="col-sm-2 col-form-label">NIM</label>
          <div class="col-sm-10">
              <input type="text" name="NIM" class="form-control" id="NIM" placeholder="Ex: 2305551079" value="<?php echo $NIM; ?>">
          </div>
        </div>
        <div class="mb-3 row">
            <label for="Nama" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
          <div class="col-sm-10">
              <input type="text" name="Nama" class="form-control" id="Nama" placeholder="Ex: Ni Kadek Melia Shanti" value="<?php echo $Nama; ?>">
          </div>
        </div>
        <div class="mb-3 row">
            <label for="Fakultas" class="col-sm-2 col-form-label">
              Fakultas
            </label>
          <div class="col-sm-10">
            <select value="<?php echo $Fakultas; ?>" id="Fakultas" name="Fakultas" class="form-select">
              <option selected>Fakultas</option>
              <option <?php if($Fakultas == 'Teknik'){ echo "selected"; } ?>>Teknik</option>
          </select>
          </div>
        </div>
        <div class="mb-3 row">
            <label for="Jurusan" class="col-sm-2 col-form-label">
              Jurusan
            </label>
          <div class="col-sm-10">
            <select id="Jurusan" name="Jurusan" class="form-select">
              <option selected>Jurusan</option>
              <option <?php if($Jurusan == 'Sipil'){ echo "selected"; } ?>>Sipil</option>
              <option <?php if($Jurusan == 'Teknologi Informasi'){ echo "selected"; } ?>>Teknologi Informasi</option>
              <option <?php if($Jurusan == 'Arsitektur'){ echo "selected"; } ?>>Arsitektur</option>
              <option <?php if($Jurusan == 'Industri'){ echo "selected"; } ?>>Industri</option>
              <option <?php if($Jurusan == 'Elektro'){ echo "selected"; } ?>>Elektro</option>
              <option <?php if($Jurusan == 'Lingkungan'){ echo "selected"; } ?>>Lingkungan</option>
              <option <?php if($Jurusan == 'Mesin'){ echo "selected"; } ?>>Mesin</option>
          </select>
          </div>
        </div>
        <div class="mb-3 row">
            <label for="Jenis Kelamin" class="col-sm-2 col-form-label">
              Jenis Kelamin
            </label>
          <div class="col-sm-10">
            <select id="Jenis Kelamin" name="Jenis_Kelamin" class="form-select">
              <option selected>Jenis Kelamin</option>
              <option <?php if($Jenis_Kelamin == 'Laki-Laki'){ echo "selected"; } ?> value="Laki-Laki"> Laki-Laki</option>
              <option <?php if($Jenis_Kelamin == 'Perempuan'){ echo "selected"; } ?> value="Perempuan">Perempuan</option>
          </select>
          </div>
          </div>
        <div class="mb-3 row">

            <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
          <div class="col-sm-10">
              <textarea class="form-control" id="Alamat" name="Alamat" rows="3"><?php echo $Alamat; ?></textarea>
          </div>
        </div>

        <div class="mb-3 row mt-4">
          <div class="col">
            <?php
              if(isset($_GET['ubah'])){
            ?>
              <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                <i class="fas fa-plus-square"></i>
                Simpan Perubahan
              </button>
            <?php
              } else {
            ?>
              <button type="submit" name="aksi" value="add" class="btn btn-primary">
                <i class="fas fa-plus-square"></i>
                Tambahkan
              </button>
            <?php
              } 
            ?>
          <a href="index.php" type="button"class="btn btn-danger">
            <i class="fas fa-undo"></i>

            Kembali
          </a>
          </div>
        </div>
    </form>
  </div>
</body>
</html>