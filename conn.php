<?php
$server		= "localhost"; $user= "root"; $pass=""; $db = "tugas_crud"; 
$koneksi	= mysqli_connect($server, $user, $pass, $db) or die("Connection error ". mysqli_connect_error());
$select_db 	= mysqli_select_db($koneksi, $db);

?>