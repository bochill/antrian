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

  // sql statement untuk menampilkan data "no_antrian" dari tabel "tbl_antrian" berdasarkan "tanggal" dan "status = 0"
  $query = mysqli_query($conn, "SELECT nomor FROM antrian1 WHERE DATE_FORMAT(datang,'%Y-%m-%d') = CURDATE() AND status='0' AND tiket = '$tipeuser' ORDER BY nomor ASC LIMIT 1") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($conn));
  // ambil jumlah baris data hasil query
  $rows = mysqli_num_rows($query);

  // cek hasil query
  // jika data "no_antrian" ada
  if ($rows <> 0) {
    // ambil data hasil query
    $data = mysqli_fetch_assoc($query);
    // buat variabel untuk menampilkan data
    $nomor = $data['nomor'];

    // tampilkan data
    echo number_format($nomor, 0, '', '.');
  } 
  // jika data "no_antrian" tidak ada
  else {
    // tampilkan "-"
    echo "-";
  }
}
