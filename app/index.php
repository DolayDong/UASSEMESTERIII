<?php 
session_start();

if (!isset($_SESSION['idAdmin'])) {
  echo "<script>document.location.href = '../login.php'</script>";
  exit;
}
 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
  <div class="header">
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Klinik LP3I</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Data Master
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="?tampil=dataPasien">Data Pasien</a>
          <a class="dropdown-item" href="?tampil=dataPendaftaran">Pendaftaran</a>
          
        </div>
      </li>
       <li class="nav-item active">
        <a class="nav-link " href="?tampil=formPendaftaran" tabindex="-1">FORM PENDAFTARAN</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link " href="logout.php" tabindex="-1">Logout</a>
      </li>
    </ul>
  </div>
</nav>
</div>
<div class="content">
  <?php 

if (isset($_GET['tampil'])) {
  if ($_GET['tampil'] == 'dataPendaftaran') {
    include 'pendaftaran.php';
  }elseif ($_GET['tampil'] == 'dataPasien') {
    include 'pasien.php';
}elseif($_GET['tampil'] == 'formPendaftaran'){
  include 'tambah.php';
}else{
  
}
  }else{
    include 'home.php';
  }
?>
</div>
<div class="footer">
  
</div>
</body>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</html>


