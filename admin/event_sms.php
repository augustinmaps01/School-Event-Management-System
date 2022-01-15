<?php  include 'server/session.php'; ?>
<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> CKC Event Management System|Event</title>
  	<!-- Tell the browser to be responsive to screen width -->

    <link rel="icon" href="../images/logo.png" sizes="16x16" type="image/png">
    <link rel="stylesheet" type="text/css" href="../dist/table/bootstrap/css/bootstrap.min.css">

  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	<!-- Bootstrap 3.3.7 -->
  	<link rel="stylesheet" href="../dist/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
     <link rel="stylesheet" href="../dist/dist/plugins/iCheck/all.css">
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

</head>
<body class = "hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php  include 'includes/navbar.php'; ?>
<?php include 'sidebar/event.php'; ?>
<div class="content-wrapper">
<section class="content-header">
<h1>Events </h1>
                <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="event.php"><i class = "fa fa-calendar"></i>Create Event </a></li>

      
                </ol>

</section>
<section class= "content">
<div class = "row">
<div class = "col-xs-12">
<div class = "box">
<div class = "box-header">
<div class = "col-xs-3">
<form action = "" method = "post">
<select class = "form-control" name = "students" id = "student" required placeholder = "Enter Program">
<option value = ""selected>-----Choose Course------</option>
<option value = "">All</option>
<option value = "BSIT">Bachelor of Science in Information Technology</option>
<option value = "BSBA">Bachelor of Science in Business Administration</option>
<option value = "BSA">Bachelor of Science in Accountancy</option>
<option value = "BSN">Bachelor of Science in Nursing</option>
<option value = "BSHRM">Bachelor of Science in Hotel Restaurant Management</option>
<option value = "BSSW">Bachelor of Science in Social Work</option>
<option value = "BSCRIM">Bachelor of Science in Criminology</option>
<option value = "BSED">Bachelor of Science in Secondary Education</option>
<option value = "BEED">Bachelor of Science in Elementary Education</option>
</select>

</div>
<button type = "submit" name ="student" class = "btn btn-primary btn-flat"><i class = "fa fa-search"></i></button>
</form>
<button type = "button" style = "float:right;" class = "btn btn-success btn-flat" data-toggle = "modal" data-target = "#send_sms"><i class = "fa fa-envelope"> </i></button> 
</div>
<div class = "box-body">
<form action = 'a.php' method = 'post'>
<table  class = "table table-bordered">
<thead>
<th>Check All</th>
<th>Lastname</th>
<th>Firstname</th>
<th>Middlename</th>
<th>Course&Year</th>
<th>Mobile #</th>
</thead>
<tbody>
<?php


if(isset($_POST['student'])){
    
$dept = mysqli_real_escape_string($db, $_POST['students']);
$check = 'checked';
if(empty($dept)){
    $sql = "SELECT * FROM user_info WHERE NOT course = '' AND NOT year_level  = ''";
    $query = $db->query($sql);
    while($row = $query->fetch_assoc()){
        echo "
    <tr>
    <td><input type = 'checkbox' ".$check." name = 'students[]'value = ''></td>
    <td>".$row['lname']."</td>
    <td>".$row['fname']." </td>
    <td>".$row['mname']." </td>
    <td>".$row['course']. '-'.$row['year_level']."</td>
    <td>".$row['mobile']." </td>
    
    </tr>
        </tr>

    ";
    }
}else{
    $sql = "SELECT * FROM `user_info` WHERE NOT course = '' AND NOT year_level = '' AND course = '$dept'";
$query = $db->query($sql);
while($row = $query->fetch_assoc()){
      

    echo "

<tr>
<td><input type = 'checkbox' ".$check." name = 'students[]'value = '".$row['mobile']."'></td>
<td>".$row['lname']."</td>
<td>".$row['fname']." </td>
<td>".$row['mname']." </td>
<td>".$row['course']. '-'.$row['year_level']."</td>
<td>".$row['mobile']." </td>

</tr>

";

}  
}

}
?>

</tbody>

</table>


</div>


</div>
</div>
</div>







<div class="modal modal-success fade" id="send_sms">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Message Body</h4>
              </div>
              <div class="modal-body">
             <form action = "server/event_sms.php" method = "POST"> 
             <div class = "form-group">
             <label>Text Message </label>
             <textarea class = "form-control" name = "msg_body" id = "msg" placeholder = "Enter A message Here " required></textarea>

             </div>
             <div class = "form-group">
             <label>Student</label>
             <select name = "students" class = "form-control"id = "students" required>
             <?php 
             $students = $_POST['students'];
             $sql = "SELECT * FROM user_info WHERE course = '$students'";
             $query = $db->query($sql);
             while($row = $query->fetch_assoc()){
               echo "
                     <option value = '".$row['mobile']."'>".$row['fname'].', '.$row['lname']."</option>
               ";
             }

             ?>

             
             </select>
             </div>
        
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline">Send</button>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->




</section>
</div>
<?php include 'includes/footer.php'; ?>
</div>
<script>
var d = new Date();
document.getElementById("dates").innerHTML = " Capstone Project &copy; "+ d.getFullYear();
</script>
    </div>
    <!-- jQuery 3 -->
    <script src = "../dist/dist/plugins/iCheck/icheck.min.js"></script>
    <script src="../dist/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../dist/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../dist/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="../dist/plugins/iCheck/icheck.min.js"></script>
    <!-- Moment JS -->
    <script src="../dist/bower_components/moment/moment.js"></script>
    <!-- DataTables -->
    <script src="../dist/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../dist/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- ChartJS -->
    <script src="../dist/bower_components/chart.js/Chart.js"></script>
    <!-- ChartJS Horizontal Bar -->
    <script src="../dist/bower_components/chart.js/Chart.HorizontalBar.js"></script>
    <!-- daterangepicker -->
    <script src="../dist/bower_components/moment/min/moment.min.js"></script>
    <script src="../dist/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="../dist/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="../dist/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- Slimscroll -->
    <script src="../dist/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../dist/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/dist/js/adminlte.min.js"></script>
    <script src = "../dist/bower_components/excellentexport/excellentexport.min.js"></script>

    <script>
      $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : true
        })
      })
    </script>

<script>
$(function(){ 
  
  $('.content').iCheck({
    checkboxClass:'icheckbox_flat-blue',
    radioClass: 'iradio_flat-blue'
  });
});
</script>
</body>
</html>
