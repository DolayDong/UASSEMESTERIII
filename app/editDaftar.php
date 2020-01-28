<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">

<?php 
error_reporting(0);  
 ?>
  

<h2 class="text-center">Halaman Edit Daftar</h2>
 <?php 

$idDaftar = $_GET['idDaftar'];
$conn = mysqli_connect("localhost", "root", "", "uas_klinik");
$sql = "SELECT tbl_pendaftaran.iddaftar, tbl_pendaftaran.idpasien, tbl_pendaftaran.tgldaftar, tbl_pendaftaran.idadmin, tbl_pendaftaran.biaya, tbl_pasien.namapasien FROM tbl_pasien INNER JOIN tbl_pendaftaran ON tbl_pendaftaran.idpasien = tbl_pasien.idpasien WHERE iddaftar = '".$idDaftar."'";

// $sql = "SELECT * FROM tbl_pendaftaran;";
// $sql .= "SELECT * FROM tbl_pasien";
$query = mysqli_query($conn, $sql);

// $d = mysqli_fetch_assoc($query);
// var_dump($d);
while($c = mysqli_fetch_assoc($query)) :
    
  ?>


<form method="post" action="" enctype="multipart/form-data">
  
<div class="form-row">
<div class="form-group col-md-4">
      <label for="inputEmail4">ID Daftar</label>
    </div>
    <div class="form-group col-md-8">
      <input type="text" class="form-control" id="inputEmail4" name="idDaftar" value="<?= $c['iddaftar'];?>" disabled>
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Nama Pasien</label>
    </div>
    <div class="form-group col-md-8">
      <input type="text" class="form-control" id="inputEmail4" name="namaPasien" value="<?= $c['namapasien'];?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Tanggal Daftar</label>
    </div>
    <div class="form-group col-md-8">
      <input type="date" class="form-control" id="inputEmail4" name="tanggalDaftar" value="<?= $c['tgldaftar'];?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Admin</label>
    </div>
    <div class="form-group col-md-8">
      <input type="text" class="form-control" id="inputEmail4" name="idAdmin" value="<?= $c['idadmin'];?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Biaya</label>
    </div>
    <div class="form-group col-md-8">
      <input type="text" class="form-control" id="inputEmail4" name="biayaDaftar" value="<?= $c['biaya'];?>">
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="submitt">Simpan</button>
  <button type="submit" class="btn btn-primary">Batal</button>
</form>
<?php endwhile; ?>

<?php 

if (isset($_POST['submitt'])) {
  // if ($_POST['submitt']) {
    
    $NamaPasien = htmlspecialchars(strip_tags($_POST['namaPasien']));
    $TanggalDaftar = htmlspecialchars(strip_tags($_POST['tanggalDaftar']));
    $Admin = htmlspecialchars(strip_tags($_POST['idAdmin']));
    $Biaya = htmlspecialchars(strip_tags($_POST['biayaDaftar']));


    $conn = mysqli_connect("localhost", "root", "", "uas_klinik");

    $sqll = "UPDATE tbl_pasien, tbl_pendaftaran SET tbl_pasien.namapasien ='".$NamaPasien."', tbl_pendaftaran.tgldaftar = '".$TanggalDaftar."', tbl_pendaftaran.idadmin = '".$Admin."', tbl_pendaftaran.biaya = '".$Biaya."' WHERE tbl_pendaftaran.idpasien = tbl_pasien.idpasien";

    $query = mysqli_query($conn, $sqll);

    var_dump($sqll);

    if (mysqli_affected_rows($conn) > 0) {
    echo "<script>alert('Data berhasil diubah'); document.location.href = 'index.php';</script>";
    } else{
    echo "<script>alert('Data berhasil diubah'); document.location.href = 'editDaftar.php';</script>";
    }

  }



 ?>


