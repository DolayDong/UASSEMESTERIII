<?php 

  

  //session_start();

  
if (!isset($_SESSION['idAdmin'])) {
  echo "<script>document.location.href = '../login.php'</script>";
  exit;
}

   ?>

  





<form method="post" action="" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Id Daftar</label>
    </div>
    <div class="form-group col-md-8">
      <input type="text" class="form-control" id="inputEmail4" name="idDaftar">
    </div>
<div class="form-group col-md-4">
      <label for="inputEmail4">Jenis Daftar</label>
    </div>
    <div class="form-group col-md-8">
    <input type="radio" name="jenis" value="Ada kartu pasien"> Ada kartu pasien
    <input type="radio" name="jenis" value="Belum ada kartu pasien"> Belum ada kartu pasien<br>
    </div>

    <div class="form-group col-md-4">
      <label for="inputEmail4">Id Pasien</label>
    </div>
    <div class="form-group col-md-8">
      <input type="text" class="form-control" id="inputEmail4" name="idPasien">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Nama Pasien</label>
    </div>
    <div class="form-group col-md-8">
      <input type="text" class="form-control" id="inputEmail4" name="namaPasien">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Alamat</label>
    </div>
    <div class="form-group col-md-8">
      <input type="text" class="form-control" id="inputEmail4" name="alamat">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Kontak</label>
    </div>
    <div class="form-group col-md-8">
      <input type="text" class="form-control" id="inputEmail4" name="kontak">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Foto</label>
    </div>
    <div class="form-group col-md-8">
      <input type="file" class="form-control" id="inputEmail4" name="foto">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Biaya Daftar</label>
    </div>
    <div class="form-group col-md-8">
      <input type="text" class="form-control" id="inputEmail4" name="biayaDaftar">
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="submitt">Simpan</button>
  <button type="submit" class="btn btn-primary">Batal</button>

</form>









  <?php 

if(isset($_POST['submitt'])){

  $IdDaftar = htmlspecialchars(strip_tags($_POST['idDaftar']));
  $IdPasien = htmlspecialchars(strip_tags($_POST['idPasien']));
  $JenisDaftar = htmlspecialchars(strip_tags($_POST['jenis']));
  $NamaPasien = htmlspecialchars(strip_tags($_POST['namaPasien']));
  $Alamat = htmlspecialchars(strip_tags($_POST['alamat']));
  $Kontak = htmlspecialchars(strip_tags($_POST['kontak']));
  $BiayaDaftar = htmlspecialchars(strip_tags($_POST['biayaDaftar']));
  $IdAdmin = $_SESSION['idAdmin'];
  var_dump($_FILES);
  var_dump($_POST);
  
  $Foto = upload();
  if (!$Foto) {

    return 0;
  }

  $conn = mysqli_connect('localhost','root','','uas_klinik');
  $sql = "INSERT INTO tbl_pendaftaran VALUES ('".$IdDaftar."', '".$IdPasien."', now(), '".$IdAdmin."','".$BiayaDaftar."');";

  
  $sql .= "INSERT INTO tbl_pasien(idpasien, namapasien, alamat, kontak, foto) VALUES ('".$IdPasien."', '".$NamaPasien."', '".$Alamat."', '".$Kontak."', '".$Foto."')";

  var_dump($sql);
  $query = mysqli_multi_query($conn, $sql);
  var_dump($query);
  // $query2 = mysqli_query($conn, $sql1);


  
if(mysqli_affected_rows($conn) > 0){
  echo '<script>alert("berhasil ditambahkan...!"); document.location.href="?tampil=dataPendaftaran"; </script>';
  //header('Location:index.php');
}else{
  echo'<script>alert("yaahhhhhh gagall...!")</script>';
}



// if($pass != Null){
// $sql = "insert into tabel_user values('','$user','$pass')";
// $simpan = mysqli_query($kon, $sql);

// }else { echo'<script>alert("Kolom input tidak boleh kosong...!")</script>'; return false;}




}

function upload(){
  $namaFile = $_FILES['foto']['name'];
  $TmpName = $_FILES['foto']['tmp_name'];

  move_uploaded_file($TmpName, '../img/fotopasien/' . $namaFile);

  return $namaFile;

}









   ?>