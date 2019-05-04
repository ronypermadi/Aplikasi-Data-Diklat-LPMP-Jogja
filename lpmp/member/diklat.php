<?php
require_once "../admin/core/init4.php";

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

$diklat = show_diklat();
include "header.php";
?>

    <!-- Page Content -->
    <div class="container">
<!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                      <div class="box box-default">
                        <div class="box-header with-border">
                          <h3 class="box-title">Data Diklat</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Nama Diklat</th>
                                <th>Waktu Pelaksanaan</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; while ($row= mysqli_fetch_array($diklat)){?>
                              <tr>
                                <td><?php echo ".$no"; ?></td>
                                <td><?php echo $row['nm_diklat']; ?></td>
                                <td><?php echo $row['jam']; ?></td>
                                <td><?php echo list_tanggal($row['mulai']);?></td>
                                <td><?php echo list_tanggal($row['selesai']);?></td>
                              </tr>
                            <?php $no++; } ?>
                            </tbody>
                          </table>
              </div>
            </div>
          </div>
        </div>

                        </div><!-- /.box-body -->
                      </div><!-- /.box -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                    </div>
                    <!-- /.col-lg-6 -->

                </div>
                <!-- /.row -->
</div>


<?php include "footer.php"; }else {
  header("location: ../index.php");
  //jika tidak maka kembali ke halaman login.php

} ?>
