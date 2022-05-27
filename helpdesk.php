<?php
	header('Access-Control-Allow-Origin: *');
	
	require_once "koneksi.php";

	$sql1 = "SELECT max(nomor) as urut from antrian1 where tiket = 'b' and DATE_FORMAT(datang,'%Y-%m-%d') = CURDATE()";
	$query1 = mysqli_query($conn, $sql1) or die(mysqli_connect_error());

	if($query1 = mysqli_query($conn, $sql1)){
		$data = mysqli_fetch_object($query1);
		$urut = $data->urut;
		$urut = $urut + 1;
	}

	$sql2 = "insert into antrian1 (nomor, status, tiket) values ('".$urut."','0','b')";	
	mysqli_query($conn, $sql2);

	mysqli_close($conn);

	// echo "<script>this.close();</script>";

?>