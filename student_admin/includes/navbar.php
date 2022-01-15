<header class="main-header">
        <!-- Logo -->
        <a href="student.php" class = "logo">
<!-- mini logo for sidebar mini -->
 <span class = "logo-mini"><b><img style = "width:40px;" src="../images/logo.png" alt=""> </b></span>
<!-- logo for regular state and mobile devices-->
<span class ="logo-lg"><b><img style = "width:40px;" src="../images/logo.png" alt=""> CKC-</b>EMS</span>
 </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class = "navbar navbar-static-top">
 <!-- sidebar toggle button -->
 <a href="#" class = "sidebar-toggle" data-toggle = "push-menu" role = "button">
 <span class = "sr-only"></span>
 </a>

 <div class ="navbar-custom-menu">
 <ul class="nav navbar-nav">
 <!--  user account-->
 <li class = "dropdown user user-menu">
 <a href="" class = "dropdown-toggle" data-toggle = "dropdown">
 <!--image sa super admin -->
 <img src="<?php echo (!empty($_SESSION['photo'])) ? '../images/'.$_SESSION['photo'] : '../images/avatar.png'; ?>" class = "user-image" alt="">
<span class = "hidden-xs"> <?php echo $_SESSION['Firstname']. " ".$_SESSION['Lastname']; ?></span>
 </a>
 <ul class = "dropdown-menu">
<li class = "user-header">
<img src="<?php echo (!empty($_SESSION['photo'])) ? '../images/'.$_SESSION['photo'] : '../images/avatar.png'; ?>" class= "img-circle" alt="">

                    <p>
                     <?php echo $_SESSION['Firstname']. " ".$_SESSION['Lastname']; ?>
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="profile.php"  class="btn btn-primary btn-flat" id="admin_profile">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-danger btn-flat">Logout</a>
                    </div>

                  </li>
                </ul>
              </li>

            </ul>
          </div>
        </nav>

      </header>
