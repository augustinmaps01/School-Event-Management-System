<?php include 'session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class = "hold-transition skin-blue sidebar-mini">
<div class = "wrapper">
<?php include 'includes/navbar.php'; ?>
<?php include 'includes/sidebar/profile.php'; ?>
<!-- left side column nga naay logo ug sidebar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Student Admin Profile

      </h1>
      <ol class="breadcrumb">
        <li><a href="profile.php"><i class = "fa fa-user"></i>Profile</a></li>

      </ol>
    </section>




    <!-- Main content -->
<section class = "content">
<?php 
$id = $_SESSION['Account_ID'];
$result = "SELECT  usertype.Type, user_info.userinfo_id, user_account.usertype,user_account.Account_ID, user_account.Password,
user_info.School_ID, user_info.fname, user_info.mname,
 user_info.lname, user_info.gender,user_info.mobile, user_info.email,
  user_info.image FROM user_info LEFT JOIN user_account ON user_account.Account_ID
   = user_info.School_ID LEFT JOIN usertype ON usertype.user_type_id = user_account.usertype
      WHERE user_account.Account_ID = '$id'  ";
$query = $db->query($result);
$row = $query->fetch_assoc();
?>
<div class = "row-10">
<div class = "col-lg-12">
<div class = "box box-success">
<div class = "box-body box-profile">

<img class = "profile-user-img img-responsive img-circle" src = "<?php echo (!empty($_SESSION['photo'])) ? '../images/'.$_SESSION['photo'] : '../images/avatar.png'; ?>" alt = "Profile Picture">
<h3 class = "profile-username text-center"><?php echo$_SESSION['Firstname']. " ".$_SESSION['Lastname']; ?></h3>
<p class = "text-muted text-center"> <?php echo $row['Type']; ?></p>
<ul class = "list-group list-group-unbordered">
<li class = "list-group-item">
<b>Account ID</b> <a class = "pull-right"><?php echo $_SESSION['Account_ID']; ?> </a>
</li>
<li class = "list-group-item">
<b>Firstname</b><a class = "pull-right"><?php echo $_SESSION['Firstname']; ?></a>
</li>
<li class = "list-group-item">
<b>Lastname</b> <a class = "pull-right"><?php echo $_SESSION['Lastname']; ?></a>
</li>

</ul>
<center>
<?php echo " <a href='#edit".$row['userinfo_id']."' class='btn btn-primary btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Update</a> ";  ?> 
</center>
</div>
</div>



</div>
<div class="modal fade" id="edit<?php  echo $row['userinfo_id']; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class = "fa fa-edit"></i>Update Admin</h4>
              </div>
              <div class="modal-body">
                <form action = "edit_profile.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" method = "POST" enctype ="multipart/form-data" role="form">
              <div class="box-body">
              <input type = "hidden" name = "id" value = "<?php echo $row['userinfo_id']; ?>" class ="id">
                <input type = "hidden" name= "id2" value =  "<?php echo $row['Account_ID']; ?>" class = "id">
                <div class="form-group">

                  <label for="idn">Account ID</label>
                  <input type="text" class="form-control" id="sid" name = "s_id"value = "<?php echo $row['School_ID']; ?>">
                </div>
                <div class="form-group">

                  <label for="pwd">Password</label>
                  <input type="password" class="form-control" id="pwd" name = "pwd" value = "<?php echo $row['Password']; ?>">
                </div>
                <div class = "form-group">
                <label for="fname">Firstname</label>
                <input type="text"class = "form-control" id = "fname" name = "fname" value  = "<?php echo $row['fname']; ?>">
                </div>
                <div class = "form-group">
                <label>Middlename</label>
                <input type = "text" name ="mname" id = "mname" class = "form-control" value = "<?php echo $row['mname']; ?>">
                </div>
                <div class = "form-group">
                <label for="lname">Lastname</label>
                <input type="text" name = "lname" class = "form-control" value = "<?php echo $row['lname']; ?>">
                </div>
                <div class = "form-group">
                <label>Gender</label>
                <select name = "gender" class = "form-control" id = "gender">
                <option value ="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
                <option value = "Male">Male</option>
                <option value = "Female">Female</option>
                </select>
                </div>
                <div class = "form-group">
                <label>Enter Email</label>
                <input type = "email" class = "form-control" name = "email" value ="<?php echo $row['email']; ?>"
                </div>
                <div class = "form-group">
                <label>Enter Mobile #</label>
                <input type = "text" name = "mbl" class = "form-control" value = "<?php echo $row['mobile']; ?>" 
                </div>
                <div class="form-group">
                  <label for="photo">Change Photo</label>
                  <input type="file" id="photo" name = "img" placeholder = "Choose Profile Picture">
                </div>
           </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name = "edit"><i class = "fa fa-save"></i> Save</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

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
