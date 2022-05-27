<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/DataTables/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/custom-style.css">
	<title>monitor</title>
	<style type="text/css">
		body {
            background-image: url("assets/img/152 Sea Lord.png");
        }
        #hidden {
        	visibility: hidden;
        	font-size: 1px;
        }        
	</style>
</head>
<body class="d-flex mt-5">
	<div class="container-fluid mt-3">
		<div class="d-flex flex-row mb-3">
			<div class="col-md-6 mb-4">
				<div class="card border-1 shadow-sm" style="width: 47.4rem; height: 31.5rem;">
					<div class="card-body text-center p-4">
						<div id="panggil"></div>
						<p class="" style="font-size: 30px; font-weight: bolder; padding-top: 1rem;">ANTRIAN DIPANGGIL</p>
						<p class="" style="font-size: 150px; font-weight: bolder; padding-top: 2rem" id="nomor_panggil"></p>
						<p class="" style="font-size: 60px; font-weight: bolder; padding-top: 1rem" id="loket_panggil"></p>
					</div>
				</div>
			</div>
			<div class="col-md-6 mb-4">				
				<div id="karusel" class="carousel slide" data-ride="carousel" >
					<ul class="carousel-indicators">
						<li data-target="#karusel" data-slide-to="0" class="active"></li>
						<li data-target="#karusel" data-slide-to="1"></li>
					</ul>

					<div class="carousel-inner">
						<div class="carousel-item active">
							<img src="./assets/img/carousel_1.jpeg" width="800" height="500">							
						</div>
						<div class="carousel-item">
							<img src="./assets/img/carousel_2.png" width="800" height="500">							
						</div>
					</div>
				</div>								
			</div>						
		</div>

		<!-- element untuk memanggil suara -->		
		<div id="hidden"></div>
		<div id="show"></div>

		<div class="d-flex flex-row mb-2">
			<div class="col-md-2 mb-4">
				<div class="card border-1 shadow-sm">
					<div class="card-header bg-warning chead-tpt">LOKET A</div>
					<div class="card-body text-center p-4">						
						<div class="cbody-tpt" id="loket_a"></div>						
					</div>
				</div>
			</div>
			<div class="col-md-2 mb-4">
				<div class="card border-1 shadow-sm">
					<div class="card-header bg-warning chead-tpt">LOKET B</div>
					<div class="card-body text-center p-4">						
						<div class="cbody-tpt" id="loket_b"></div>						
					</div>
				</div>
			</div>
			<div class="col-md-2 mb-4">
				<div class="card border-1 shadow-sm">
					<div class="card-header bg-warning chead-tpt">LOKET C</div>
					<div class="card-body text-center p-4">						
						<div class="cbody-tpt" id="loket_c"></div>						
					</div>
				</div>
			</div>
			<div class="col-md-2 mb-4">
				<div class="card border-1 shadow-sm">
					<div class="card-header bg-danger chead-tpt">LOKET D</div>
					<div class="card-body text-center p-4">						
						<div class="cbody-tpt" id="loket_d"></div>						
					</div>
				</div>
			</div>
			<div class="col-md-2 mb-4">
				<div class="card border-1 shadow-sm">
					<div class="card-header bg-danger chead-tpt">LOKET E</div>
					<div class="card-body text-center p-4">						
						<div class="cbody-tpt" id="loket_e"></div>						
					</div>
				</div>
			</div>
			<div class="col-md-2 mb-4">
				<div class="card border-1 shadow-sm">
					<div class="card-header bg-danger chead-tpt">LOKET F</div>
					<div class="card-body text-center p-4">						
						<div class="cbody-tpt" id="loket_f"></div>						
					</div>
				</div>
			</div>
		</div>		
	</div>		
	<audio id="tingtung" src="./assets/audio/tingtung.mp3"></audio>
<script type="text/javascript" src="./assets/js/vendor/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="./assets/js/popper.min.js"></script>
<script type="text/javascript" src="./assets/js/bootstrap.min.js"></script>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->
<script type="text/javascript" src="./assets/DataTables/datatables.min.js"></script>
<script src="https://code.responsivevoice.org/responsivevoice.js?key=aoXZ0NUI"></script>
<script type="text/javascript">
	$(document).ready(function(){		
		$("#loket_a").load("monitor_loket_a.php");
        $("#loket_b").load("monitor_loket_b.php");
        $("#loket_c").load("monitor_loket_c.php");
        $("#loket_d").load("monitor_loket_d.php");
        $("#loket_e").load("monitor_loket_e.php");
        $("#loket_f").load("monitor_loket_f.php");
        $("#nomor_panggil").load("get_nomor_panggil.php");
        $("#loket_panggil").load("get_loket_panggil.php");
        // $("#hidden").load("get_panggil.php");        

        setInterval(function(){
            $("#loket_a").load("monitor_loket_a.php");
	        $("#loket_b").load("monitor_loket_b.php");
	        $("#loket_c").load("monitor_loket_c.php");
	        $("#loket_d").load("monitor_loket_d.php");
	        $("#loket_e").load("monitor_loket_e.php");
	        $("#loket_f").load("monitor_loket_f.php");
	        $("#nomor_panggil").load("get_nomor_panggil.php");
        	$("#loket_panggil").load("get_loket_panggil.php");
        	// $("#hidden").load("get_panggil.php");        	        	
        }, 1000);

        setInterval(function(){
	        $.get('get_panggil.php', function(data){
	        	var nomor_panggil = data;
	        	if(nomor_panggil != "0") {
	        		var bell = document.getElementById('tingtung');
	        		bell.pause();
            		bell.currentTime = 0;
            		bell.play();

            		durasi_bell = bell.duration * 1000;

	        		setTimeout(function(){
	        			responsiveVoice.speak(nomor_panggil, "Indonesian Male", {
			                rate: 0.9,
			                pitch: 1,
			                volume: 1
		            	});
	        		}, durasi_bell);	        		
	        	}       	
	        });
	        $.ajax({                
                url: "clear_panggil.php",          
            });        	        	        	
        }, 1000);
	});
</script>
</body>
</html>