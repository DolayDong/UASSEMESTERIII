<?php 
$kon = mysqli_connect('localhost','root','','uas_klinik');

$idDaftar=$_GET['idDaftar'];
$idPasien=$_GET['idPasien'];



	if (isset($idPasien)) {
	$hapus = mysqli_query($kon , "DELETE from tbl_pasien where idpasien = '".$idPasien."'");
		
	}else{
	$hapus = mysqli_query($kon , "DELETE from tbl_pendaftaran where iddaftar = '".$idDaftar."'");
	}




if(mysqli_affected_rows($kon) > 0){ 
	echo '<script>alert("berhasil dihapus.."); document.location.href="index.php?tampil=dataPasien";  </script>';
  
}else{
  echo'<script>alert("gagall...!")</script>';
}







 ?>