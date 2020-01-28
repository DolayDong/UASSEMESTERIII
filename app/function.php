<?php 



function cari($keyword){
	$conn = mysqli_connect("localhost", "root", "", "uas_klinik");

	$sql = "SELECT * FROM tbl_pasien WHERE namapasien LIKE '%$keyword%'";

	$query = mysqli_query($conn, $sql);

	$data[] = $query;

	return $data;

}














 ?>