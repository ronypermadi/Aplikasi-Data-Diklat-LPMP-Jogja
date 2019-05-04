<!-- ./wrapper -->
      <footer class="main-footer">
        <p align="center"><strong>Copyright &copy; 2016 <a href="http://www.facebook.com/rony.permadi" target="_blank">Rony Permadi</a>.</strong> All rights reserved.</p>
      </footer>

<!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="dist/bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="dist/js/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="dist/js/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>

    <!-- JS Data Diklat -->
<script>
    $("#kode_diklat").change(function(){

        // variabel dari nilai combo box provinsi
        var kode_diklat = $("#kode_diklat").val();


        // mengirim dan mengambil data
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "autoform/loadmulai.php",
            data: "diklat="+kode_diklat,
            success: function(msg){

                // jika tidak ada data
                if(msg == ''){
                    alert('Tidak ada data ');
                }

                // jika dapat mengambil data,, tampilkan di combo box kota
                else{
                    $("#mulai").html(msg);
                }

            }
        });

        // mengirim dan mengambil data
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "autoform/loadselesai.php",
            data: "diklat="+kode_diklat,
            success: function(msg){

                // jika tidak ada data
                if(msg == ''){
                    alert('Tidak ada data ');
                }

                // jika dapat mengambil data,, tampilkan di combo box kota
                else{
                    $("#selesai").html(msg);
                }

            }
        });
    });
</script>
<!-- /JS Data Diklat -->
  </body>
</html>
