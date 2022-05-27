<?php
	header('Access-Control-Allow-Origin: *');
	
	require_once "koneksi.php";

	$sql1 = "SELECT max(nomor) as urut, tiket, DATE_FORMAT(datang,'%d-%m-%Y %H:%i:%s') as datang from antrian1 where tiket = 'b' and DATE_FORMAT(datang,'%Y-%m-%d') = CURDATE()";
	$query1 = mysqli_query($conn, $sql1) or die(mysqli_connect_error());

	if($query1 = mysqli_query($conn, $sql1)){
		$data = mysqli_fetch_object($query1);
		$urut = $data->urut;
		$tiket = $data->tiket;
		$datang = $data->datang;		
	}	

?>
<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<script type="text/javascript" src="./assets/node_modules/html2canvas/dist/html2canvas.min.js"></script>
	<title>tpt cetak</title>
	<script>
    	window.onload = function () {
            window.print();
            setTimeout(function(){window.close();}, 1);
        }
    </script>
	<style type="text/css">
		#nomor {
			font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
			font-size: 85px;
			letter-spacing: 2px;
			word-spacing: 2px;
			color: #000000;
			font-weight: 700;
			text-decoration: none;
			font-style: normal;
			font-variant: normal;
			text-transform: uppercase;
		}

		#datang {
			font-family: "Lucida Console", Monaco, monospace;
			font-size: 10px;
			letter-spacing: 2px;
			word-spacing: 2px;
			color: #000000;
			font-weight: 700;
			text-decoration: none;
			font-style: normal;
			font-variant: normal;
			text-transform: uppercase;
		}
	</style>
</head>
<body>
	<div id="printarea">
		<div style="font-size: 18px">Nomor Antrian Anda</div>
		<hr>
		<div id="nomor">
		<?php
			echo $tiket."".$urut;
		?>
		</div>
		<br><br>
		<div id="datang">
		<?php
			echo $datang;
		?>	
		</div>
		<p style="font-size: 14px;">KPP Pratama Batu</p>
	</div>		
</body>
</html>