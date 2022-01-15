



  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
      
        </div>

        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
          <li class = "dropdown notifications-menu">
          <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown"> 
               <i class = "fa fa-edit"></i> </a>
               <ul class = "dropdown-menu">
               <li>
               <ul class = "menu">
               <li><a href="evaluation.php">Guidance Office</a></li>
             <li> <a href = "dsa.php">DSA Office </a></li>
               </ul>
               </li>
               </ul>
          </li>

         
            <li><a href="home.php"><i class="fa fa-home"></i></a></li>
 <?php
          $sq = "SELECT event.Date, post_event.timestamp FROM post_event LEFT JOIN event ON event.event_id = post_event.event_ID WHERE event.Date >= post_event.timestamp
          ";
          $qr = $db->query($sq);
    $prows = $qr->fetch_assoc();
        $total = $qr->num_rows;
      if($qr->num_rows > 0){


        echo "<li><a  href = 'announcements.php'><i class = 'fa fa-bullhorn'> </i>  <span class ='badge'>".$total."</span> </a> </li> ";
      }else{
        echo  " <li><a href = 'announcements.php'> <i class = 'fa fa-bullhorn'></i></a></li>";
      }
              
          ?>     
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="<?php echo (!empty($_SESSION['photo']))  ?' ../images/'.$_SESSION['photo'] : ' ../images/avatar5.png'; ?>" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"> <?php echo ucwords(strtolower($_SESSION['Firstname']. " ".$_SESSION['Lastname'])); ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="<?php echo (!empty($_SESSION['photo']))  ?' ../images/'.$_SESSION['photo'] : ' ../images/avatar5.png'; ?>" class="img-circle" alt="User Image">

                  <p>
                  <?php echo ucwords(strtolower($_SESSION['Firstname']. " ".$_SESSION['Lastname'])); ?>
              
                  </p>
                </li>
                <!-- Menu Body -->
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="profile.php" class="btn btn-primary btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="logout.php" class="btn btn-danger btn-flat">Logout</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
   
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
