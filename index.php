<?php
require_once("tanggal.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AMBIL ANTRIAN</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/font-awesome.min.css">
    <style type="text/css">
        .body {
            font-family: "Lucida Console", "Courier New", monospace;
        }

        .navbar-custom {
            background-color: #edc574;
        }

        .navbar {
            -webkit-box-shadow: 6px 8px 5px 0px rgba(0, 0, 0, 0.38);
            -moz-box-shadow: 6px 8px 5px 0px rgba(0, 0, 0, 0.38);
            box-shadow: 6px 8px 5px 0px rgba(0, 0, 0, 0.38);
        }

        #title {
            font-family: "Lucida Console", "Courier New", monospace;
        }

        .tombol {
            margin-top: 150px;
        }

        .btn-xl {
            padding: 100px 200px;
            font-size: 80px;
            border-radius: 10px;
        }

        div#tanggal {
            color: #e31c0e;
            text-align: right;
            padding-top: 10px;
        }

        .responsive-width {
            font-size: 3.5vw;
        }
    </style>
    <script type="text/javascript">

    </script>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-sm navbar-custom" style="font-size: 25px">
            <div class="mx-auto order-0" id="title">
                ANTRIAN
            </div>
        </nav>
        <b>
            <?php
            $dino = new Tanggal();
            echo "<div id='tanggal'>" . $dino->hari() . ", " . $dino->tanggal() . " " . $dino->bulan() . " " . $dino->tahun() . "</div>";
            ?>
        </b>
        <div class="row tombol">
            <div class="col-md-6"><button class="btn btn-xl btn-outline-success btn-block responsive-width" id="tpt"><b>TPT</b></button></div>
            <div class="col-md-6"><button class="btn btn-xl btn-outline-warning btn-block responsive-width" id="helpdesk"><b>HELPDESK</b></button></div>
        </div>
    </div>
    <script type="text/javascript" src="./assets/js/vendor/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="./assets/js/popper.min.js"></script>
    <script type="text/javascript" src="./assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#tpt").click(function() {
                $.ajax({
                    url: "http://10.12.28.235/antri/tpt.php",
                    success: function() {
                        window.open("http://10.12.28.235/antri/cetaktpt.php");
                    }
                });
            });

            $("#helpdesk").click(function() {
                $.ajax({
                    url: "http://10.12.28.235/antri/helpdesk.php",
                    success: function() {
                        window.open("http://10.12.28.235/antri/cetakhelpdesk.php");
                    }
                });
            });

        });
    </script>
</body>

</html>