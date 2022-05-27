<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
  // panggil file "database.php" untuk koneksi ke database
  require_once "koneksi.php";

  // sql statement untuk menampilkan data "no_antrian" dari tabel "tbl_antrian" berdasarkan "tanggal" dan "status = 1"
  $query = mysqli_query($conn, "SELECT nomor FROM antrian1 WHERE DATE_FORMAT(datang,'%Y-%m-%d') = CURDATE() AND status='1' AND loket = 'd' ORDER BY dilayani DESC LIMIT 1") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($conn));
  // ambil jumlah baris data hasil query
  $rows = mysqli_num_rows($query);

  // cek hasil query
  // jika data "no_antrian" ada
  if ($rows <> 0) {
    // ambil data hasil query
    $data = mysqli_fetch_assoc($query);
    // buat variabel untuk menampilkan data
    $no_antrian = $data['nomor'];
    $formatted_number = number_format($no_antrian, 0, '', '.');

    // tampilkan data
    echo "B ".$formatted_number;
  } 
  // jika data "no_antrian" tidak ada
  else {
    // tampilkan "-"
    echo "-";
  }
}
