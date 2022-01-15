<?php 
//?-- ---------Author Austin Maps---------------- 
include 'server/session.php'; ?>
<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> CKC Event Management System|Event</title>
  	<!-- Tell the browser to be responsive to screen width -->

    <link rel="icon" href="../images/logo.png" sizes="16x16" type="image/png">
    <link rel="stylesheet" type="text/css" href="../dist/table/bootstrap/css/bootstrap.min.css">

  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	<!-- Bootstrap 3.3.7 -->
  	<link rel="stylesheet" href="../dist/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
 
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
      <?php include 'sidebar/event.php'; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <h1>Events </h1>
                <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="event.php"><i class = "fa fa-calendar"></i>Create Event </a></li>

      
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
            <?php
         if(isset($_GET['save']) && $_GET['save'] == 'success'){
          echo '<div class = "alert alert-success" style = "font-size:25px; text-align:center"><strong><i class = "fa fa-check"></i> Successfully!! Added Event</strong></div>';
        }else if(isset($_GET['delete']) && $_GET['delete'] == 'danger'){
          echo '<div class = "alert alert-danger" style = "font-size:20px;text-align:center;"><strong><i class = "fa fa-trash"></i>  Successfully! Deleted</strong>  </div> ';
        }else if(isset($_GET['edit']) && $_GET['edit'] == 'success'){
          echo '<div class = "alert alert-success" style = "font-size:20px;text-align:center;"><strong><i class = "fa fa-check"></i> Successfully! Updated</strong></div>';
        }  else if(isset($_GET['msg']) && $_GET['msg'] == 'exist'){
          echo '<div class = "alert alert-warning" style = "font-size:20px;text-align:center;"><strong><i class = "fa fa-warning"></i> this event is already exist</strong></div>';
        }elseif (isset($_GET['error']) && $_GET['error'] == 'post') {
          echo '<div class = "alert alert-warning" style = "font-size:20px;text-align:center;"><strong><i class = "fa fa-warning"></i> this event is already Posted</strong></div>';
        }else if(isset($_GET['success']) && $_GET['success'] == 'post'){
          echo '<div class = "alert alert-success" style = "font-size:25px; text-align:center"><strong><i class = "fa fa-check"></i> Successfully!! Posted Event</strong></div>';

        }
            ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                        <div class="box-header">

                        <div class = "col-xs-3">
                        <form action = "print_event.php" method = "post">
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


                      <!--  <a href = "event_sms.php" style = "margin-left:1%; float:right;" class = "btn btn-success"><i class = "fa fa-envelope"></i></a> -->
     
             <button style = "float:right;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
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
          
            <?php
                 include('modals/event_modal.php');
          
              $sql = "SELECT members.firstname, members.lastname, members.middlename, 
              event.event_id, event.title, event.description, event.Date, event.start_time,
               event.end_time, event.venue, event.type, reservation.member_id,
                reservation.reservation_id FROM event LEFT JOIN reservation ON 
                reservation.reservation_id = event.reservation_id
                 INNER JOIN members ON reservation.member_id = members.member_id";
              $query = $db->query($sql);
              while($row = $query->fetch_assoc()){
                $date = date("F d Y", strtotime($row['Date']));
                $start = date("g:i A", strtotime($row['start_time']));
                $end = date("g:i A", strtotime($row['end_time']));   
                $dates = $row['Date'];
                echo 
                "
                <tr>
                <td>".$row['lastname']. ', '.$row['firstname']. ' '.$row['middlename']."</td>
                <td>".$row['title']."</td>
                <td>".$date."</td>
                <td>".$start. '-'.$end."</td>
                <td>".$row['venue']."</td>
                <td>".$row['type']."</td>
               <td>
               <button class = 'btn btn-success btn-sm edit'data-id= '".$row['event_id']."'><i class = 'fa fa-edit'></i></button>
              <button class = 'btn btn-danger btn-sm delete' data-id = '".$row['event_id']."'><i class = 'fa fa-trash'></i></button>

               <a href ='#post".$row['event_id']."' class = 'btn bg-purple btn-sm' data-toggle = 'modal'><span class = 'glyphicon glyphicon-forward'></span></a>

               </td>
               
           
               </tr>   
                "; 
              include 'modals/post_modal.php';
              
            
              }
               
            
         
             
               ?>  
          </tbody>
        </table>    
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
    <script src = "../dist/bower_components/excellentexport/excellentexport.min.js"></script>
 
   
    <script>
    $(function(){
      $(document).on('click', '.edit', function(e){
        e.preventDefault();
        $('#edit').modal('show');
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
    url: 'server/event_row.php',
    data:{id:id},
    dataType:'json',
    success:function(response){
      $('.id').val(response.event_id);
      $('#edit_desc').val(response.description);
      $('#edit_title').val(response.title);
      $('#edit_date').val(response.Date);
      $('#edit_start').val(response.start_time);
      $('#edit_end').val(response.end_time);
      $('#edit_venue').val(response.venue).html(response.venue);
      $('#edit_type').val(response.type).html(response.type);
      $('#edit_proposed').val(response.reservation_id).html(response.lastname+', '+ ''+response.firstname);
      $('#id').val(response.event_id);
    }
  })
}
    </script>

<script>
/*
$(document).ready(function(){
  $('#submit').click(function(){
    var acc_id = $("#acc_id").val();
    var event = $("#event_id").val();

    $.ajax({
      url: "server/post.php",
      type: "POST",
      async:false,
      data:{
        "post"1,
        "sid": acc_id,
        "event_id": event

      }, 
      success:function(data){
        $("#acc_id").val();
        $("#event_id").val();

      }

    })
  });
});
*/
</script>


    
    <script>

$(document).ready(function(){
  //inialize datatable
    $('#myTable').DataTable();

    //hide alert
    $(document).on('click', '.close', function(){
      $('.alert').hide();
    })
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
          'autoWidth'   : true
        })
      })
    </script>
    <script>
    $(document).ready(function(){

      $('#example1').DataTables({
        dom:'Bfrtip',
        buttons:[
          {
            extend:'csv',
            text:'Export',
            exportOptions:{
              columns:':visible' //?export csv 
            }
          }
        ], 
        select:true
      });
    });
    </script>
<!-- Data Table Initialize -->  
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


    	<script type="text/javascript">
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
<!-- generate datatable on our table -->
</body>

</html>
