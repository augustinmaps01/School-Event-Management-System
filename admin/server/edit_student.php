<?php  include 'session.php'; ?>
<?php
//?-- ---------Author Austin Maps---------------- 
if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $sid = $_POST['id2'];
    $s = $_POST['edit_id'];
    $pass = $_POST['edit_pwd'];
    $first = $_POST['fname'];
    $middle = $_POST['mname'];
    $clubs = $_POST['club'];
    $last = $_POST['lname'];
    $course = $_POST['course'];
    $gen = $_POST['gender'];
    $yl = $_POST['yl'];
    $email = $_POST['email'];
    $mbl = $_POST['mbl'];
    $filename = $_FILES['file']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['file']['tmp_name'], '../images/'.$filename);	
    }
    
    $sql = "SELECT * FROM user_info WHERE School_ID = '$s'";
    $query = $db->query($query);
    if($query->num_rows > 0){
      header("location:../student.php?error=exists");
    }else{
      mysqli_query($db, "UPDATE user_info SET School_ID = '$s', fname = '$first', mname = '$middle',
        lname = '$last', gender = '$gen',  course = '$course',year_level = '$yl', mobile = '$mbl',
         Club_name = '$clubs', image = '$filename'  
      WHERE  userinfo_id = '$id'") or die (mysqli_error($db));
   mysqli_query($db, "UPDATE user_account SET Account_ID = '$s', Password = '$pass'
    WHERE user_account.Account_ID = '$sid'") or die(mysqli_error($db));   
      
      header("location:../student.php?edit=success");
    }

}


?>