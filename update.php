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
  $nama = $_SESSION['nama'];
  $tipeuser = '';
  if(substr($user, 0,3) == 'tpt'){
    $tipeuser = 'a';
  } else {
    $tipeuser = 'b';
  }

  // mengecek data post dari ajax
  if (isset($_POST['id'])) {
    // ambil data hasil post dari ajax
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    // tentukan nilai status
    $status = "1";    
   
    // sql statement untuk update data di tabel "tbl_antrian" berdasarkan "id"
    $update = mysqli_query($conn, "UPDATE antrian1 SET status='$status', loket='$nama', dilayani = DATE_FORMAT(now(),'%Y-%m-%d %H:%i:%s') WHERE id_antri='$id' and tiket = '$tipeuser'") or die('Ada kesalahan pada query update : ' . mysqli_error($conn));

    // query untuk isi tabel panggil
    $insert_panggil = mysqli_query($conn, "INSERT INTO panggil (tiket, nomor, loket) SELECT tiket, nomor, loket from antrian1 ORDER BY dilayani DESC LIMIT 1") or die('Ada kesalahan pada query update : ' . mysqli_error($conn));
  }
}
