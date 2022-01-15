<?php include 'session.php'; ?>
<?php include 'header.php'; ?>

<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
<?php include 'navbar.php';
?>
  <div class="content-wrapper">
  <div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-user home-icon"></i>
								Profile
							</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Student Profile
							  <a href = "profile_edit.php"id = "admin_profile" style = "float:right;"  class = "btn btn-primary btn-flat"><i class = "fa fa-lock"></i> Change password </a> 
							</h1>
            
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<div>
									<div id="user-profile-1" class="user-profile row">
										<div class="col-xs-12 col-sm-3 center">
											<div>
										
												<span class="profile-picture">
													<img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo (!empty($_SESSION['photo'])) ? '../images/'.$_SESSION['photo'] : '../images/avatar5.png'; ?>" style = "height:190px;" />
												</span>

												<div class="space-4"></div>

												<div class="width-80 label label-primary label-xlg arrowed-in arrowed-in-right">
													<div class="inline position-relative">
														<span class="white"><?php echo $_SESSION['Firstname']. " ".$_SESSION['Lastname']; ?></span>
													</div>
												</div>
											</div>

											<div class="space-6"></div>

											<div class="profile-contact-info">
										
												<div class="space-6"></div>
											</div>
											
										</div>

										<div class="col-xs-12 col-sm-9">

											<div class="space-12"></div>
										
											<div class="profile-user-info profile-user-info-striped">
											
												<div class="profile-info-row">
													<div class="profile-info-name"> Student ID </div>

													<div class="profile-info-value">
														<span class="editable" id="username"><?php echo $_SESSION['Student_ID']; ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Firstname </div>

													<div class="profile-info-value">
														<span class="editable" id="city"><?php echo $_SESSION['Firstname']; ?></span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> Lastname </div>

													<div class="profile-info-value">
														<span class="editable" id="age"><?php echo $_SESSION['Lastname']; ?>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name">Middlename</div>

													<div class="profile-info-value">
														<span class="editable" id="signup"><?php echo $_SESSION['Middlename']; ?></span>
													</div>
												</div>


                        <div class="profile-info-row">
													<div class="profile-info-name">Email </div>

													<div class="profile-info-value">
														<span class="editable" id="login"><?php echo $_SESSION['Email']; ?></span>
													</div>
												</div>

                        <div class="profile-info-row">
													<div class="profile-info-name"> Mobile No. </div>

													<div class="profile-info-value">
														<span class="editable" id="login"><?php echo $_SESSION['mobile']; ?></span>
													</div>
												</div>

											</div>
										</div>
									</div>
								</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->

							<div class="col-md-12">
                        <div class="box">
                        <div class="box-header" style = "margin-top: 25px;">




             <table id="example1" class="table table-bordered table-bordered">
                <thead>  
                        
                        <th>Event Title</th>
                        <th>Event Date</th>
                        <th>Timestamp</th>
                        <th>Status</th>                                                                          
              
                </thead>
                <tbody>
                <?php 
                $stud_id = $_SESSION['Student_ID'];

                $sql = "SELECT event.title AS event_name, event_attendance.stud_id AS Student_ID,
                event.Date AS  event_date, event_attendance.status AS Status,
                 event_attendance.Timestamp AS time_atended 
                 FROM event_attendance LEFT JOIN event ON event.event_id = event_attendance.event_id
                  WHERE event_attendance.stud_id = '$stud_id'";
                $query = $db->query($sql);
                while($row = $query->fetch_assoc()){
                 $date = date('F d Y', strtotime($row['event_date']));
                 $time_arrive = date('g:i A', strtotime($row['time_atended']));
                  
                  echo "
                  <tr>
           
                  <td>".$row['event_name']."</td>
                  <td>".$date."</td>
                  <td>".$time_arrive."</td>
                  <td>".$row['Status']."</td>



                       
                  </tr>
                  
                  ";



                }
                
                ?>



        
                </tbody>      
              </table>
                    </div>
                        </div>

                    </div>
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->



<!-- Content-wrapper -->
</div>
<!-- footer -->
<?php include 'footer.php'; ?>
<!--  wrapper--->
</div>
<script>
var d = new Date();

document.getElementById("dates").innerHTML = " Capstone Project &copy; "+ d.getFullYear();
</script>


<script> 

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
    <script src = "../dist/dist/js/demo.js"></script>
    <!-- Active Script -->

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
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
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>



    </body>
</html>
