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

include "header.php"
?>

    <!-- Page Content -->
    <div class="container">

        <!-- Heading Row -->
        <div class="row">
            <div class="col-md-8">
                <img class="img-responsive img-rounded" src="img/lpmp.png" alt="">
            </div>
            <!-- /.col-md-8 -->
            <div class="col-md-4">
                <h1>Profil Lembaga</h1>
                <p style="text-align: justify;"><strong>Assalamu&#8217;alaikum Wr. Wb.</strong><br /><br />
               &nbsp&nbsp&nbsp&nbsp&nbsp Era globalisasi membuat dunia menyusut, dimana batas, ruang dan waktu bukan lagi hambatan (borderless, spaceless and timeless). Informasi, dan yang lebih luas, komunikasi yang benar, cepat dan up todate lantas menjadi tuntutan masyarakat yang makin dinamis. Dan pemikiran-pemikiran inilah yang menjadi awal spirit kami untuk mengusung website LPMP Jogjakarta.
                </p>
                <a class="btn btn-primary btn-lg" href="http://lpmpjogja.org/profil-lembaga/" target="_blank">Baca Selengkapnya</a>
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Well -->
        <div class="row">
            <div class="col-lg-12">
                <div class="well text-center">
                    <marquee scrollamount="8">Selamat datang di LPMP JOGJA, silahkan nikmati fitur yang sudah kami sediakan.</marquee>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-4">
                <h2 align="center">Pengumuman</h2>
                <p> &nbsp&nbsp&nbsp &nbsp&nbsp&nbspUntuk member yang sudah bergabung silahkan cek data diri kalian apakah sudah tercantum di dalam data kami jika belum terdaftar silahkan daftar di form yang sudah kami sediakan. jika ada permasalahan silahkan kirimkan pesan kepada kami melalui <a href="contact.php">Contact.</a></p><br />Terimakasih

            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">
                <h2 align="center">Lokasi LPMP Jogja</h2>
                <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.353115033212!2d110.46938031443422!3d-7.752320679015731!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5a5519b328af%3A0x7df2266de9de8b18!2sLPMP+D.I.+Yogyakarta!5e0!3m2!1sid!2sid!4v1457935114227" width="300" height="250" frameborder="0" style="border:0" allowfullscreen></iframe></p>
                <a class="btn btn-default" href="https://www.google.co.id/maps/place/LPMP+D.I.+Yogyakarta/@-7.7523207,110.4693803,17z/data=!3m1!4b1!4m7!1m4!3m3!1s0x2e7a5a5519b328af:0x7df2266de9de8b18!2sLPMP+D.I.+Yogyakarta!3b1!3m1!1s0x2e7a5a5519b328af:0x7df2266de9de8b18">View Large Map</a>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">
                <h2 align="center">Find us on Facebook</h2><div class="facebook-box">
<iframe src="http://www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/lpmpjogja&amp;width=300&amp;height=250&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:250px;" allowTransparency="true"></iframe>
</div>
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

        <?php
        include "footer.php";
        }else {
          header("location: ../index.php");
          //jika tidak maka kembali ke halaman login.php

        } ?>
