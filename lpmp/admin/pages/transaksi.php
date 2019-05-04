<?php
include "../core/init.php";

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
$no_induk=$_POST['no_induk'];
$kode_diklat=$_POST['kode_diklat'];
$count=count($no_induk);

for ($i=0;$i<$count;$i++) {

  global $link;

  $query = "INSERT INTO hasil (no_induk, kode_diklat) VALUES('$no_induk[$i]','$kode_diklat')";
  $result = mysqli_query($link, $query) or die('gagal menyimpan data');
}
header('location: transaksi.php');

}

include "header.php";

$transaksi = show_transaksi();
$diklat = show_diklat();
$biodata = show_biodata();

?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Transaksi
            <small>Peserta Diklat</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Transaksi</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Data Diklat</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div><!-- /.box-header -->
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-12">
                          <form action="" method=POST>
                          <div class="form-group">
                            <label>Nama Diklat</label>
                            <select id="kode_diklat"
                            name="kode_diklat" class="form-control select2" style="width: 100%;">
                              <option></option>
                              <?php while ($row= mysqli_fetch_array($diklat)){?>
                              <option value="<?=$row['kode_diklat'];?>" name="kode_diklat"><?=$row['nm_diklat'];?></option>
                              <?php } ?>
                            </select>
                          </div><!-- /.form-group -->
                        </div><!-- /.col -->
                        <div class="col-md-6">
                        <div class="form-group">
                          <label>Tanggal Mulai</label>
                          <select id="mulai" name="mulai" class="form-control" disabled="disabled" style="width: 100%;">
                            <option selected="selected">  </option>
                          </select>
                        </div><!-- /.form-group -->
                      </div><!-- /.col -->
                        <div class="col-md-6">
                      <div class="form-group">
                        <label>Tanggal Selesai</label>
                        <select id="selesai" name="selesai" class="form-control" disabled="disabled" style="width: 100%;">
                          <option selected="selected">  </option>
                        </select>
                      </div><!-- /.form-group -->
                    </div><!-- /.col -->
                      </div><!-- /.row -->
                      <button type="button" class="btn btn-primary btn-flat fa fa-edit pull-right" data-toggle="modal" data-target="#myModal">Add</button>
                    </div><!-- /.box-body -->
                  </div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:600px">
                <div class="modal-content">
                    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Data Peserta Diklat</h4>
      </div>
      <div class="modal-body">
<div class="btn-group" data-toggle="buttons">

<div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body" style="width:550px">
                  <table id="transaksi"  class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Peserta</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $no=1; while ($row= mysqli_fetch_array($biodata)){?>
                      <tr>
                        <td><?php echo ".$no"; ?></td>
                        <td><div class="form-group"><label>
    <input type="checkbox" class="minimal"  name="no_induk[]" autocomplete="off" value="<?=$row['no_induk'];?>">  <?=$row['nm_pes'];?>
</label></div></td>
                      </tr>
                    <?php $no++; } ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->


</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
</div></form>
                    <!--End Advanced Tables -->

        <div class="row">
            <div class="col-md-12">
                  <div class="box box-default">
                    <div class="box-header with-border">
                      <h3 class="box-title">Data Peserta Diklat</h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                      </div>
                    </div><!-- /.box-header -->

                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Peserta</th>
                        <th>NUPTK</th>
                        <th>NIP</th>
                        <th>Unit Kerja</th>
                        <th>Diklat Yang Diikuti</th>
                        <th>Hapus</th>
                      </tr>
                    </thead>
                    <tbody id="lihat">
                    <?php $no=1; while ($row= mysqli_fetch_array($transaksi)){?>
                      <tr>
                        <td><?php echo ".$no"; ?></td>
                        <td><?php echo $row['nm_pes']; ?></td>
                        <td><?php echo $row['nuptk']; ?></td>
                        <td><?php echo $row['nip']; ?></td>
                        <td><?php echo $row['unit_kepeg']; ?></td>
                        <td><?php echo $row['nm_diklat']; ?></td>
                        <td><a href="hapus_transaksi.php?id_hasil=<?=$row['id_hasil'];?>" class="btn btn-block btn-danger btn-flat fa fa-trash" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"> Hapus</a></td>
                      </tr>
                    <?php $no++; } ?>
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
