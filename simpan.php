<?php
		include 'conn.php';
		$nama 	= $_POST['nama'];
		$email 	= $_POST['email'];
		$alamat = $_POST['alamat'];

		$query = mysqli_query($koneksi, "INSERT INTO table_crud VALUES ('', '$nama', '$email','$alamat')");
		if($query){
			header("location:index.php?success=true");
		}
		else{
			header("location:index.php?page=tambah-data&err=true");
		}
?>