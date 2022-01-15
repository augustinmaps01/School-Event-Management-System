<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
             <img src="<?php echo (!empty($_SESSION['photo'])) ? '../images/'.$_SESSION['photo'] : '../images/avatar.png'; ?>" class = "img-circle" alt="">
            </div>
            <div class="pull-left info">
            <p> <a style = "color:white;" href = "profile.php"> <?php echo $_SESSION['Firstname']. " ".$_SESSION['Lastname']; ?> </a> </p>
              <a><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MANAGE</li>
            <li class = "active treeview">
<!--student manage -->
<li class=""><a href="student.php"><i class="fa fa-users"></i> <span>Student</span></a></li>






<li class = "treeview">
<a href="#">
<i class = "fa fa-calendar"></i>
<span>Events</span>
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

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>