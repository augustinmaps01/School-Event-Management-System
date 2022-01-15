<?php 
//?-- ---------Author Austin Maps---------------- 
include 'server/session.php'; ?>
<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> CKC Event Management System|Event Evaluation Qustionaire</title>
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
      <?php include 'sidebar/question.php'; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <h1>Event Evaluation Questions </h1>
                <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="Event_evaluationQuestion.php"><i class = "fa fa-question"></i>Event Evaluation Questionaire </a></li>

      
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
              <h3 id = "success"></h3>
         
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                        <div class="box-header">

             <button type = "button" class  = "btn btn-primary btn-flat" data-toggle = "modal" data-target = "#add"><i class = "fa fa-plus"></i></button>
           

                   </div>
                                                   <div class="box-body">
   
                           <table id="example1" class="table table-bordered">
                                    <thead>
                                        <th>ID</th>
                                        <th>Question Type</th>
                                        <th>Survey Question</th>
                                        <th>Action</th>
                                                            
                                    </thead>
   
               <?php
              $sql = "SELECT question_type.type, evaluation_questionaire.id,
               evaluation_questionaire.question FROM evaluation_questionaire 
               LEFT JOIN question_type ON question_type.qus_type_ID = 
               evaluation_questionaire.question_type_ID ORDER BY question_type.type ASC";
              $query = $db->query($sql);
              while($row = $query->fetch_assoc()){
                echo "
                   <tr>
                   <td>".$row['id']."</td>
                   <td>".$row['type']."</td>
                   <td>".$row['question']."</td>
                   <td>
                   <button class='btn btn-success btn-sm edit btn-flat' data-id = '".$row['id']."'><i class='fa fa-edit'></i> </button>
                   <a href = 'server/deleteQuestion.php?delete=".$row['id']."' name = 'delete' class = 'btn btn-danger btn-sm' data-toggle = 'modal'><span class = 'glyphicon glyphicon-trash'></span></a>  
                   
                   </td>
                 
                   </tr>
                ";              }
               include 'modals/question_modal.php';               
               ?>
          </tbody>
    
        </table>                   
                        </div>
                    </div>
                </div>
            </section>
    <?php  
    $sql = "SELECT * FROM evaluation_questionaire";
    $res = $db->query($sql);
    $rows = $res->fetch_assoc(); 
    ?>
<div class="modal modal-primary fade" id="edit">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><i class = "fa fa-edit"></i> Update Survey Questions</h4>
</div>
<div class="modal-body" ng-app = "myapp" ng-controller="usercontroller">
<form action = "server/editQuestion.php" method = "POST" role = "form" enctype = "multipart/form-data" >
<input type = "hidden" name = "id" ng-model = "id" id = "id">
<div class = "form-group">
<labe>Evaluation  Type</labe>
<select name = "eval_type"  class = "form-control">
<option value = ""selected id = "eval_type"></option>
<?php 

$sql = "SELECT * FROM evaluation_type";
$query = $db->query($sql);
while($row = $query->fetch_assoc()){
  echo "
      <option  value = '".$row['id']."'>".$row['type']."</option>
  ";
}
?>
</select>
</div>

<div class = "form-group">


          <label>Question Type</label>
          <select name = "qtype" ng-model = "qtype" class = "form-control" id = "qtype">
        
          <?php
          $query = "SELECT * FROM question_type";
          $result = $db->query($query);
          while($qrow = $result->fetch_assoc()){
            echo "
             <option id = 'queselect' vaLue = '".$qrow['qus_type_ID']."'>".$qrow['type']."</option>
            
            ";
          }
          ?>
          </select>
          <br>
          <label>Your Question Survery</label>
          <input type = "text" name = "question" id = "question" ng-model = "question" class = "form-control" required>
      </div>
</div>
<div class="modal-footer">
<button type="button"  class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
<button type="submit" class="btn btn-primary btn-flat" name="edit"><i class="fa fa-check-square-o"  ng-click = "update()"></i> Update</button>
</form>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
        </div>     
<?php include 'includes/footer.php'; ?>
<script>
var d = new Date();
document.getElementById("dates").innerHTML = " Capstone Project &copy; "+ d.getFullYear();
</script>
    </div>

    <!--Angular js -->
    <script src = "../dist/js//angualar.js"></script>
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


 <script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

});

 function getRow(id){
   $.ajax({
     type:'POST',
     url:'server/ajax.php',
     data:{id:id},
     dataType:'json',
     success:function(response){
       $('.id').val(response.id);
       $('#queselect').val(response.question_type_ID);
       $('#eval_type').val(response.eval_type_id).html(response.types);
       $('#question').val(response.question);
       $('#id').val(response.id);

     }
   });
 }
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
