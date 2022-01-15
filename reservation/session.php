<?php
//?-- ---------Author Austin Maps---------------- 
   include('connect.php');
  
   session_start();
   
   $user_check = $_SESSION['login_reservation'];
   
   $ses_sql = mysqli_query($db,"SELECT * FROM user_info WHERE School_ID='$user_check'");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
  $_SESSION['id'] = $row['userinfo_id'];
  $_SESSION['Account_ID'] = $row['School_ID'];
  $_SESSION['fname'] = $row['fname'];
  $_SESSION['lname'] = $row['lname'];
  $_SESSION['gender'] = $row['gender'];
  $_SESSION['mname'] = $row['mname'];
  $_SESSION['photo'] =$row['image'];
  
   $full = $row['fname']."  ".   " ".$row['lname']."  ";    
   if(!isset($_SESSION['login_reservation'])){
      header("location:../index.php");
   }
?>