<?php  include 'server/session.php';?>

<?php //?-- ---------Author Austin Maps---------------- 
 include 'includes/header.php'; ?>
<body class = "hold-transition skin-blue sidebar-mini">
<div class = "wrapper">
<?php include 'includes/Navbar.php'; ?>
<!-- left side column nga naay logo ug sidebar -->
<?php include 'sidebar/backup.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Backup Database

      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="backup.php"><i class = "fa fa-database"></i> Backup Database</a></li>

      </ol>
    </section>

   <center> <a href = "server/backup.php" <button style = "font-size:25px; margin-top:18%;" type="button"class="btn bg-olive btn-flat margin"><i class = "fa fa-database"></i> Export Backup Database</button></a> </center>












    <!-- Main content -->

</div>
<?php include 'includes/footer.php'; ?>


<script>
var d = new Date();

document.getElementById("dates").innerHTML = " Capstone Project &copy; "+ d.getFullYear();
</script>


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src = "../dist/js/date.js"></script>
<script src="../dist/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../dist/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
   $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../dist/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../dist/bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../dist/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../dist/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../dist/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../dist/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../dist/bower_components/moment/min/moment.min.js"></script>
<script src="../dist/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../distbower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../dist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../dist/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../dist/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/dist/js/demo.js"></script>

</body>
</html>
