<?php
require_once "../core/init.php";

if(@$_SESSION['admin'] || @$_SESSION['member']) { // jika sudah ada session admin atau session operator, maka ke halaman index

 if(@$_SESSION['admin']) { //apabila sessionnya admin
  $userlogin = @$_SESSION['admin'];

 } else if(@$_SESSION['member']) { //apabila sessionnya admin
  $userlogin = @$_SESSION['member'];
 }

 // menuliskan query mysql dimana kode_user = $userlogin
 // yaitu session pada script di atas
 global $link;
 $sql = mysqli_query($link, "select * from tb_login where kode_user = '$userlogin'") or die(mysqli_error());

 //menjadikan data sebagai arrray
 $data = mysqli_fetch_array($sql);

$kode_diklat = $_GET['kode_diklat'];

if (isset($_GET['kode_diklat'])) {
  $diklat = diklat_id($kode_diklat);
   while ($row= mysqli_fetch_assoc($diklat)){
    $kode_diklat = $row['kode_diklat'];
    $nm_diklat = $row['nm_diklat'];
    $jam = $row['jam'];
    $mulai = $row['mulai'];
    $selesai = $row['selesai'];
   }
}

if (isset($_POST['submit'])) {
  $kode_diklat = $_POST['kode_diklat'];
  $nm_diklat = $_POST['nm_diklat'];
  $jam = $_POST['jam'];
  $mulai = $_POST['mulai'];
  $selesai = $_POST['selesai'];

  if (!empty(trim($kode_diklat)) && !empty(trim($nm_diklat))) {
    if (edit_diklat($kode_diklat, $nm_diklat, $jam, $mulai, $selesai)) {
      header('location: lihat_diklat.php');
    }
  }
}
include "header.php";

?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Update Data
            <small>Diklat</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Update Data</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
                  <div class="col-lg-12">
<!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <div class="col-lg-12">
                  <form action="" method=POST enctype="multipart/form-data" role="form">
                    <div class="form-group">
                                            <label>Kode Diklat :</label>
                                            <input class="form-control" name="kode_diklat" value="<?=$kode_diklat; ?>">
                                        </div>
                    <div class="form-group">
                                            <label>Nama Diklat :</label>
                                            <input class="form-control" name="nm_diklat" value="<?=$nm_diklat; ?>">
                                        </div>
                    <div class="form-group">
                                            <label>Waktu Pelaksanaan :</label>
                                            <input class="form-control" name="jam" value="<?=$jam; ?>">
                                        </div>
                    <div class="form-group">
                                            <label>Tanggal Mulai :</label>
                                            <input class="form-control" name="mulai" value="<?=$mulai; ?>">
                                        </div>
                    <div class="form-group">
                                            <label>Tanggal Selesai :</label>
                                            <input class="form-control" name="selesai" value="<?=$selesai; ?>">
                                        </div>

                 <button type="submit" name="submit" class="btn btn-default">Save</button>
                                    <button type="reset" class="btn btn-default">Reset </button>
                                    </div></form></div></div></div>
                 </div>
                    <!--End Advanced Tables -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

   <?php
  include "footer.php";
}else {
  header("location: ../index.php");
  //jika tidak maka kembali ke halaman login.php

}
   ?>
