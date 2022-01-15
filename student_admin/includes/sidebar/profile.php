<aside class = "main-sidebar">
<section class ="sidebar">
<!-- sidebar user panel -->
<div class = "user-panel">
<div class = "pull-left image">
<!-- user image ni siya -->
<img src="<?php echo (!empty($_SESSION['photo'])) ? '../images/'.$_SESSION['photo'] : '../images/avatar.png'; ?>" class = "img-circle" alt="">
</div>
<div class = "pull-left info">
<p> <a style = "color:white;" href = "profile.php"> <?php echo $_SESSION['Firstname']. " ".$_SESSION['Lastname']; ?> </a> </p>
<!-- online icon ni siya -->
<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
</div>
</div>
<!-- sidebar menu ni siya -->
<ul class = "sidebar-menu" data-widget = "tree">
<!-- butang kog danhi -->
<li class = "header">MANAGE</li>
<!--student manage -->
<li><a href="student.php"> <i class = "fa fa-users"></i>Student</a></li>


<!-- manage events -->
<li class = "treeview">
<a href="#">
<i class = "fa fa-calendar"></i>
<span> Event</span>
<span class  = "pull-right-container">
<i class = "fa fa-angle-left pull-right"></i>
</span>
</a>
<ul class = "treeview-menu">
<li><a href="event.php"><i class = "fa fa-clone"></i>Event</a></li>
<li><a href="event_attendance.php"> <i class = "fa fa-check"></i>Event Attendance</a></li>
<li><a href = "event_absent.php"<i class = "fa  fa-times"></i> Event Absent</a></li>
</ul>
</li>


<!-- backup database-->

</ul>

</section>
<!-- end of sidebar -->


<!--Content Wrapper contains page content -->

<!--Main content -->
</aside>
