<?php
require_once "admin/core/init3.php"; // memanggil koneksi
global $link;
$username = mysqli_escape_string($link, $_POST['user']);
$password = mysqli_escape_string($link, $_POST['pass']);
$password = md5($password);
$nama     = mysqli_escape_string($link, $_POST['nama']);
$level = 'member';
// query untuk insert data user baru

if (isset($username) && isset($password) && isset($nama) && isset($level)) {
  $insert = "insert into tb_login set username = '$username', password = '$password', nama = '$nama', level = '$level'";
  if (mysqli_query($link, $insert))
  {
    echo "<h3>User berhasil ditambahkan</h3>";
    echo "<html><head><meta http-equiv='refresh' content='1;url=index.php'></head><body></body></html>";
  }
  else {
    echo "<h3>User gagal ditambahkan</h3>";
  }
}
?>
