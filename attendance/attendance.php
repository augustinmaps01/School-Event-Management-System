<?php  require '../student_admin/session.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title> Attendance</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content=" Master  Login Form Widget Tab Form,Login Forms,Sign up Forms,Registration Forms,News letter Forms,Elements"/>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="//fonts.googleapis.com/css?family=Cormorant+SC:300,400,500,600,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
<link rel="stylesheet" href="css/main.css">
  <link rel="icon" href="../images/logo.png" sizes="16x16" type="image/png">

  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  	<!-- Bootstrap 3.3.7 -->

    <link rel="stylesheet" href="css/bootstrap.css">
  <script src="js/jquery.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src = "js/main.js"></script>
  	<!-- Google Font -->
  	<link rel="stylesheet" href="css/fonts.css">
</head>
<style>
	* {
		box-sizing: border-box;
	}
	body{
text-align: center;
background: url("../images/bg.jpg") 0px 0px no-repeat;
background-size:cover;
background-attachment: fixed;
background-color: black;
  color: white;
  	box-sizing: border-box;
}
.mail-form-agile button[type="submit"]{
font-size: 18px;
padding: 10px 20px;
letter-spacing:1.2px;
border: none;
text-transform: capitalize;
outline: none;
background: #03A9F4;
color: #fff;
cursor: pointer;
margin: 0 auto;
font-family: 'Open Sans', sans-serif;
-webkit-transition-duration: 0.9s;
transition-duration: 0.9s;
	box-sizing: border-box;
}
.mail-form-agile button[type="submit"]:hover {
 -webkit-transition-duration: 0.9s;
 transition-duration: 0.9s;
 background:rgba(91, 157, 214, 0.76);
 	box-sizing: border-box;
}
	.photo{
		width:150px; 
		margin-bottom: 30px; 
		margin-top: 10px
		margin-left:90px;
			box-sizing: border-box;
	}
	.head{
		margin-bottom: 0px;
			box-sizing: border-box;
	}
	h2{
		
		 font-size: 25px;
    color: #fff;
    font-family: 'Cormorant SC', serif;
    letter-spacing: 3px;
    margin: 0 auto;
    text-shadow: 1px 1px 4px #000;
    text-transform: uppercase;
    font-weight: 600;
    margin-top:0px;
    margin-bottom: 10px;
	}
	h3{
			 font-size: 20px;
    color: #fff;
    font-family: 'Cormorant SC', serif;
    letter-spacing: 3px;
    margin: 0 auto;
    text-shadow: 1px 1px 4px #000;
    text-transform: uppercase;
    font-weight: 600;
	}

	#div1 {
  /*background-color: red;*/
  transform: translateY(33%);
  	box-sizing: border-box;

}

#time {
   margin-top: 8px;
  font-family: 'Nova Mono', monospace;
  font-size: 50px;
  text-align: right;
  text-shadow:  2px 2px 4px black;
	position:fixed;
	right:50px;
		box-sizing: border-box;
}




</style>
<body>
<div id="div1">
    <p id="time" style = "positon:fixed;"></p>
  
  </div>
	 <a style = "color:whie;" class="nav-link" href="../student_admin/event.php"> <i class = "fa fa-angle-double-left" style = "font-size:59px; margin-right:100%;"></i></a>
	<div class="padding-all" style = "margin-top:-8%;">
	
		<div class="header">
		<?php
		if(isset($_POST['event'])){
			$title = mysqli_real_escape_string($db, $_POST['event_name']);
			$id = mysqli_real_escape_string($db, $_POST['event_id']);

			$query = mysqli_query($db, "SELECT * FROM user_info") or die(mysqli_error($db));
			$row = mysqli_fetch_array($query,MYSQLI_ASSOC);

		}else{
			header("location:../admin/event.php");
		}
		
		
		?>

				<img src = "../images/logo.png" class = "photo" style =  "width:90px; margin-top: 9%; margin-right:1%; margin-top:0%; margin-bottom:0%;">
			<h1 class="head" style = "padding-bottom: 0px; padding-top:0px;font-size:35px;margin-top: 0px;margin-bottom: 0px; ">CKC School Event Attendance</h1>
			<h2><?php echo $title; ?></h2>
			<h3> <?php
 $today =date('y:m:d');
 $new = date(' F d Y',strtotime($today));
echo "$new";

 ?></h3>
 <input type = "number" value = "<?php echo $id; ?>" name = "eventid" id = "eventid" hidden = "">

 <h2 style = "font-size:25px;" id = "content"></h2>
 <br> <br>
		</div>

		<div class="design-w3l" style  = "margin-top:-11%;">
			<div class="mail-form-agile">
			  
					<input type="text"  id = "stud_id" placeholder="Enter ID Number" required>
					<input type="password"  id = "passw" class="padding" placeholder="Password" required>
					<button type="submit"id = "login" name = "submit">login</button>
			
			</div>
		  <div class="clear"> </div>
		</div>
		
		<div class="footer" style = "margin-top:-5%;">
		<p id = 'dates'>©  </p>
		<p>Develop by: Augustin Maputol <br></p>
		</div>

	</div>
	<script>
var d = new Date();

document.getElementById("dates").innerHTML = " Capstone Project Abao's Group &copy; "+ d.getFullYear();
</script>

<script>
window.setInterval(ut, 1000);

function ut() {
  var d = new Date();
  document.getElementById("time").innerHTML = d.toLocaleTimeString();
  document.getElementById("date").innerHTML = d.toLocaleDateString();
}

</script>
<script>
		$(document).ready(function(){
			$("#login").click(function(){
				var id = $("#eventid").val();
				var sid = $("#stud_id").val();
				var pass = $('#passw').val();
				$.post("event_attendance.php",{event_id:id,s_id:sid,passw:pass},function(data){
					$("#content").html(data);
					$("#stud_id").val('');
					$('#passw').val('');

					var msg = $("#content").html(data);
					setTimeout(function(){
						msg.fadeToggle();
					}, 2000);

				});
			});
		});
		</script>
	


</body>
</html>