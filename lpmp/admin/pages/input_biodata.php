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
$no_induk=$_POST['no_induk'];
$nm_pes=$_POST['nm_pes'];
$nuptk=$_POST['nuptk'];
$nip =$_POST['nip'];
$t_lahir =$_POST['t_lahir'];
$tgl_lahir=$_POST['tgl_lahir'];
$jk=$_POST['jk'];
$agama=$_POST['agama'];
$stat_nikah=$_POST['stat_nikah'];
$alt_rmh =$_POST['alt_rmh'];
$telp_rmh=$_POST['telp_rmh'];
$pend=$_POST['pend'];
$jurusan=$_POST['jurusan'];
$th_lulus=$_POST['th_lulus'];
$univ=$_POST['univ'];
$stat_kepeg=$_POST['stat_kepeg'];
$pagol=$_POST['pagol'];
$jabatan=$_POST['jabatan'];
$unit_kepeg=$_POST['unit_kepeg'];
$alt_unitker=$_POST['alt_unitker'];
$telp_unitker=$_POST['telp_unitker'];
$masa_ker=$_POST['masa_ker'];

    if (!empty(trim($no_induk)) && !empty(trim($nm_pes))) {
    if (add_biodata($no_induk, $nm_pes, $nuptk, $nip, $t_lahir, $tgl_lahir, $jk, $agama, $stat_nikah, $alt_rmh, $telp_rmh, $pend, $jurusan, $th_lulus, $univ, $stat_kepeg, $pagol, $jabatan, $unit_kepeg, $alt_unitker, $telp_unitker, $masa_ker)) {
      header('location: lihat_biodata.php');
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
            <small>Biodata Peserta</small>
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
                                <div class="col-lg-6">
                <form action="" method=POST enctype="multipart/form-data" role="form">
                    <div class="form-group">
                                            <label>No Induk :</label>
                                            <input class="form-control" name="no_induk" placeholder="No Induk" /required>
                                        </div>
                    <div class="form-group">
                                            <label>Nama :</label>
                                            <input class="form-control" name="nm_pes" placeholder="Nama" /required>
                                        </div>
                    <div class="form-group">
                                            <label>NUPTK :</label>
                                            <input class="form-control" name="nuptk" placeholder="NUPTK" /required>
                                        </div>
                    <div class="form-group">
                                            <label>NIP :</label>
                                            <input class="form-control" name="nip" placeholder="NIP" /required>
                                        </div>
                    <div class="form-group">
                                            <label>Tempat Lahir :</label>
                                            <input class="form-control" name="t_lahir" placeholder="Tempat Lahir" /required>
                                        </div>
                    <div class="form-group">
                                            <label>Tanggal Lahir :</label>
                                            <input type="date" class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir" /required>
                                        </div>
                    <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control" name=jk required>
                        <option required>-</option>
                                                <option value="1" name="jk" required>Laki-Laki</option>
                                                <option value="2" name="jk" required>Perempuan</option>

                                            </select>
                                        </div>
                    <div class="form-group">
                                            <label>Agama</label>
                                            <select class="form-control" name=agama /required>
                        <option>-</option>
                                                <option value="1" name="agama">Islam</option>
                                                <option value="2" name="agama">Katholik</option>
                                                <option value="3" name="agama">Kristen</option>
                                                <option value="4" name="agama">Budha</option>
                                                <option value="5" name="agama">Hindu</option>
                        <option value="6" name="agama">Kong Hu Cu</option>

                                            </select>
                                        </div>
                    <div class="form-group">
                                            <label>Status Kawin</label>
                                            <select class="form-control" name=stat_nikah /required>
                        <option>-</option>
                                                <option value="1" name="stat_nikah">Menikah</option>
                                                <option value="2" name="stat_nikah">Belum Menikah</option>
                                                <option value="3" name="stat_nikah">Duda</option>
                                                <option value="4" name="stat_nikah">Janda</option>

                                            </select>
                                        </div>
                    <div class="form-group">
                                            <label>Alamat :</label>
                                            <input class="form-control" name="alt_rmh" placeholder="Alamat" /required>
                                        </div>
                    <div class="form-group">
                                            <label>Telepon :</label>
                                            <input class="form-control" name="telp_rmh" placeholder="Telepon" /required>
                                        </div>
              </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                                            <label>Pendidikan Terakhir</label>
                                            <select class="form-control" name=pend /required>
                        <option>-</option>
                                                <option value="1" name="pend">SD/MI</option>
                                                <option value="2" name="pend">SMP/MTS</option>
                                                <option value="3" name="pend">SMK/SMA</option>
                                                <option value="4" name="pend">D1</option>
                                                <option value="5" name="pend">D2</option>
                        <option value="6" name="pend">D3</option>
                        <option value="7" name="pend">S1</option>
                        <option value="8" name="pend">S2</option>
                        <option value="9" name="pend">S3</option>
                                            </select>
                                        </div>
                    <div class="form-group">
                                            <label>Jurusan :</label>
                                            <input class="form-control" name="jurusan" placeholder="Jurusan" /required>
                                        </div>
                    <div class="form-group">
                                            <label>Tahun Lulus</label>
                                            <select class="form-control" name=th_lulus /required>
                                                <option><b>-</b></option>
<option value="2016" >2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option>
                                            </select>
                                        </div>
                    <div class="form-group">
                                            <label>Universitas :</label>
                                            <input class="form-control" name="univ" placeholder="Universitas" /required>
                                        </div>
                    <div class="form-group">
                                            <label>Status Kepegawaian :</label>
                                            <input class="form-control" name="stat_kepeg" placeholder="Status Kepegawaian" /required>
                                        </div>
                    <div class="form-group">
                                            <label>Pangkat/Golongan :</label>
                                            <input class="form-control" name="pagol" placeholder="Pangkat/Golongan" /required>
                                        </div>
                    <div class="form-group">
                                            <label>Jabatan :</label>
                                            <input class="form-control" name="jabatan" placeholder="Jabatan" /required>
                                        </div>
                    <div class="form-group">
                                            <label>Unit Kerja :</label>
                                            <input class="form-control" name="unit_kepeg" placeholder="Unit Kerja" /required>
                                        </div>
                    <div class="form-group">
                                            <label>Alamat Unit Kerja :</label>
                                            <input class="form-control" name="alt_unitker" placeholder="Alamat Unit Kerja" /required>
                                        </div>
                    <div class="form-group">
                                            <label>Telepon Unit Kerja :</label>
                                            <input class="form-control" name="telp_unitker" placeholder="Telepon Unit Kerja" /required>
                                        </div>
                    <div class="form-group input-group">
                                           <label>Masa Kerja Seluruhnya :</label>
                                            <input type="text" class="form-control" name="masa_ker" placeholder="Masa Kerja" /required>
                                            <span class="input-group-addon">Tahun</span>
                                            </div>
                            </div>
                            </div>
                        <button type="submit" name="submit" class="btn btn-default">Save</button>
                                    <button type="reset" class="btn btn-default">Reset </button>
                              </form>
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
