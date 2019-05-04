<!-- ./wrapper -->
      <footer class="main-footer">
        <p align="center"><strong>Copyright &copy; 2016 <a href="http://www.facebook.com/rony.permadi" target="_blank">Rony Permadi</a>.</strong> All rights reserved.</p>
      </footer>

<!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../dist/bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="../dist/js/raphael-min.js"></script>
    <script src="../dist/js/checkboxall.js"></script>
    <script src="../plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="../dist/js/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- Select2 -->
       <script src="../plugins/select2/select2.full.min.js"></script>
       <!-- InputMask -->
       <script src="../plugins/input-mask/jquery.inputmask.js"></script>
       <script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
       <script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
       <!-- date-range-picker -->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
       <script src="../plugins/daterangepicker/daterangepicker.js"></script>
       <!-- bootstrap color picker -->
       <script src="../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
       <!-- bootstrap time picker -->
       <script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
       <!-- SlimScroll 1.3.0 -->
       <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
       <!-- iCheck 1.0.1 -->
       <script src="../plugins/iCheck/icheck.min.js"></script>

       <!-- Page script -->
    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
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

    <script>
      $(function () {
        $("#transaksi").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": true
        });
      });
    </script>

    <!-- JS  Data Diklat -->
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
