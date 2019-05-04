<?php
require_once "../core/init.php";

$detail = show_detail();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admininistrator | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../dist/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../dist/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../dist/css/ionicons.min.css">

    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script language="javascript" type="text/javascript">

function popUp(URL){
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '"+ id + "','toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=300,top=100');");
}

</script>
  </head>
  <body>
  	<section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Biodata Peserta</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
				<table class='table table-bordered table-striped'>
				<?php while ($row= mysqli_fetch_array($detail)){?>
					<thead>
                      <tr>
						<th>No Induk</th>
						<td><?php echo $row['no_induk']; ?></td>
                      </tr>
					  <tr>
						<th>Nama Peserta</th>
						<td><?php echo $row['nm_pes']; ?></td>
                      </tr>
					  <tr>
						<th>NUPTK</th>
						<td><?php echo $row['nuptk']; ?></td>
                      </tr>
					  <tr>
						<th>NIP</th>
						<td><?php echo $row['nip']; ?></td>
                      </tr>
					  <tr>
						<th>Tempat Lahir</th>
						<td><?php echo $row['t_lahir']; ?></td>
                      </tr>
					  <tr>
						<th>Tanggal Lahir</th>
						<td><?php echo list_tanggal($row['tgl_lahir']);?></td>
                      </tr>
					  <tr>
						<th>Jenis Kelamin</th>
						<td><?php echo list_jk($row['jk']); ?></td>
                      </tr>
					  <tr>
						<th>Agama</th>
						<td><?php echo list_agama($row['agama']); ?></td>
                      </tr>
					  <tr>
						<th>Status Kawin</th>
						<td><?php echo list_stat_nikah($row['stat_nikah']); ?></td>
                      </tr>
					  <tr>
						<th>Alamat</th>
						<td><?php echo $row['alt_rmh']; ?></td>
                      </tr>
					  <tr>
						<th>Telepon</th>
						<td><?php echo $row['telp_rmh']; ?></td>
                      </tr>
					  <tr>
						<th>Pendidikan Terakhir</th>
						<td><?php echo list_pend($row['pend']); ?></td>
                      </tr>
					  <tr>
						<th>Jurusan</th>
						<td><?php echo $row['jurusan']; ?></td>
                      </tr>
					  <tr>
						<th>Tahun Lulus</th>
						<td><?php echo $row['th_lulus']; ?></td>
                      </tr>
					  <tr>
						<th>Universitas</th>
						<td><?php echo $row['univ']; ?></td>
                      </tr>
					  <tr>
						<th>Status Kepegawaian</th>
						<td><?php echo $row['stat_kepeg']; ?></td>
                      </tr>
					  <tr>
						<th>Pangkat Golongan</th>
						<td><?php echo $row['pagol']; ?></td>
                      </tr>
					  <tr>
						<th>Jabatan</th>
						<td><?php echo $row['jabatan']; ?></td>
                      </tr>
					  <tr>
						<th>Unit Kerja</th>
						<td><?php echo $row['unit_kepeg']; ?></td>
                      </tr>
					  <tr>
						<th>Alamat Unit Kerja</th>
						<td><?php echo $row['alt_unitker']; ?></td>
                      </tr>
					  <tr>
						<th>Telepon Unit Kerja</th>
						<td><?php echo $row['telp_unitker']; ?></td>
                      </tr>
					  <tr>
						<th>Masa Kerja</th>
						<td><?php echo $row['masa_ker']; ?></td>
                      </tr>
					</thead>
										<tbody>


					  <?php } ?>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

  </body>
  </html>
