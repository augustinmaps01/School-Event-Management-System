<?php //? ----- Author: Austin Maps ------ ?>
<?php include 'server/session.php'; ?>

<?php include 'includes/header.php'; ?>
<body class = "hold-transition skin-blue sidebar-mini">
<div class = "wrapper">
  <?php include 'includes/navbar.php'; ?>
  <?php include 'sidebar/profile.php'; ?>
<!-- left side column nga naay logo ug sidebar -->
<!-- end of sidebar -->


<!--Content Wrapper contains page content -->

<!--Main content -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin Profile

      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="profile.php"><i class = "fa fa-user"></i>Profile</a></li>

      </ol>
    </section>

    <!-- Main content -->
<section class = "content">
<?php 
$result = "SELECT  usertype.Type, user_info.userinfo_id, user_account.usertype,user_account.Account_ID, user_account.Password,
user_info.School_ID, user_info.fname, user_info.mname,
 user_info.lname, user_info.gender,user_info.mobile, user_info.email,
  user_info.image FROM user_info LEFT JOIN user_account ON user_account.Account_ID
   = user_info.School_ID LEFT JOIN usertype ON usertype.user_type_id = user_account.usertype
     WHERE user_account.usertype = 1 ";
$query = $db->query($result);
while($row = $query->fetch_assoc()){
?>

<div class = "row-10">
<div class = "col-lg-12">
<div class = "box box-success">
<div class = "box-body box-profile">

<img class = "profile-user-img img-responsive img-circle" src = "<?php echo (!empty($_SESSION['photo']))  ?' ../images/'.$_SESSION['photo'] : ' ../images/avatar04.png'; ?>" alt = "Profile Picture">
<h3 class = "profile-username text-center"><?php echo $full; ?></h3>
<p class = "text-muted text-center"><?php echo $row['Type']; ?></p>
<ul class = "list-group list-group-unbordered">
<li class = "list-group-item">
<b>Account ID</b> <a class = "pull-right"><?php echo $_SESSION['Account_ID']; ?></a>
</li>
<li class = "list-group-item">
<b>Firstname</b><a class = "pull-right"><?php echo $_SESSION['fname']; ?></a>
</li>
<li class = "list-group-item">
<b>Lastname</b> <a class = "pull-right"><?php echo $_SESSION['lname'];  ?></a>
</li>
<li class = "list-group-item">
<b>Gender</b> <a class = "pull-right"><?php echo $_SESSION['gender'];  ?></a>
</li>

</ul>
<center>
<?php 

echo " <a href='#edit".$row['userinfo_id']."' class='btn btn-primary btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Update</a>      ";


?>

</center>
</div>
</div>
<?php include 'modals/profile_modals.php'; ?>

</div>
<?php } ?>
          <!-- /.modal-dialog -->

</div>
</section>

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
