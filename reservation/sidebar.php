<?php //? ----- Author: Austin Maps ------ ?>
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
       <img src="<?php echo (!empty($_SESSION['photo']))  ?' ../images/'.$_SESSION['photo'] : ' ../images/avatar04.png'; ?>" class = "img-circle" alt="">
      </div>
      <div class="pull-left info">
      <p><a style = "color:white;" href = "profile.php"><?php echo $full; ?></a></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
    <li class = "header">Home</li>
        <li><a href = "home.php"><i class = "fa fa-home"></i>Home</a></li>
    <li class = "treeview">

   
<!--student manage -->

<!-- Manage reserve-->
<a href="#">
<i class = "fa fa-calendar-o" ></i>
<span>Reservation</span>
<span class = "pull-right-container">
<i class = "fa fa-angle-left pull-right"></i>
</span>
</a>
<ul class = "treeview-menu">
<li><a href= "member.php"><i class = "fa fa-user-plus"></i>Member</a></li>
<li> <a href="room.php"><i class = "fa fa-clone"></i>Reserve Room</a></li>

</ul>
</li>






  </section>
  <!-- /.sidebar -->
</aside>
