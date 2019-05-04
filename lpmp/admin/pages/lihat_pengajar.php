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
include "header.php";

$pengajar = show_pengajar();

?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Lihat Data
            <small>Pengajar</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Lihat Data</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Pengajar</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Kode Pengajar</th>
                        <th>Nama Pengajar</th>
                        <th>Mata Pelajaran</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php while ($row= mysqli_fetch_array($pengajar)){?>
                      <tr>
                        <td><?php echo $row['kode_wi']; ?></td>
                        <td><?php echo $row['nama_wi']; ?></td>
                        <td><?php echo $row['mapel']; ?></td>
                        <td><a href="edit_pengajar.php?kode_wi=<?=$row['kode_wi'];?>" class="btn btn-block btn-warning btn-flat fa fa-edit" > Edit</a></td>
                        <td><a href="hapus_pengajar.php?kode_wi=<?=$row['kode_wi'];?>" class="btn btn-block btn-danger btn-flat fa fa-trash" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"> Hapus</a></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

   <?php
  include "footer.php";
}else {
  header("location: ../index.php");
  //jika tidak maka kembali ke halaman login.php

}
   ?>
