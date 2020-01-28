<?php session_start();
$conn = mysqli_connect("localhost", "root", "", "uas_klinik");

if (isset($_POST['login'])) {
	$Username = htmlspecialchars(strip_tags($_POST['username']));
	$Password = htmlspecialchars(strip_tags($_POST['password']));

	$sql = "SELECT * FROM tbl_admin WHERE nama_admin = '".$Username."'";

$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) === 1) {

		$data = mysqli_fetch_assoc($result);

		if ($data['password_user'] == $Password) {
		$_SESSION['idAdmin'] = $Username;

		echo"<script>document.location.href= 'app/index.php'</script>";
		} 

	} else{
		echo "<script>alert('Username / password Tidak terdaftar')</script>";
	}
	
}

 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <title>Uas Semester III</title>
  </head>
  <body>
  	<div class="bg-login">
  		
   <div class="kotak_login">
	<p class="tulisan_login">Silahkan login</p>
 
	<form method="post" action="">
		<label>Username</label>
		<input type="text" name="username" class="form_login" placeholder="Username atau email ..">
 
		<label>Password</label>
		<input type="password" name="password" class="form_login" placeholder="Password .." autocomplete="off">
		<br/>
		<br/>
		<center>
		<div>
			<button type="submit" class="tombol_login" name="login">LOGIN</button>
		</div>
		<br>
		<div>
			<button type="submit" class="tombol_kembali" name="kembali">KEMBALI</button>
		</div>
			
		</center>
	</form>
	
</div>
  	</div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
  <script src="js/bootstrap.min.js"></script>
</html>