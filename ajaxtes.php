<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	sdasd
	<button id="klik">klik</button>

<script type="text/javascript" src="./assets/js/vendor/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="./assets/js/popper.min.js"></script>
<script type="text/javascript" src="./assets/js/bootstrap.min.js"></script>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->
<script type="text/javascript" src="./assets/DataTables/datatables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		
			$.get('get_panggil.php', function(data){
				var tes = data;
				alert(tes);
			});
		
		
	});
</script>
</body>
</html>