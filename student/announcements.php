<?php
include 'session.php';
?>
<?php include 'header.php'; ?>

<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
  <!-- navbar-->
<?php include 'navbar.php'; ?>
<div class="content-wrapper">
  <div class="container">
  <div class = "row-12">
  <section class = "content">
  <div class="col-sm-6 col-md-12">
        <div class="nav-tabs-custom"  style = "margin-top:4%;">
          <ul class="nav nav-tabs">
            <li style = "margin-top:5%;"><a   href="#" data-toggle="tab">Upcoming Events</a></li>
          </ul>
          <div style = "  margin-left:15%;padding-left:15%;padding-right:15%;">
            <div class="active tab-pane" id="activity">
              <!-- Post -->
              <?php
              
               $sql = mysqli_query($db, "SELECT post_event.message, event.title, event.description, 
               event.Date, event.start_time, event.end_time, event.venue, user_info.fname,
                user_info.lname, user_info.image, post_event.timestamp FROM post_event LEFT JOIN event ON event.event_id 
                = post_event.event_ID LEFT JOIN user_info ON user_info.School_ID 
                = post_event.Account_ID WHERE event.Date >= post_event.timestamp ORDER BY post_event.timestamp DESC") or die(mysqli_error($db));
               while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)){

                $d = date("F d Y", strtotime($row['Date']));
                $s = date("g:i A", strtotime($row['start_time']));
               $e = date("g:i A", strtotime($row['end_time']));
               $t = date("g:i A", strtotime($row['timestamp']));
               $post = date("F d Y", strtotime($row['timestamp']));     
                   
              ?>
              <div class="post">
                <div class="user-block">
                  <img class="img-circle img-bordered-sm" src="<?php
                      echo (!empty($row['image']))  ?' ../images/'.$row['image'] : ' ../images/avatar04.png';  ?>" alt="user image">
                      <span class="username">
                    <?php echo $row['fname']. " ".$row['lname']; ?>
                 </span>
                  <span class="description">Posted <?php echo $post; ?>  - <?php echo $t; ?></span>
                </div>
                <!-- /.user-block -->
                <p style = "font-size:16px;font-weight:bold;"> <?php echo $row['message']; ?> </p>
                <p style = "font-size:15px;"> About Event: <?php echo $row['description']; ?> </p>
                <p style = "font-size:15px;"> Activity: <?php echo $row['title']; ?> </p>    
                <p style = "font-size:15px;" > WHEN: <?php echo $d. " From: ".$s. " to ".$e; ?> </p>
                <p style = "font-size:15px;"> WHERE: <?php echo $row['venue']; ?> </p>    
               <br><br>
               <?php } ?>         
               </div>             
                     <!-- end active tab-pane-->               
                    </div>
                    <!-- end tab-content -->       
                    </div>                
                    <!-- end nav-tabs-custom -->
                    </div>              
                  <!-- end  col-sm-8 col-md-12 -->
                  </div>
                  <!--end section Content-->
                    </section>
<section class = "content">
<div class = "col-sm-6 col-md-12">
<div class = "nav-tabs-custom">
<ul class = "nav nav-tabs">
<li><a href = "#" data-toggle = "tab">Past Events</a> </li>

</ul>
<div style = "margin-left:15%; padding-left:15%;padding-right:15%;">
<div class = "active tab-pane" id = "activity"></div>
<?php
$sql_query = mysqli_query($db, "SELECT post_event.message, event.title, event.description, event.Date, event.start_time,
       event.end_time, event.venue, user_info.fname, user_info.lname, user_info.image, post_event.timestamp
          FROM post_event LEFT JOIN event ON event.event_id = post_event.event_ID LEFT JOIN user_info ON user_info.School_ID = post_event.Account_ID
            WHERE event.Date <= post_event.timestamp ORDER BY post_event.timestamp DESC") or die(mysqli_error($db));
            while($row2 = mysqli_fetch_array($sql_query, MYSQLI_ASSOC)){
              $dt = date("F D Y", strtotime($row2['Date']));
              $st = date("g:i A", strtotime($row2['start_time']));
              $et  = date("g:i A", strtotime($row2['end_time']));
              $t2 = date("g:i A", strtotime($row['timestamp']));
              $post2 = date("F d Y", strtotime($row['timestamp']));    


?>
<div class ="post">
<div class = "user-block">
<img  class = "circle img-bordered-sm" src = "<?php echo (!empty($row2['image'])) ?'../images/'.$row2['image']: '../images/avatar04.png' ?>" alt = "user image">
<span class = "username">
<?php echo $row2['fname']. " ".$row2['lname']; ?>
</span>
<span class = "description">Posted <?php echo $post2 ?> - <?php echo $t2; ?> </span>

</div>
<p style = "font-size:18px;font-weight:bold"><?php echo $row2['message']; ?></p>
<p style = "font-sizeL15px;">About Event: <?php echo $row2['description']; ?></p>
<p style = "font-size:15px;">Activity: <?php echo $row2['title']; ?></p>
<p style = "font-size:15px;">WHEN: <?php echo  $dt. "From: ".$st. "to: ".$et; ?></p>
<br> <br>


<?php      } ?>
</div>



</div>
</div>
</div>
</section>





                 <!-- end row-12-->
                    </div>
                 <!-- end row-12-->
                    </div>
  <!-- /.content-wrapper -->
</div>
<!-- footer-->

<?php include 'footer.php'; ?>


<!--end wrapper -->
</div>

<script>
var d = new Date();

document.getElementById("dates").innerHTML = " Capstone Project &copy; "+ d.getFullYear();
</script>




<script src="../dist/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../dist/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../dist/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../dist/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/dist/js/demo.js"></script>
    </body>
</html>
