   <?php 

  //session_start();

  
if (!isset($_SESSION['idAdmin'])) {
  echo "<script>document.location.href = '../login.php'</script>";
  exit;
}

   ?>

 <table>
  <tr>
    <td colspan="7">
      <form class="form-inline my-2 my-lg-0" method="post" action="">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="cari">Search</button>
      </form>
    </td>
  </tr>
</table>

 <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">no</th>
            <th scope="col">id daftar</th>
            <th scope="col">nama pasien</th>
            <th scope="col">tanggal daftar</th>
            <th scope="col">admin</th>
            <th scope="col">biaya</th>
            <th scope="col">aksi</th>


          </tr>
        </thead>
        <tbody>

          
 <?php 


$conn = mysqli_connect("localhost", "root", "", "uas_klinik");
$sql = "SELECT * FROM tbl_pendaftaran JOIN tbl_pasien ON tbl_pasien.idpasien = tbl_pendaftaran.idpasien ORDER BY tbl_pasien.namapasien ASC";

$query = mysqli_query($conn, $sql);
if (isset($_POST['cari'])) {
  $keyword = $_POST['keyword'];  

$sql = "SELECT * FROM tbl_pendaftaran JOIN tbl_pasien ON tbl_pasien.idpasien = tbl_pendaftaran.idpasien WHERE namapasien LIKE '%$keyword%' OR iddaftar LIKE '%$keyword%'";
  
  
$query = mysqli_query($conn, $sql);


}
$no = 1;
while($c = mysqli_fetch_assoc($query)) :
  
  ?>
          <tr>
            
            <th scope="row"><?php echo $no; ?></th>
            <td><?php echo $c['iddaftar']; ?></td>
            <td><?php echo $c['namapasien']; ?></td>
            <td><?php echo $c['tgldaftar']; ?></td>
            <td><?php echo $c['idadmin']; ?></td>
            <td><?php echo $c['biaya']; ?></td>
            <td> 
              <a href="editDaftar.php?idDaftar=<?= $c['iddaftar']; ?>"><button  type="button" class="btn btn-warning" >Edit</button></a>
      
              <a href="hapus.php?idDaftar=<?= $c['iddaftar']; ?>"><button type="button" class="btn btn-danger" onclick="return confirm('hapus data?');" >Hapus</button></a>
              
              
            </td>
          </tr>
          <?php $no++; ?>
        <?php endwhile; ?>
          
        </tbody>
      </table>