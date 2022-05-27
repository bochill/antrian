<?php
session_start();
if(!$_SESSION['auth']){
	header("location: login.php");
}
$user = $_SESSION['nama'];
?>
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
	<title>PANEL ANTRIAN</title>
    <style type="text/css">
        body {
            background-image: url("assets/img/031 Blessing.png");
            max-width: 80%;
            margin: auto;                                                          
        }
        @font-face{
            font-family: 'comicate';
            src:  url('assets/fonts/Lato.woff2');
        }
        *{
            font-family: 'comicate';
            font-size: 16px;
        }
        .nomor-antri{
            font-size: 28px;
            text-align: right;
            font-weight: bolder;
        }
        
    </style>
</head>
<body >
    <div class="container-fluid mt-3">        
        <div class="card">
            <div class="card-body" style="text-align: center;">LOKET
                <?php echo $user;?>
                <a href="logout.php"><i class="fa fa-sign-out fa-lg" aria-hidden="true" style="float: right;"></i></a>
            </div>
        </div>
        <hr>
        <div class="row">
        <!-- menampilkan informasi jumlah antrian -->
        <div class="col-md-3 mb-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="d-flex justify-content-start">
                <div class="feature-icon-1 me-4">
                  <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <div>
                  <p id="jumlah-antrian" class="fs-3 text-warning mb-1 nomor-antri"></p>
                  <p class="mb-0">Jumlah Antrian</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- menampilkan informasi nomor antrian yang sedang dipanggil -->
        <div class="col-md-3 mb-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="d-flex justify-content-start">
                <div class="feature-icon-2 me-4">
                  <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <div>
                  <p id="antrian-sekarang" class="fs-3 text-success mb-1 nomor-antri"></p>
                  <p class="mb-0">Antrian Sekarang</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- menampilkan informasi nomor antrian yang akan dipanggil selanjutnya -->
        <div class="col-md-3 mb-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="d-flex justify-content-start">
                <div class="feature-icon-3 me-4">
                  <i class="fa fa-user-plus" aria-hidden="true"></i>
                </div>
                <div>
                  <p id="antrian-selanjutnya" class="fs-3 text-info mb-1 nomor-antri"></p>
                  <p class="mb-0">Antrian Brkutnya</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- menampilkan informasi jumlah antrian yang belum dipanggil -->
        <div class="col-md-3 mb-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="d-flex justify-content-start">
                <div class="feature-icon-4 me-4">
                  <i class="fa fa-user-secret" aria-hidden="true"></i>
                </div>
                <div>
                  <p id="sisa-antrian" class="fs-3 text-danger mb-1 nomor-antri"></p>
                  <p class="mb-0">Sisa Antrian</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card border-0 shadow-sm" style="width: 100%">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table id="tabel-antrian" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                            <th>Nomor Antrian</th>
                            <th>Status</th>
                            <th>Panggil</th>
                            </tr>
                        </thead>
                    </table>
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
<!-- <script src="https://code.responsivevoice.org/responsivevoice.js?key=aoXZ0NUI"></script> -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#jumlah-antrian").load("get_jumlah_antrian.php");
        $("#antrian-sekarang").load("get_antri_sekarang.php");
        $("#antrian-selanjutnya").load("get_antri_next.php");
        $("#sisa-antrian").load("get_sisa_antri.php");

        var table = $("#tabel-antrian").DataTable({
            "lengthChange": false,
            "searching": false,
            "ajax": "get_antrian.php",           
            "columns": [{
                "data": "nomor",
                "width": "75%",
                "className": "text-center"
            },
            {
                "data": "status",
                "visible": false,
            },
            {
                "data": null,
                "orderable": false,
                "searchable": false,
                "width": "50%",
                "className": "text-center",
                "render": function(data, type, row){
                    if(data["status"] === ""){
                        var btn = "-";
                    } else if(data["status"] === "0") {
                        var btn = "<button class=\"btn btn-success btn-sm rounded-circle\"><i class=\"fa fa-microphone\"></i></button>";
                    } else if(data["status"] === "1") {
                        var btn = "<button class=\"btn btn-secondary btn-sm rounded-circle\"><i class=\"fa fa-microphone-slash\"></i></button>";
                    }
                    return btn;
                }

            }],
            "order": [[0, "desc"]],
            "iDisplayLength": 10
        });

        // panggilan antrian dan update data
        $('#tabel-antrian tbody').on('click', 'button', function() {
            // ambil data dari datatables 
            var data = table.row($(this).parents('tr')).data();
            // buat variabel untuk menampilkan data "id"
            var id = data["id"];
            // buat variabel untuk menampilkan audio bell antrian
            // var bell = document.getElementById('tingtung');
            // var loket = "<?php echo $_SESSION['nama']; ?>";

            // // mainkan suara bell antrian
            // bell.pause();
            // bell.currentTime = 0;
            // bell.play();

            // // set delay antara suara bell dengan suara nomor antrian
            // durasi_bell = bell.duration * 770;

            // // mainkan suara nomor antrian
            // setTimeout(function() {
            // responsiveVoice.speak("Nomor Antrian, " + data["tiket"] +data["nomor"] + ", menuju, loket, " + loket, "Indonesian Male", {
            //     rate: 0.9,
            //     pitch: 1,
            //     volume: 1
            // });
            // }, durasi_bell);

            // proses update data
            $.ajax({
                type: "POST",               // mengirim data dengan method POST
                url: "update.php",          // url file proses update data
                data: { id: id }            // tentukan data yang dikirim
            });
        });

        setInterval(function(){
            $("#jumlah-antrian").load("get_jumlah_antrian.php").fadeIn("slow");
            $("#antrian-sekarang").load("get_antri_sekarang.php").fadeIn("slow");
            $("#antrian-selanjutnya").load("get_antri_next.php").fadeIn("slow");
            $("#sisa-antrian").load("get_sisa_antri.php").fadeIn("slow");
            table.ajax.reload(null, false);
        }, 1000);
    });
</script>
</body>
</html>