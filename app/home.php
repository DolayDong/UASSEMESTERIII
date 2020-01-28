  <?php 

  //session_start();


if (!isset($_SESSION['idAdmin'])) {
  echo "<script>document.location.href = '../login.php'</script>";
  exit;
}

   ?>

  <h3>Pendaftaran Pasien</h3>
  <h4>Klinik LP3I Jakarta</h4>
  <img src="../img/pallangmerah.jpg">