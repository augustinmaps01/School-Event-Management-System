<?php include 'session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/sidebar/attendance.php'; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                   Events
                   <small>Event Attendance</small>
                </h1>
                <ol class="breadcrumb">
        <li><a href="event_attendance.php"><i class = "fa fa-check"></i>Event Attendance</a></li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">

                <div class="row">
                    



                              <div class="col-xs-12">
                        <div class="box">
                        <div class="box-header">
                      <br>
                        <div class = "col-xs-3">
                        <form action = "../admin/print_attendance.php" method = "post">
                        <select name = "event_name" class = "form-control" id = "event" required>
                        <option value = "">----Choose Event----</option>
                        <?php
                        $sql = "SELECT * FROM event";
                        $query = $db->query($sql);
                        while($row = $query->fetch_assoc()){
                          echo "
                          <option value = '".$row['event_id']."'>".$row['title']."</option>
                          ";
                        }
                        ?>
                        </select>
                       
                      
                        </div>
                        <button type = "submit" name = "event" class = "btn btn-success btn-flat"><i class = "fa fa-print"></i></button>
                        </form>


               <br><br>





            
                                <table id="example1" class="table table-bordered">
                                    <thead>


                                   
                                        <th>Name</th>
                                        <th>Event Title</th>
                                        <th>Event Date&Time</th>    
                                        <th>Venue</th>                  
                                        <th>Status</th>                                    
                                        <th>Time in</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                    <?php include_once 'connect.php';
                                    $sql = mysqli_query($db, "SELECT event_attendance.eatt_id AS id, user_info.fname, user_info.mname, user_info.lname, user_info.course,
                                     user_info.year_level,event.title, event.Date, event.start_time, event.end_time, event.venue, 
                                     event_attendance.status, event_attendance.Timestamp FROM event_attendance LEFT JOIN user_info
                                      ON event_attendance.stud_id = user_info.School_ID LEFT JOIN event ON event.event_id
                                       = event_attendance.event_id") or die(mysqli_error($db));
                                    while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)){

                                      $s = date("g:i A", strtotime($row['start_time']));
                                      $e = date("g:i A", strtotime($row['end_time']));
                                      $d = date("F d Y", strtotime($row['Date']));
                                      $a = date("g:i A", strtotime($row['Timestamp']));                             
                                    ?>
                        <tr>

                          <td><?php
                           if(empty($row['mname'])){
                             echo $row['lname']. ", ".$row['fname'];
                           }else{
                            echo $row['lname']. ", ". $row['fname']. " ".$row['mname']. ".";
                           }
                          ?>
                          </td>
                          <td> <?php echo $row['title']; ?></td>
                          <td><?php echo $d. "/ ".$s. "- ".$e; ?></td>
                          <td> <?php echo $row['venue']; ?>  </td>   
                            <td> <span class = "label label-success"><?php echo $row['status'];?></span></td> 
                            <td><?php echo $a; ?></td>
                            <td>
                    
                            <a href  = "#delete<?php echo $row['id']; ?>" class = "btn btn-danger btn-sm" data-toggle = "modal"><span class = "glyphicon glyphicon-trash"></span> 
                            </td>
                        </tr>
                               <?php
                              include 'modals/attendance_modal.php';
                              } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
    <!-- jQuery 3 -->
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
    <!-- Active Script -->
    <script>
    $(function(){
    	/** add active class and stay opened when selected */
    	var url = window.location;

    	// for sidebar menu entirely but not cover treeview
    	$('ul.sidebar-menu a').filter(function() {
    	    return this.href == url;
    	}).parent().addClass('active');

    	// for treeview
    	$('ul.treeview-menu a').filter(function() {
    	    return this.href == url;
    	}).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

    });
    </script>
    <!-- Data Table Initialize -->
    <script>
      $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : false
        })
      })
    </script>
    <!-- Date and Timepicker -->
    <script>
    $(function(){
      //Date picker
      $('#datepicker_add').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
      })
      $('#datepicker_edit').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
      })
    });
    </script>



<script>
			//modal function
			jQuery(function($) {
				$('.modal.aside').ace_aside();
				$('#aside-inside-modal').addClass('aside').ace_aside({container: '#my-modal > .modal-dialog'});
				$(document).one('ajaxloadstart.page', function(e) {
					$('.modal.aside').remove();
					$(window).off('.aside')
				});
			})

			//alert fucntion
			function onReady(callback) {
            	var intervalID = window.setInterval(checkReady, 1000);

            	function checkReady() {
                	if (document.getElementsByTagName('body')[0] !== undefined) {
                    	window.clearInterval(intervalID);
                    	callback.call(this);
                	}
            	}
        	}

	        function show(id, value) {
	            document.getElementById(id).style.display = value ? 'block' : 'none';
	        }
	        onReady(function() {
	            show('wrapper', true);
	            show('loader', false);
	        });
	        window.setTimeout(function() {
	            $(".alert").fadeTo(500, 0).slideUp(500, function(){
	                $(this).remove(); 
	            });
	        }, 4000);

    
    </script>

</body>

</html>
