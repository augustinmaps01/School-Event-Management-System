<?php 
session_start();
if(isset($_SESSION['login_admin'])){
 header("location:admin/dashboard.php");
}else if(isset($_SESSION['login_user'])){
	header("location:student_admin/student.php");
}else if(isset($_SESSION['login_student'])){
	header("location:student/home.php");
}else if(isset($_SESSION['login_reservation'])){
	header("locationL:reservation/room.php");
}
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
	<title>Event Management System</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Latest Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />

<lik rel  = "stylesheet" href = "css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap.css">

<script src = "dist/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> 

        <script src="fonts/css/slim.js"></script>
<script src="fonts/js/popper.js"></script>

	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link rel="icon" href="images/logo.png" sizes="16x16" type="image/png">
	<link rel="icon" href="images/logo.png" sizes="16x16" type="image/png">
	<link rel ="stylesheet" href = "css/preload.css">


        <script src="fonts/css/slim.js"></script>
<script src="fonts/js/popper.js"></script>

	<link href="fonts/fonts.css"rel="stylesheet">


 <style>
 html {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #DFDFDF;
}
html, body {
    margin: 0;
}

.full-screen-video-container {
    position: relative;
    height: 100vh;
    width: 100vw;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: flex-start;
}
.top-content-style {
	padding: 2vw 4vw 4vw;
    background: #1cc7d0;
}

.full-screen-video-container video {
    z-index: -1;
    position: absolute;
    width: auto;
    height: auto;
    min-width: 100%;
    min-height: 100%;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}


body{

	background: url(../images/ckc.jpg) no-repeat center;
		background-size: cover;
		width:100%;

    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    -ms-background-size: cover;
    min-height: 100vh;
}
 .love{
	 height:5%;
    width:80%;
	text-align:center;
	margin-top:20px;
	font-size:10px;
	font-weight:bold;
	margin-left:20px;



}
.sub-main-w3, .bg-content-w3pvt,.top-content-style,   {
margin-top:20px;
}

.logo{
	width:90px;
}





 </style>
</head>

<body>
    <div class ="loader_bg">
 <div class = "loader">

 </div>
	</div>
<div class="full-screen-video-container">
        <video autoplay loop muted>
          <source src="images/skols.mp4" type="video/mp4" />
     
		  </video>
    
<script src = "dist/script/jquery.js"></script>
  <script src  = "dist/script/bootstrap.js"> </script>


	<div class="main-bg">
	<div class ="row" style = "margin-bottom:2em;">

	</div>
		<h1 class = "ty" style = " font-size:55px; width:100%; margin-top:-5%;color:white;font-family:Times New Roman;text-shadow:  4px 3px 4px #000000;">Event Management System</h1>

		<div class="sub-main-w3">
			<div class="bg-content-w3pvt" style ="margin-top:2%;">
				<div class="top-content-style">
					<img class = "logo"  src="images/logo.png" alt=""  />
				</div>
				<form action="login.php" method="post">
				<?php

if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
// echo '<p style = "color:red;" class = "love">Your ID Number and Password is incorrect </p>';
	echo ' <div class="alert alert-danger love" style="text-align:center;	">Incorrect School ID and Password!</div>';
}


?>
					<p class="legend">Login<span class="fa fa-hand-o-down"></span></p>
					<div class="input">
						<input type="text" placeholder="ID Number" name="id_number" required />
						<span class="fa fa-user"></span>
					</div>
					<div class="input">
						<input type="password" placeholder="Password" name="password" required />
						<span class="fa fa-unlock"></span>
					</div>
					<button style = "width:80px; margin:auto; text-align:right; padding:10px;" type="submit" name = "login_user" class="btn submit">
						<span class="fa fa-sign-in">Login</span>

					</button>

				</form>

			</div>
		</div>

		<div class="copyright">


			</h2>
		</div>

</div>



</div>
<script src="dist/script/jquery-min.js"></script>
<script>

setTimeout(function(){
	$('.loader_bg').fadeToggle();
}, 1500);


 </script>
<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
</body>

</html>
