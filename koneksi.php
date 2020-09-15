<?php 
	
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'db_bengkel';

	$koneksi = mysqli_connect($hostname, $username, $password, $database)
	or die('Could not connect: ' . mysqli_connect_error());

?>