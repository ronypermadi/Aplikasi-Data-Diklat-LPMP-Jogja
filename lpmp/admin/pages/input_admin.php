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

if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $password=md5($password);
  $level=$_POST['level'];

  if (!empty(trim($username)) && !empty(trim($password))) {
    if (add_admin($nama, $username, $password, $level)) {
      header('location: lihat_admin.php');
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
            Input Data
            <small>Admin</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Input Data</li>
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
                                            <label>Nama :</label>
                                            <input class="form-control" name="nama" placeholder="Nama" /required>
                                        </div>
                    <div class="form-group">
                                            <label>Username :</label>
                                            <input class="form-control" name="username" placeholder="Username" /required>
                                        </div>
                    <div class="form-group">
                                            <label>Password :</label>
                                            <input class="form-control" type="password" name="password" placeholder="Password" /required>
                                        </div>
                    <div class="form-group">
                                            <label>Level :</label>
                                            <select class='form-control' name='level'>
                                        <option value='admin'>Admin</option>
                                        <option value='member'>Member</option>
                                        </select><br />
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
