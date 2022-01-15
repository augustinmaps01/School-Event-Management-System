<?php //? ----- Author: Austin Maps ------ ?>
<aside class = "main-sidebar">
<section class ="sidebar">
<!-- sidebar user panel -->
<div class = "user-panel">
<div class = "pull-left image">
<!-- user image ni siya -->
 <img src="<?php echo (!empty($_SESSION['photo']))  ?' ../images/'.$_SESSION['photo'] : ' ../images/avatar04.png'; ?>" class = "img-circle" alt="">
</div>
<div class = "pull-left info">
<p><a style = "color:white;" href = "profile.php"> <?php echo $full; ?> </a></p>

<!-- online icon ni siya -->
<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
</div>
</div>
<!-- sidebar menu ni siya -->
<ul class = "sidebar-menu" data-widget = "tree">
<!-- butang kog danhi -->
<li class = "header">Home</li>
 <li class=""><a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
<li class = "header">MANAGE</li>
<li class=""><a href="student.php"><i class="fa fa-users"></i> <span>Student</span></a></li>
<!--student manage -->
<!-- manage events -->
<li class = "treeview">
<a href="#">
<i class = "fa fa-calendar"></i>
<span>Events</span>
<span class  = "pull-right-container">
<i class = "fa fa-angle-left pull-right"></i>
</span>
</a>
<ul class = "treeview-menu">
<li><a href="event.php"><i class = "fa fa fa-calendar"></i>Create Event</a></li>
<li><a href="event_attendance.php"> <i class = "fa fa-check-circle"></i>Event Attendance</a></li>
<li><a href = "event_absent.php"<i class = "fa  fa-times"></i> Event Absent</a></li>
<li><a href = "Event_evaluationQuestion.php"><i class = "fa fa-question"></i> Event Evaluation Questionaire</a></li>
<li><a href ="evaluation_log.php"<i class = "fa fa-check" ></i> Event Evaluation log </a></li>

</ul>
</li>
<li class = "header">Other</li>


<li>
          <a href="add_user.php">
            <i class="fa fa-user-plus"></i> <span>Student Admin</span>

          </a>
        </li>
        <li>
        <a href = "user_account.php">
        <i class = "fa fa-user"></i><span>User Accounts</span>
        </a>
        </li>
<!-- backup database-->
<li>
          <a href="backup.php">
            <i class="fa fa-database"></i> <span>Backup Database</span>

          </a>
        </li>
</ul>

</section>
<!-- end of sidebar -->
</aside>
