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
<?php
if (isset($_POST['submit'])) {

    $nama = $_POST['name'];
    $subject = $_POST['subject'];
    $pesan = $_POST['pesan'];

    $email = 'ronypermadi1@gmail.com';

    $pesanAsli = $nama . "\n\r"
                .$pesan;
    mail($email, $subject, $pesanAsli );
}

?>

   <div class="container">
                <div class="panel panel-default" style="margin:0 auto;width:800px">
                    <div class="panel-heading">
                        <h1 class="panel-title" align="center"><strong>Contact Form</strong></h1>
                    </div>
                    <div class="panel-body">
                        <form name="contactform" method="post" action="contact.php" class="form-horizontal" role="form">
                            <div class="form-group">
                                <label for="inputName" class="col-lg-2 control-label">Name</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="inputName" name="name" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSubject" class="col-lg-2 control-label">Subject</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="inputSubject" name="subject" placeholder="Subject Message">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 control-label">Message</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" rows="10" cols="10" id="inputMessage" name="pesan" placeholder="Your message..."></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" name="submit" class="btn btn-default">
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

<?php include "footer.php"; }else {
  header("location: ../index.php");
  //jika tidak maka kembali ke halaman login.php

} ?>
