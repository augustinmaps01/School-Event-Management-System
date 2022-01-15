<?php include 'session.php'; ?>
<?php include 'header.php'; ?>
<body class = "hold-transition skin-blue layout-top-nav">
<div class = "wrapper">
<?php  include 'navbar.php'; ?>
<div class = "content-wrapper">
<section class = "content-header">
</section>
<section class = "content">
<?php
$id = $_SESSION['Student_ID'];

$sql = "SELECT * FROM  user_account WHERE Account_ID = '$id'";
$query  =  $db->query($sql);
$row = $query->fetch_assoc();
$pass = $row['Password'];
?>


<div class = "row">
<div class="col-xs-6" style = "margin-left:25%; margin-top:7%;">
<div class = "box">
<div class = "box-header" >

</div>
<div class = "box-body">
    <h1  class = "text-info" style =" font-size:35px; margin-top:0%;font-family:tohoma;text-align:center;" class = "box-title"><i class = "fa fa-lock"> </i> Change Account Password </h1>

<?php 
if(isset($_GET['error']) && $_GET['error'] == 'update'){
      echo "<div class = 'alert alert-danger' style = 'text-align:center'><strong>The Password is  Incorrect </strong> </div> ";
}

?>
<form action = "update_pass.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" method = "POST">
<br><br><br> 

                <div class = "form-group">   
                <div class = "col-xs-9"style = "margin-left:10%;">
                <label> Current Password </label>
                <input type="password" name = "curr_pass" class="form-control"  placeholder="Type Current Password" required>
               <br>
              
                </div>   
                </div>

				<div class="form-group">
         <input type = "hidden" name = "id" value  = "<?php echo $_SESSION['Student_ID']; ?>">
              <input type = "hidden" name = "passw" value = "<?php echo $pass;  ?>">
               <div class  = "col-xs-9" style = "margin-left:10%;">
                  <label for="exampleInputPassword1">New Password</label>   
                  <input type="password" name = "pass" class="form-control"  placeholder="Password" required>
				<br>
				  <center>   <button type = "submit" name = "edit" class = "btn btn-primary btn-flat">Update</button> </center>
				  <br>
               
             
               </div>
                </div>    
</form>

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



</body>
</htnl>