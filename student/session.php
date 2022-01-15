<?php
   include('connect.php');
   session_start();

   $user_check = $_SESSION['login_student'];

   $ses_sql = mysqli_query($db,"SELECT * FROM user_info WHERE School_ID='$user_check'");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
      
      $_SESSION['Firstname'] = $row['fname'];
      $_SESSION['Lastname'] = $row['lname'];
      $_SESSION['Student_ID'] = $row['School_ID'];
      $_SESSION['Middlename'] = $row['mname'];
      $_SESSION['Email'] = $row['email'];
      $_SESSION['mobile'] = $row['mobile'];
      $_SESSION['photo'] =$row['image'];
   if(!isset($_SESSION['login_student'])){
      header("location:../index.php");
   }
?>
