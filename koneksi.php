<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "db_antrian";

$conn = mysqli_connect($host, $username, $password, $dbname);
if($conn == FALSE){
	echo "koneksi gagal".mysqli_connect_error();
}
?>