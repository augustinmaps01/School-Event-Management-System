<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> CKC Event Management System|Event</title>

<link rel="icon" href="../images/logo.png" sizes="16x16" type="image/png">
    <link rel="stylesheet" type="text/css" href="../dist/table/bootstrap/css/bootstrap.min.css">

  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	<!-- Bootstrap 3.3.7 -->
  	<link rel="stylesheet" href="../dist/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
 
  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="../dist/bower_components/font-awesome/css/font-awesome.min.css">
  	<!-- Theme style -->
  	<link rel="stylesheet" href="../dist/dist/css/AdminLTE.min.css">
  	<!-- DataTables -->
    <link rel="stylesheet" href="../dist/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../dist/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../dist/plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../dist/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/dist/css/skins/_all-skins.min.css">
  	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  	<!--[if lt IE 9]>
  	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  	<![endif]-->

  	<!-- Google Font -->
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">



<style>


body{
  margin: 0;
  padding: 0;
  background: #34495e;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: "montserrat",sans-serif;
}

.loading{
  width: 200px;
  height: 200px;
  box-sizing: border-box;
  border-radius: 50%;
  border-top: 10px solid #e74c3c;
  position: relative;
  animation: a1 2s linear infinite;
}

.loading::before,.loading::after{
  content: '';
  width: 200px;
  height: 200px;
  position: absolute;
  left: 0;
  top: -10px;
  box-sizing: border-box;
  border-radius: 50%;
}

.loading::before{
  border-top: 10px solid #e67e22;
  transform: rotate(120deg);
}

.loading::after{
  border-top: 10px solid #3498db;
  transform: rotate(240deg);
}

.loading span{
  position: absolute;
  width: 200px;
  height: 200px;
  color: #fff;
  text-align: center;
  line-height: 200px;
  animation: a2 2s linear infinite;
}

@keyframes a1 {
  to{
    transform: rotate(360deg);
  }
}

@keyframes a2 {
  to{
    transform: rotate(-360deg);
  }
}


</style>

  

<body>

<div class="loading">
      <span>Loading...</span>
    </div>



    <script>setTimeout(function(){ window.parent.jQuery.colorbox.close(); }, 6000);</script>

<script src="../dist/dist/js/jquery.js"></script>


<script src = "../js/colorbox.js"></script>
<script src="../dist/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->

<!-- ChartJS -->
<script src="../dist/bower_components/chart.js/Chart.js"></script>
<!-- FastClick -->
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

<!-- FLOT CHARTS -->
<script src="../dist/bower_components/Flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="../dist/bower_components/Flot/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="../dist/bower_components/Flot/jquery.flot.pie.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="../dist/bower_components/Flot/jquery.flot.categories.js"></script>
<!-- Page script -->
</body>
</html>