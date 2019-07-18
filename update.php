<?php
		include 'conn.php';
		$id 	= $_POST['id'];
		$nama 	= $_POST['nama'];
		$email 	= $_POST['email'];
		$alamat = $_POST['alamat'];

		$query = mysqli_query($koneksi, "UPDATE table_crud set nama='$nama', email='$email', alamat='$alamat' where id='$id'");
		if($query){
			header("location:index.php?update=true");
		}
		else{
			header("location:index.php?page=edit-data&err=true");
		}
?>