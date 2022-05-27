<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
  // panggil file "database.php" untuk koneksi ke database
  require_once "koneksi.php";

  session_start();
  if(!$_SESSION['id_user']){
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
  $sql = "SELECT COUNT(nomor) as jml_antri from antrian1 WHERE tiket ='$tipeuser' and DATE_FORMAT(datang,'%Y-%m-%d') = CURDATE()";
  $query = mysqli_query($conn, $sql) or die('Ada kesalahan pada query tampil data : ' . mysqli_error($conn));
  // ambil jumlah baris data hasil query
  $rows = mysqli_num_rows($query);

  // cek hasil query
  // jika data "no_antrian" ada
  if ($rows <> 0) {
    // ambil data hasil query
    $data = mysqli_fetch_assoc($query);
    // buat variabel untuk menampilkan data
    $no_antrian = $data['jml_antri'];

    // tampilkan data
    echo number_format($no_antrian, 0, '', '.');
  } 
  // jika data "no_antrian" tidak ada
  else {
    // tampilkan "-"
    echo "-";
  }
}