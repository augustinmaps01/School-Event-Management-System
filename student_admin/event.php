<?php include 'session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/sidebar/event.php'; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                   Events
                   <small>Add Event</small>
                </h1>
                <ol class="breadcrumb">

        <li><a href="event_attendance.php"><i class = "fa fa-calendar"></i>Create Event </a></li>

                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
          <?php 
          if(isset($_GET['save']) && $_GET['save'] == 'success' ){
            echo '<div class = "alert alert-success" style = "text-align:center; font-size:25px;"><strong>Successfully Added Event</strong></div>';
          }elseif(isset($_GET['delete']) && $_GET['delete'] == 'danger'){
            echo '<div class = "alert alert-danger" style = "font-size:20px;text-align:center"><strong>Successfully Deleted</strong></div>';

          }elseif(isset($_GET['edit']) && $_GET['edit'] == 'success'){
            echo '<div class = "alert alert-success" style = "text-align:center; font-size:20px;"><strong>Successfully Updated</strong></div>';
          } elseif(isset($_GET['msg']) && $_GET['msg'] == 'exist'){
            echo '<div class = "alert alert-warning" style = "text-align:center; font-size:20px;"><strong><i classs = "fa fa-warning"></i> This Event is Already Exist</strong></div>';
          }else if(isset($_GET['error']) && $_GET['error'] == 'post'){
            echo '<div class = "alert alert-warning" style = "text-align:center; font-size:20px;"><strong><i classs = "fa fa-warning"></i> This Event is Already Posted</strong></div>';
          }
          ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                        <div class="box-header">

                        <div class = "col-xs-3">
                        <form action = "../admin/print_event.php" method = "post">
                        <select name = "month" class = "form-control" id = "event" required>
                        <option value = "">----Choose Month----</option>
                        <option value = "01">January</option>
                        <option value = "02">February</option>
                        <option value = "03">March</option>
                        <option value = "04">April</option>
                        <option value = "05">May</option>
                        <option value = "06">June</option>
                        <option value = "07">July</option>
                        <option value = "08">August</option>
                        <option value = "09">September</option>
                        <option value = "10">October</option>
                        <option value = "11">November</option>
                        <option value = "12">December</option>
                
                        </select>
                       
                      
                        </div>
                        <button type = "submit" name = "event" class = "btn btn-success btn-flat"><i class = "fa fa-print"></i></button>
                          </form>
                        <button style ="float:right;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
             <i class = "fa fa-plus"></i>
              </button>
             


            </div>
                            <div class="box-body">              
       
 
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                      <th>Proposed By</th>
                                        <th>Event Title</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Venue</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                 
                                    </thead>
                                    <tbody>
                           <tr>
                           <?php 
                           $i = 1;
                           include_once('connect.php');
                           $sql = "SELECT members.firstname, members.lastname, members.middlename, 
                           event.event_id, event.title, event.description, event.Date, event.start_time,
                            event.end_time, event.venue, event.type, reservation.member_id,
                             reservation.reservation_id FROM event LEFT JOIN reservation ON 
                             reservation.reservation_id = event.reservation_id
                              INNER JOIN members ON reservation.member_id = members.member_id";
                           $query = $db->query($sql);
                           while($row = $query->fetch_assoc()){
                             $d = date("F d Y", strtotime($row['Date']));
                             $s = date("g:i A", strtotime($row['start_time']));
                             $e = date("g:i A", strtotime($row['end_time']));
                             $dates = $row['Date'];
                           ?>
                           <td><?php echo $row['lastname']. ", ".$row['firstname']. " ". $row['middlename']; ?> </td>
                          <td><?php echo $row['title']; ?></td>
                          <td><?php echo $d; ?></td>
                          <td><?php echo $s. "- ".$e ?></td>
                          <td><?php echo $row['venue'];  ?></td>
                          <td><?php  echo $row['type']; ?></td>
                            <td>  
                            <form action = "../attendance/attendance.php" method = "POST">
                            <input type = "text" value = "<?php echo $row['title'];  ?>" name = "event_name" hidden = "">
                            <input type = "text" value = "<?php echo $row['event_id']; ?>"name = "event_id"hidden = "">
                            <button type = "submit" class = "btn btn-info bnt-sm" name = "event"><i class = "fa fa-toggle-right"></i></button>
                            </form></td>
                        </tr>
                                    </tbody>
                                    <?php include 'modals/modal_email.php'; ?>
      
        <?php include 'modals/event_modal.php'; ?>   


                           <?php  } ?>
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
    <script src = "../dist/dist/js/demo.js"></script>
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
