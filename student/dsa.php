<?php include 'session.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Student</title>
        <link rel="icon" href="../images/logo.png" sizes="16x16" type="image/png">
    <link rel="stylesheet" type="text/css" href="../dist/table/bootstrap/css/bootstrap.min.css">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../dist/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/iCheck/all.css">
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

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


    <style type="text/css">
      .icon {
        border-radius: 50%;
      }
            label{
    font-weight:bold;
  }
  .badge{
    background-color:#ff4d4d;
  }




table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid  #1a1a1a;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: white;
}


    </style>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class = "hold-transition skin-blue layout-top-nav">
<div class = "wrapper">
<?php include 'navbar.php'; ?>
<div class = "content-wrapper">
<section class = "content-header">

</section>
<section class = "content">
<div class = "row">
<div class = "row">
<div class = "col-xs-10" style = "margin-left:10%;">
<div class = "box">
<div class = "box-header">

</div>
<div class ="box-body">
<img style = "width:80px; margin-left:46%;" src = "../images/logo.png" AdminLTE = "image">
<h1 class = "text-success" style = "margin-top:0%;font-family:tohoma;text-align:center; font-size:50px;text-shadow: 1px 0px #000000;"  class = "box-title"> 
Student Event Evaluation
</h1>
<h2 class ="text-primary" style =" margin-top:0%;font-family:tohoma;text-align:center;font-size:25px" class = "box-title">Dean of Student of Affairs</h1>
    <h2 class = "text-info" style =" margin-top:0%;font-family:tohoma;text-align:center;font-size:15px" class = "box-title">Gingoog City </h1>

<?php 
$cr = $row['course'];
$yr = $row['year_level']; 
?>

<div class = "box-body">
<div class = "form-group has-info">
<form action = "dsa_evaluation.php" method = "post" role = "form" class="form-horizontal">
<input type = "hidden" name = "stud_id" value = "<?php echo $row['School_ID']; ?>">
<input type = "hidden" name = "eval" value = "1">
              <div class="box-body">
              <div class = "form-group has-info">
              <label class = "col-sm-2 control-label">Activity Title:</label>
              <div class ="col-sm-3">
              <select name = "event" id = "title" class = "form-control" required>
              <option value = "">----Select Event------</option>
              <?php
              $sch_id = $row['School_ID'];
              $sql = " SELECT user_account.Account_ID,event.Date, event.title, event.event_id,
              event.Date, event.start_time FROM event_attendance
               LEFT JOIN event ON event.event_id = event_attendance.event_id 
               LEFT JOIN user_account ON user_account.Account_ID = event_attendance.stud_id WHERE 
                user_account.Account_ID = '$sch_id'";
              $query = $db->query($sql);
              while($row = $query->fetch_assoc()){
                $time = date('g:i A', strtotime($row['time']));
                echo "
                <option value ='".$row['event_id']."'>".$row['title']."</option>
                ";
              }
              ?>
              </select>
              </div>
    
              <div class = "form-group has-info">
              <label class = "col-sm-2 control-label">Course&Year</label>
              <div class = "col-sm-3">
              <input type = "text" class = "form-control" value = "<?php echo $cr."-".$yr; ?>"readonly>
              </div>
        
          
            </div>
              </div>
              <br><br>
            <p style = "text-align:center;" class = "text-title"> 4 - Strongly Agree 3 - Agree 2 - Disagree 1 - Strongly Disagree 0 - No opinion  </p>
              <br>
         <?php 
         if(isset($_SESSION['error'])){

    
         ?>
         <div class = "alert alert-danger alert-dismissible">
         <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times;</button> 
       <ul>
       <?php 
       echo "
        <li>".$_SESSION['error']."</li>
       ";
       ?>
       
       </ul>
         </div>


              <?php
              
           unset($_SESSION['error']);
     
            }
           if(isset($_SESSION['success'])){
             echo "
             <div class = 'alert alert-success alert-dismissible'>
             <button type = 'button' class = 'close' data-dismiss = 'alert' aria-hidden = 'true'>&times;</button>
             <h4><i class = 'fa fa-check'></i>Success</h4>".$_SESSION['success']."
             </div>
             ";
             unset($_SESSION['success']);
           }
            ?>
             <div class="alert alert-danger alert-dismissible" id="alert" style="display:none;">
		        		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			        	<span class="message"></span>
			        </div>    
              <table>
              <thead> 
              <th>Content</th>
              <th>4</th>
              <th>3</th>
              <th>2</th>
              <th>1</th>
              <th>0</th>
              </thead>
              <?php
              include 'pattern.php';
              $sql_select  = "SELECT * FROM evaluation_questionaire WHERE question_type_ID = 1 AND eval_type_id = 1";
              $sql_query = $db->query($sql_select);
              while($sql_row = $sql_query->fetch_assoc()){
                $ans = "SELECT * FROM evaluation_answer_choice ORDER BY answer DESC";
                $query_ans = $db->query($ans);
                echo "
                   <tr>
                   <td>".$sql_row['question']."</td>
                
                ";
                while($ans_row = $query_ans->fetch_assoc()){
                  $patt = pattern($sql_row['question']);
                  if(isset($_SESSION['post'][$patt])){
                    $value = $_SESSION['post'][$patt];
                    if(is_array($value)){
                      foreach($value as $val){
                        if($val == $ans_row['id']){

                        }
                      }
                    }
                    else{
                      if($value == $sql_row['id']){
                        $check = "checked";
                      }
                    }
                  }
                  echo "
                    <td>
                    <input type ='radio' class = 'flat-red".$patt."' name = '".pattern($sql_row['question'])."' value = '".$ans_row['id']."'>
                    </td>
                  ";
                }

              }
              echo "
               </tr>
              ";
              ?>
              <tbody>
              <tr>
              <th>Facilatator</th>
              <th>4</th>
              <th>3</th>
              <th>2</th>
              <th>1</th>
              <th>0</th>
              <?php
              
              $sql_select2 = "SELECT * FROM evaluation_questionaire WHERE question_type_ID = 3 AND eval_type_id = 1";
             $sql_query2 = $db->query($sql_select2);
             while($sql_row2 = $sql_query2->fetch_assoc()){
               echo "
               <tr>
               <td>".$sql_row2['question']."</td>
             
               ";
               $select_ans = "SELECT * FROM evaluation_answer_choice ORDER BY answer DESC";
               $query_ans2 = $db->query($select_ans);
               while($ans_row2 = $query_ans2->fetch_assoc()){
                 $patt = pattern($sql_row2['question']);
                 
                 if(isset($_SESSION['post'][$patt])){
                   $value = $_SESSION['post'][$patt];
                   if(is_array($value)){
                     foreach($value as $val){
                       if($val == $ans_row2['id']){

                       }
                     }
                   }
                   else{
                     if($value == $ans_row2['id']){
                       $check = "checked";
                     }
                   }
                 }
                 echo "
                 <td>
                 <input type = 'radio' class = 'flat-red".$patt."' name = '".pattern($sql_row2['question'])."' value = '".$ans_row2['id']."'>
                 </td>
                 
                 ";
               }
              }
             ?>
              </tr>
              <tr>
              <th>Activity Result</th>
              <th>4</th>
              <th>3</th>
              <th>2</th>
              <th>1</th>
              <th>0</th>
              <?php 
              $sql_select3 = "SELECT * FROM evaluation_questionaire WHERE question_type_ID = 4 AND eval_type_id = 1";
              $sql_query3 = $db->query($sql_select3);
              while($sql_row3 = $sql_query3->fetch_assoc()){
                echo "
                 <tr>
                 <td>".$sql_row3['question']."</td>
                 
                ";
                $sql_ans3 = "SELECT * FROM evaluation_answer_choice ORDER BY answer DESC";
                $query_ans3 = $db->query($sql_ans3);
                while($ans_row3 = $query_ans3->fetch_assoc()){
                  $patt = pattern($sql_row3['question']);

                  if(isset($_SESSION['post'][$patt])){
                    $value = $_SESSION['post'][$patt];
                    if(is_array($value)){
                      foreach($value as $val){
                        if($val == $ans_row3['id']){

                        }
                      }
                    }
                    else{
                      if($value == $ans_row3['id']){

                      }
                    }
                  }
                  echo "
                  <td><input type = 'radio' class = 'flat-red".$patt."' name = '".pattern($sql_row3['question'])."' value = '".$ans_row3['id']."'> </td>
                  
                  ";
                }
              }
              
              ?>
              </tr>
         
              </tbody>
              </table>
              <br> <br>
              <center> 
              <button type = "submit" name = "submit" class  = "btn btn-success btn-flat">Submit</button>
              </center>
              </form>
</div>
</div>






</div>
</div>
</div>
</div>
</div>
</section>
</div>
<?php include 'footer.php'; ?>
</div>

<script>
var d = new Date();

document.getElementById("dates").innerHTML = " Capstone Project &copy; "+ d.getFullYear();
</script>



      <!-- jQuery 3 -->
      <script src="../dist/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../dist/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../dist/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/dist/js/demo.js"></script>
<script src = "../dist/bower_components/bootstrap/js/carousel.js"></script>
<sript src = "../dist/bower_components/bootstrap/dist/js/bootstrap.js"></sript>
<script src="plugins/iCheck/icheck.min.js"></script>


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

<script>
$(function(){ 
  
  $('.content').iCheck({
    checkboxClass:'icheckbox_flat-blue',
    radioClass: 'iradio_flat-blue'
  });
});
</script>

</body>
</html>
