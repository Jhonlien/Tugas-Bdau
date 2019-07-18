<?php
	
	include 'conn.php';
	$id = $_GET['id'];
	$squery = mysqli_query($koneksi, "DELETE FROM `table_crud` WHERE id = $id");
	if($squery){
		header("location:index.php?delete=true");
	}

?>