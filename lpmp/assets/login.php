<?php
session_start();
$username =$_POST[username];
$sandi =$_POST[password];

include "../../koneksi.php";

$hasil = mysql_query("SELECT * FROM user WHERE username='$username' and password=md5('$sandi')", $id_mysql);

$jumlah = mysql_num_rows($hasil);

if($jumlah==0){
echo "<script>alert('Login Gagal Silahkan Ulangi Lagi')</script>";
print ("<html><head><meta http-equiv='refresh' content='0;url=../index.html'></head><body></body></html>");
}
else{
echo "Username dan Password cocok";

while ($baris=mysql_fetch_array($hasil)){
$username=$baris[username];
$password=$baris[password];
}

$_SESSION["username"]=$username;
$_SESSION["password"]=$password;

print ("<html><head><meta http-equiv='refresh' content='0;url=../admin_page/dashboard.php'></head><body></body></html>");
}
?>