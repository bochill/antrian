<?php
session_start();

include('koneksi.php');

$username = $_POST['username'];
$password = $_POST['password'];

$query = "select * from tbl_user where username = '$username' and password = '$password'";
$result = mysqli_query($conn, $query);
$num_rows = mysqli_num_rows($result);
$data = mysqli_fetch_object($result);

if($num_rows >= 1){
	echo "success";
	$_SESSION['auth'] = true;
	$_SESSION['id_user'] = $data->id_user;
	$_SESSION['username'] = $data->username;
	$_SESSION['nama'] = $data->nama;
} else {
	echo "error";
}

?>