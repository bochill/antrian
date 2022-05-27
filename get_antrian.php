<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
  // panggil file "database.php" untuk koneksi ke database
  require_once "koneksi.php";

  session_start();
  if(!$_SESSION['auth']){
    header("location: login.php");
  }
  $user = $_SESSION['username'];
  $tipeuser = '';
  if(substr($user, 0,3) == 'tpt'){
    $tipeuser = 'a';
  } else {
    $tipeuser = 'b';
  }

  // sql statement untuk menampilkan data "no_antrian" dari tabel "tbl_antrian" berdasarkan "tanggal" dan "status = 1"
  $sql = "SELECT id_antri, tiket, nomor, status from antrian1 WHERE tiket ='". $tipeuser ."' and DATE_FORMAT(datang,'%Y-%m-%d') = CURDATE()";
  $query = mysqli_query($conn, $sql) or die('Ada kesalahan pada query tampil data : ' . mysqli_error($conn));
  // ambil jumlah baris data hasil query
  $rows = mysqli_num_rows($query);

  // cek hasil query
  // jika data ada
  if ($rows <> 0) {
    $response         = array();
    $response["data"] = array();

    // ambil data hasil query
    while ($row = mysqli_fetch_assoc($query)) {
      $data['id']   = $row["id_antri"];
      $data['tiket']      = $row["tiket"];      
      $data['nomor']      = $row["nomor"];
      $data['status']     = $row["status"];

      array_push($response["data"], $data);
    }

    // tampilkan data
    echo json_encode($response);
  } else {
    $response         = array();
    $response["data"] = array();

    // buat data kosong untuk ditampilkan
    $data['id']         = "";
    $data['tiket']      = "";     
    $data['nomor']      = "-";
    $data['status']     = "";

    array_push($response["data"], $data);

    // tampilkan data
    echo json_encode($response);
  }
  
}