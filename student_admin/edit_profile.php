<?php include 'session.php'; ?>
<?php

if(isset($_GET['return'])){
  $return = $_GET['return'];
}else{
  $return = 'profile.php';
}

if(isset($_POST['edit'])){
  $id = $_REQUEST['id'];
  $sid = $_REQUEST['id2'];
  $schoolid = $_REQUEST['s_id'];
  $pass = $_REQUEST['pwd'];
  $first = $_REQUEST['fname'];
  $middle = $_REQUEST['mname'];
  $last = $_REQUEST['lname'];
  $gen  = $_REQUEST['gender'];
  $email = $_REQUEST['email'];
  $mbl = $_REQUEST['mbl'];
  $filename = $_FILES['img']['name'];
  if(!empty($filename)){
    move_uploaded_file($_FILES['img']['tmp_name'], '../images/'.$filename);	
  }
  
 mysqli_query($db, "UPDATE user_info SET School_ID = '$schoolid',
   fname = '$first', mname  = '$middle', lname = '$last', gender = '$gen',
    email = '$email', mobile = '$mbl', image = '$filename' WHERE userinfo_id = '$id'") or die(mysqli_error($db));
 mysqli_query($db, "UPDATE user_account SET Account_ID = '$schoolid', Password = '$pass' WHERE user_account.Account_ID = '$sid'");
    header("location:".$return);
}

?>