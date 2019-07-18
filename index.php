<?php
	include 'conn.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tugas CRUD - PHP MYSQL</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-light bg-light" style="margin-bottom: 10px;">
		<div class="container">
	      	<a href="#" class="navbar-brand mb-0 h1">Tugas CRUD - PHP MYSQL</a>
	     </div>
	</nav>
<div class="container">
<?php
	if(empty($_GET['page'])){
		if(isset($_GET['success']) == "true"){
			echo "<div class=\"alert alert-primary\" role=\"alert\">Berhasil <strong>Menyimpan Data</strong></div>";
		}
		else if (isset($_GET['update']) == "true"){
			echo "<div class=\"alert alert-success\" role=\"alert\">Berhasil <strong>Meng-update Data</strong></div>";
		}
		else if (isset($_GET['delete']) == "true"){
			echo "<div class=\"alert alert-danger\" role=\"alert\">Berhasil <strong> Menghapus Data !</strong></div>";
		}
?>
		<table class="table table-hover">
		<a href="index.php?page=tambah-data" class="btn btn-success" style="margin-top: 10px; margin-bottom: 10px; ">Tambah Data</a>
		  <thead>
		    <tr>
		      <th scope="col">No</th>
		      <th scope="col">Nama</th>
		      <th scope="col">Email</th>
		      <th scope="col">Alamat</th>
		      <th scope="col">Aksi</th>
		    </tr>
		  </thead>
		  <?php 
		  	$data = mysqli_query($koneksi, "SELECT * FROM table_crud ORDER BY id DESC ");
		  	
		  ?>
		  <tbody>
		  	<?php 
		  	$no = 1;
		  	while($d = mysqli_fetch_array($data)){?>
		    <tr>
		      <th scope="row"><?= $no ?></th>
		      <td><?= $d['nama']?></td>
		      <td><?= $d['email']?></td>
		      <td><?= $d['alamat']?></td>
		      <td>	<?= "<a href=\"index.php?page=edit-data&id=$d[id]\" class=\"btn btn-success btn-small\">Edit</a>"  ?> &nbsp; 
		      		<?= "<a href=\"delete.php?id=$d[id]\" class=\"btn btn-danger\">Delete</a>"  ?>
		      </td>
		    </tr>
			<?php $no++; } ?>
		  </tbody>
	</table>
<?php } else if ($_GET['page'] == 'tambah-data') { 
			if(isset($_GET['err']) == "true"){
				echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal Menyimpan Data</div>";
			}
	?>
	<div class="card col-md-6"style="margin: 0 auto; padding: 20px;">
		<h2>Tambah Data</h2>
		<form method="POST" action="simpan.php">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Nama</label>
		    <input type="text" class="form-control" placeholder="Nama" name="nama" required>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Email</label>
		    <input type="email" class="form-control" placeholder="Email" name="email" required>
		  </div>
		   <div class="form-group">
		    <label>Alamat</label>
		    <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat" required></textarea>
		  </div>
		  <input type="submit" class="btn btn-success" value="Simpan">
		  <a href="index.php" class="btn btn-secondary">Batal </a>
		</form>
	</div>
<?php 
} 
else if($_GET['page'] == 'edit-data') 
{
				
?>
	<div class="card col-md-6"style="margin: 0 auto; padding: 20px;">
		<h2>Edit Data</h2>
		<?php
			$id = $_GET['id'];
			$edit_query = mysqli_query($koneksi, "SELECT * FROM table_crud WHERE id =$id");	
			while($c = mysqli_fetch_array($edit_query)){	
		?>
		<form method="POST" action="update.php">
		<input type="hidden" name="id" value="<?= $c['id'] ?>">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Nama</label>
		    <input type="text" class="form-control" placeholder="Nama" name="nama" value="<?php echo $c['nama'] ?>" required>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Email</label>
		    <input type="email" class="form-control" placeholder="Email" name="email" value="<?= $c['email'] ?>"  required>
		  </div>
		   <div class="form-group">
		    <label>Alamat</label>
		    <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat" required><?= $c['alamat'] ?></textarea>
		  </div>
		  <input type="submit" class="btn btn-success" value="Simpan">
		  <a href="index.php" class="btn btn-secondary">Batal </a>
		</form>
	</div>
<?php }}?>
</div>
</body>
</html>