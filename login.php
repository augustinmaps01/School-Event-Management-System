<?php //? ----- Author: Austin Maps ------ ?>
<?php

include('admin/server/connect.php');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{


  $i = mysqli_real_escape_string($db,$_POST['id_number']);
  $p = mysqli_real_escape_string($db,$_POST['password']);

  
  $query = mysqli_query($db,"SELECT * FROM user_account WHERE Account_ID='$i' AND Password = '$p'");
  $row = mysqli_fetch_assoc($query);

  $id = $row['Account_ID'];

  if($row['usertype'] == 1){
    session_start();
    $_SESSION['login_admin'] = $id;
    echo $_SESSION['login_admin'];
    header("location:admin/dashboard.php");
  }
  else if($row['usertype'] == 2){
    session_start();
    $_SESSION['login_user'] = $id;
    echo $_SESSION['login_user'];
    header("location:student_admin/student.php");
  } 
  else if($row['usertype'] == 3){
    session_start();
    $_SESSION['login_student'] = $id;
    echo $_SESSION['login_student'];
    header("location:student/home.php");
  }
  else if($row['usertype'] == 4){
    session_start();
    $_SESSION['login_reservation'] = $id;
    echo $_SESSION['login_reservation'];
    header("location:reservation/home.php");
    
  }
  else{
    header ("location:index.php?msg=failed");
  }


}




?>
