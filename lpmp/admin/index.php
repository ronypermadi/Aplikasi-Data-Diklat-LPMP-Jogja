<?php
require_once "core/init2.php";
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
include "header.php";
?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Administrator
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home active"></i> Home</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <h1 align=center><marquee scrollamount="10" align="center">Selamat Datang Di Halaman Admin LPMP JOGJA</marquee></h1>
          <table>
              <img align=center class="img-responsive img-rounded" src="dist/img/lpmp.jpg" width="100%" height="100%" alt="">
          </table>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

   <?php
   include "footer.php";
   }else {
     header("location: ../index.php");
     //jika tidak maka kembali ke halaman login.php

   }
   ?>
