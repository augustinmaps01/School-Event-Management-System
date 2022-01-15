<?php //? ----- Author: Austin Maps ------ ?>
<?php include 'server/session.php'; ?>
 <!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> CKC Event Management System|Reserve</title>
  	<!-- Tell the browser to be responsive to screen width -->
    <link rel="icon" href="../images/logo.png" sizes="16x16" type="image/png">
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	<!-- Bootstrap 3.3.7 -->
  	<link rel="stylesheet" href="../dist/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../dist/plugins/iCheck/all.css">
  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="../dist/bower_components/font-awesome/css/font-awesome.min.css">
  	<!-- Theme style -->
  	<link rel="stylesheet" href="../dist/dist/css/AdminLTE.min.css">
  	<!-- DataTables -->
    <link rel="stylesheet" href="../dist/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../dist/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../dist/plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../dist/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/dist/css/skins/_all-skins.min.css">
  	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  	<!--[if lt IE 9]>
  	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  	<![endif]-->
  	<!-- Google Font -->
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php include 'includes/navbar.php'; ?>
      <?php include 'sidebar/room.php'; ?>
  <!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                   Reserve Room
                </h1>
                <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="add_user.php"><i class = "fa fa-clone"></i>Reserve Room </a></li>
               </ol>
            </section>
            <!-- Main content -->
            <section class="content">
            <?php 
            if(isset($_GET['save']) && $_GET['save'] == 'success'){
              echo '<div class = "alert alert-success" style = "font-size:25px;text-align:center;"><strong><i class = "fa fa-check"></i> Successfully Reserve Room</strong></div>';

            }else if(isset($_GET['delete']) && $_GET['delete'] == 'danger'){
              echo '<div class = "alert alert-danger" style ="font-size:25px; text-align:center;"><strong><i class = "fa fa-trash"></i> Successfully Deleted!!</strong></div> ';
            }else if(isset($_GET['edit']) && $_GET['edit'] == 'success'){
              echo '<div class = "alert alert-success" style ="font-size:25px; text-align:center;"><strong><i class = "fa fa-check"></i> Successfully Updated!!</strong></div> ';
            }
            ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                        <div class="box-header">
                        <button type="button" style="margin-right: 3px;" name = "submit" class="btn btn-primary" data-toggle="modal" data-target="#addroom">
             <i class = "fa fa-plus"></i>
         
            </div>

                            <div class="box-body">
        <div class="box-body">
<?php
include_once('modals/room_modal.php');



?>
   
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <th>School ID</th>
                                        <th>Name</th>
                                        <th>Room</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                        <th>Timestamp</th>
                                   
                                        <th>Action</th>
                                    </thead>                                   
                                    <tbody>
                                    <?php                          
                                    $sql = "SELECT room.room_ID, members.Contact_no, reservation.reservation_id, room.name , members.ID_Number, members.firstname, members.middlename, 
                                    members.lastname, reservation.start_date, reservation.end_date, reservation.status,
                                     reservation.timestamp FROM reservation LEFT JOIN room ON reservation.room_id = room.room_ID
                                      LEFT JOIN members ON reservation.member_id = members.member_id ORDER BY reservation.start_date ASC";
                                    $query = $db->query($sql);
                                    while($row = $query->fetch_assoc()){

                                      $start = date("F d Y", strtotime($row['start_date']));
                                      $end = date("F d Y", strtotime($row['end_date']));
                                      $timestamp = date("F d Y - g:i A", strtotime($row['timestamp']));

                                      echo "
                                      <tr>
                                      <td>".$row['ID_Number']."</td>
                                      <td>".$row['lastname']. ','. $row['firstname']. ' '.$row['middlename']. '.'."</td>
                                      <td>".$row['name']."</td>
                                      <td>".$start."</td>
                                      <td>".$end."</td>                
                                      ";
                                      if($row['status'] == 'Pending'){
                                        echo "<td><span class = 'label label-warning'>".$row['status']."</span></td>";
                                      }else if($row['status'] == 'Cancelled'){
                                        echo "<td><span class ='label label-danger'>".$row['status']."</span></td>";
                                      }else if($row['status'] == 'Processing'){
                                           echo "<td><span class = 'label label-warning'>".$row['status']."</span></td>";
                                      }
                                      else{
                                        echo "<td><span class = 'label label-success'>".$row['status']."</span></td>";
                                      }
                                      echo "
                                      <td>".$timestamp."</td>
                                 
                                      <td>
                             
                                     <button class = 'btn btn-success btn-sm edit' data-id = '".$row['reservation_id']."'><i class = 'fa fa-edit'></i></button>
                                    <button class = 'btn btn-danger btn-sm delete' data-id = '".$row['reservation_id']."'><i class = 'fa fa-trash'></i></button>
                                 "// <a href = '#sms".$row['reservation_id']."' class = 'btn bg-navy btn-sm' data-toggle = 'modal'><span class = 'glyphicon glyphicon-envelope'></span></a> 
                                   ."
                                      </td>
                                      </tr>";
                                    include 'modals/sms_modal.php';
                                   
                                    }  
                                

                                    ?>
                    
                                    </tbody>
                               
                                </table>







                            </div>
                        </div>
                    </div>
                </div>
               



            </section>
        </div>
<?php
   

include 'includes/footer.php'; ?>
<!-- end of content wrapper-->
    </div>


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
    <script src="../dist/bower_components/fastclick/lib/fastclick.js"></script>
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
    <script src="../dist/dist/js/demo.js"></script>
    <script src = "../dist/input/plugins/iCheck/icheck.min.js"> 
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
      $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : true
        })
      })
    </script>
    <script>
    $(function(){
      $('.content').iCheck({
		checkboxClass: 'icheckbox_flat-green',
		radioClass: 'iradio_flat-green'
	});

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
    $(function(){
      $(document).on('click', '.edit', function(e){
        e.preventDefault();
        $('#edit').modal('show');
        var id = $(this).data('id');
        getRow(id);

      });
      $(document).on('click', '.status', function(e){
        e.preventDefault();
        $('#status').modal('show');
        var id = $(this).data('id');
        getRow(id);
      })
      $(document).on('click', '.delete', function(e){
        e.preventDefault();
        $('#delete').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });



    });
    function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'server/reservation_ajax.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.id').val(response.reservation_id);
      $('#edit_member').val(response.member_id).html(response.lastname+', '+ ''+response.firstname);
      $('#edit_room').val(response.room_id).html(response.name);
     $('#edit_start').val(response.start_date);
     $('#edit_end').val(response.end_date);
      $('#descr').html(response.description);
   
    }
  });
}
    </script>

<script type="text/javascript">
			//modal function
			jQuery(function($) {
				$('.modal.aside').ace_aside();
				$('#aside-inside-modal').addClass('aside').ace_aside({container: '#my-modal > .modal-dialog'});
				$(document).one('ajaxloadstart.page', function(e) {
					$('.modal.aside').remove();
					$(window).off('.aside')
				});
			});


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
