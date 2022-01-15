<?php
include 'session.php';
?>

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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   
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
.samp{
  font-size:25px;
}


    </style>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


<body class="hold-transition skin-blue layout-top-nav">
<div class = "wrapper">
<?php  include 'navbar.php'; ?>

<div class="content-wrapper">
  <section class = "content-header">
      
</section>  
<section class = "content">
    <div class = "row">
    <div class="col-xs-10" style = "margin-left:9%;">
<div class = "box">
<div class ="box-header">

</div>
<div class = "box-body">
    <img style =" width:80px; margin-left:46%;" src = "../images/logo.png"alt ="">
    <h1 class ="text-success" style =" margin-top:0%;font-family:tohoma;text-align:center;font-size:50px; text-shadow:  1px 0px 1px #000000;" class = "box-title">Student Event Evaluation Form </h1>
    <h2 class ="text-primary" style =" margin-top:0%;font-family:tohoma;text-align:center;font-size:25px" class = "box-title">Guidance Office </h1>
    <h2 class = "text-info" style =" margin-top:0%;font-family:tohoma;text-align:center;font-size:15px" class = "box-title">Gingoog City </h1>

<?php 
$c =  $row['course'];
$y = $row['year_level'];
?>
    <form action = "evaluation_add.php" method = "post" role = "form" class="form-horizontal">
              <div class="box-body">
              <div class = "form-group has-info">
              <label class = "col-sm-2 control-label">Activity Title:</label>
              <div class ="col-sm-3">
              
              <input type = "hidden" name = "stud_id" value = "<?php echo $row['School_ID']; ?>">
              <input type ="hidden" name = 'eval' value = '2'>
              <select name = "title" id = "title" class = "form-control" required>
              <option value = "">----Select Events------</option>
              <?php
              $sch_id = $row['School_ID'];
              $qr = "SELECT user_account.Account_ID,event.Date, event.title, event.event_id,
               event.Date, event.start_time FROM event_attendance
                LEFT JOIN event ON event.event_id = event_attendance.event_id 
                LEFT JOIN user_account ON user_account.Account_ID = event_attendance.stud_id WHERE 
                 user_account.Account_ID = '$sch_id'";
              $res = $db->query($qr);
              while($rw = $res->fetch_assoc()){
               
              echo "
              <option value = '".$rw['event_id']."'>".$rw['title']."</option>
              ";
              }
              
              ?>
              </select>
              </div>
           
              <div class = "form-group has-info">
              <label class = "col-sm-2 control-label">Course&Year</label>
              <div class = "col-sm-3">
              <input type = "text" class = "form-control" value = "<?php echo $c."-".$y; ?>"readonly>
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
         <button type ="button" class = "close" data-dismiss="alert" aria-hidden ="true">&times;</button>
         <ul>
         <?php 

           echo "
                 <li class = 'samp'>".$_SESSION['error']."</li>
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
             $sql = "SELECT * FROM evaluation_questionaire WHERE question_type_ID = 1 AND eval_type_id = 2";
             $query = $db->query($sql);
             while($row = $query->fetch_assoc()){
            $ans = "SELECT * FROM evaluation_answer_choice  ORDER BY answer DESC";
            $qans = $db->query($ans);
                echo "
             
                <tr>
                <td>".$row['question']."</td>
                "; 
              while($data = $qans->fetch_assoc()){
                $patt = pattern($row['question']);
               
                if(isset($_SESSION['post'][$patt])){
                  $value = $_SESSION['post'][$patt];
                  if(is_array($value)){
                    foreach($value as $val){
                      if($val == $data['id']){
                     

                      }
                    }
                  }
                  else{
                    if($value == $data['id']){
                      $check = "checked";
                    }
                  }
                }
               
                echo "
                <td>
                
                
                <input type = 'radio' class = 'flat-red ".$patt."'  name = '".pattern($row['question'])."' value = '".$data['id']."'></td>
                ";
                }   
 
              }                                  
                echo "
                </tr>
                ";
                        
                 ?>
              <tbody>
              <tr>
               <th>Design</th>
              <th>4</th>
              <th>3</th>
              <th>2</th>
              <th>1</th>
              <th>0</th>
              <?php 
           
              $des = "SELECT * FROM evaluation_questionaire WHERE question_type_ID = 2";
              $exec = $db->query($des);
              while($rdes = $exec->fetch_assoc()){
                echo "
                <tr>
                <td>".$rdes['question']."</td>
                ";
                $sql = "SELECT * FROM evaluation_answer_choice ORDER BY answer DESC";
                $query = $db->query($sql);
                while($rows = $query->fetch_assoc()){
                  $patt = pattern($rdes['question']);
               
                  if(isset($_SESSION['post'][$patt])){
                    $value = $_SESSION['post'][$patt];
                    if(is_array($value)){
                      foreach($value as $val){
                        if($val == $rows['id']){
                       
  
                        }
                      }
                    }
                    else{
                      if($value == $rows['id']){
                        $check = "checked";
                      }
                    }
                  }



                  echo "
                 <td><input type = 'radio' class = 'flat-red ".$patt."' name = '".pattern($rdes['question'])."' value = '".$rows['id']."'></td>
                  ";
                }
              }
              
              ?>
             

             </tr>
             
              <tr>
              <th>facilatator</th>
              <th>4</th>
              <th>3</th>
              <th>2</th>
              <th>1</th>
              <th>0</th>
              <?php 
              $fac = "SELECT * FROM evaluation_questionaire WHERE question_type_ID = 3 AND eval_type_id = 2";
              $execs = $db->query($fac);
              while($frow = $execs->fetch_assoc()){
                echo "
              <tr>
              <td>".$frow['question']."</td>
 
                ";
                $afac = "SELECT * FROM evaluation_answer_choice ORDER BY answer DESC";
                $query_fac = $db->query($afac);
                while($afrow = $query_fac->fetch_assoc()){
                  $patt = pattern($frow['question']);
               
                  if(isset($_SESSION['post'][$patt])){
                    $value = $_SESSION['post'][$patt];
                    if(is_array($value)){
                      foreach($value as $val){
                        if($val == $afrow['id']){
                       
  
                        }
                      }
                    }
                    else{
                      if($value == $afrow['id']){
                        $check = "checked";
                      }
                    }
                  }





                  echo "
                 <td> <input type = 'radio' class = 'flat-red ".$patt."' name = '".pattern($frow['question'])."'value = '".$afrow['id']."'>
                 </td>  ";
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
              $acc = "SELECT * FROM evaluation_questionaire WHERE question_type_ID = 4 AND eval_type_id = 2";
              $result = $db->query($acc);
              while($arow = $result->fetch_assoc()){
                echo "
              <tr>
              <td>".$arow['question']."</td>
             
                ";
              $sql2 = "SELECT * FROM evaluation_answer_choice  ORDER BY answer DESC";
              $acc_query = $db->query($sql2);
              while($arrows = $acc_query->fetch_assoc()){
                $patt = pattern($arow['question']);
               
                if(isset($_SESSION['post'][$patt])){
                  $value = $_SESSION['post'][$patt];
                  if(is_array($value)){
                    foreach($value as $val){
                      if($val == $arrows['id']){
                     

                      }
                    }
                  }
                  else{
                    if($value == $arrows['id']){
                      $check = "checked";
                    }
                  }
                }
                echo "
                <td><input type = 'radio' class = 'flat-red ".$patt."' name = '".pattern($arow['question'])."' value = '".$arrows['id']."'></td>
                ";
              }
              }
              ?>
           
           </tr>
              </tbody>
              </table>

 <br> <br>
     <center>  <button type = "submit" name = "submit" class = "btn btn-success btn-flat">Submit</button>  </center>
            </form>

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
