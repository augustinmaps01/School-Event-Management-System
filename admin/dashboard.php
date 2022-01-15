<?php

include 'server/session.php';
//?-- ---------Author Austin Maps---------------- 

?>
<?php include 'includes/header.php'; ?>

<body class = "hold-transition skin-blue sidebar-mini">

<div class = "wrapper">
<?php include 'includes/navbar.php'; ?>

 <h1 class="bg-primary box-title sty" style = "text-align:center;"><img src = "../images/logo.png"  alt = "" style = "margin-top: 10px; margin-left:190px; Width:80px;">CKC Event Management System <img src = "../images/psits_logo.png"  alt = "" style = "Width:80px;"></h1>

<?php include 'sidebar/dashboard.php'; ?>



<div class = "content-wrapper">


<!-- Content header (Page Header) -->
<section class = "content-header">

<h1 class = "text-dark"> Dashboard</h1>

<ol class = "breadcrumb">
<li><a href="dashboard.php"><i class = "fa fa-dashboard"></i>Home</a></li>
<li class = "active">Dashboard</li>
</ol>
</section>
<!--Main content -->

<section class = "content">

<div class = "row">

<div class = "col-lg-4 col-xs-4">
<div class ="small-box bg-yellow">
<div class = "inner">
<?php 
$result = mysqli_query($db, "SELECT COUNT(Account_ID) as total FROM user_account WHERE usertype = 3") or die(mysqli_error($db));

?>
<h3>
<?php  
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC )){
  echo $row['total'];
}
?>


</h3>
<p>Registered Students</p>


</div>
<div class = "icon">
<i class = "fa fa-users"></i>
</div>
<a href="student.php" class = "small-box-footer">More info <i class = "fa fa-info-circle"></i></a>
</div>
</div>
<!--end of col -->

<div class = "col-xs-4 col-xs-4">
<div class ="small-box bg-blue">
<div class = "inner">
<h3><?php $query = mysqli_query($db, "SELECT COUNT(event_id) AS total_events FROM event") or die(mysqli_error($db));
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
echo $row['total_events'];

?></h3>
<p>Posted Events</p>


</div>
<div class = "icon">
<i class = "fa fa-calendar"></i>
</div>
<a href="event.php" class = "small-box-footer">More info <i class = "fa fa-info-circle"></i></a>
</div>
</div>
<!-- end of col -->



<!-- end of col -->
<div class = "col-lg-4 col-xs-4">
<div class ="small-box bg-green">

<div class = "inner">
<h3> 
<?php
$query = mysqli_query($db, "SELECT COUNT(Account_ID) as users FROM user_account WHERE usertype = 2 ") or die(mysqli_error($db));
 while($result = mysqli_fetch_array($query, MYSQLI_ASSOC)){ 
echo $result['users'];
}
?>
</h3>
<p>User Admin</p>


</div>
<div class = "icon">
<i class = "ion ion-person-add"></i>
</div>
<a href="add_user.php" class = "small-box-footer">More info <i class = "fa fa-info-circle"></i></a>
</div>
</div>
<!-- end of col -->
</div>

<h1 style="text-align: right;">   <?php
 $today =date('y:m:d');
 $new = date(' F d Y',strtotime($today));
echo "$new";

 ?>  </h1>
 <p id="time" style = "margin-top:25px; text-align: right;"></p>
<!-- /. row -->
<!--Main row -->
</section>
<section class="content" style = "margin-top:0%;">
  <div class="row">

    <!-- /.col (LEFT) -->
    <div class="col-md-12" style ="margin-left:0%;">
    <div class="box">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Event Attendance</h3>

            </div>
            <div class="box-body">
              <div id="bar-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body-->
          </div>

    </div>
    <!-- /.col (RIGHT) -->
  </div>
  <!-- /.row -->

</section>

             
</div>



<?php include 'includes/footer.php'; ?>
<!--end of wrapper -->
</div>
<script>
var d = new Date();

document.getElementById("dates").innerHTML = " Capstone Project &copy; "+ d.getFullYear();
</script>


<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src = "../dist/js/date.js"></script>
<script src="../dist/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../dist/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->





<script>
  $(function () {
    /*
     * Flot Interactive Chart
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
    // be fetched from a server
   

    /* END AREA CHART */

    /*
     * BAR CHART
     * ---------
     */
    var res = document.getElementById('bar-chart');
    var bar_data = {
      data : [['Jun', 10], ['Jul', 8], ['Aug', 4], ['Sept', 13], ['Oct', 17], ['Nov', 9], ['Dec', 5], ['Jan', 4], ['Feb', 5], ['Mar', 9]],
      color: '#3c8dbc'
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 5,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
        bars: {
          show    : true,
          barWidth: 0.5,
          align   : 'center'
        }
      },
      xaxis : {
        mode      : 'categories',
        tickLength: 0
      }
    })
    /* END BAR CHART */



  })

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
</script>



<script src="js/underscore-min.js"></script>
	  <script src= "../dist/calendar/js/moment-2.2.1.js"></script>
	  <script src="../dist/calendar/js/clndr.js"></script>
	  <script src="../dist/calendar/js/site.js"></script>
	<!--End Calender-->
  <script>
window.setInterval(ut, 1000);

function ut() {
  var d = new Date();
  document.getElementById("time").innerHTML = d.toLocaleTimeString();
  document.getElementById("date").innerHTML = d.toLocaleDateString();
}

</script>
<script src="../dist/dist/js/jquery.js"></script>



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
<script src = "../js/colorbox.js"> </script>
 
	
<script>
  
	  
  function openColorBox() {
    $.colorbox({
      innerWidth:500, 
      innerHeight:323, 
      iframe:true,
      href: "../admin/loading.php",
      overlayClose:true,
      onLoad: function() {
        $('#cboxClose').remove();
      }
    });
  }
  setTimeout(openColorBox, 2000);
</script>
</script>

</body>
</html>
