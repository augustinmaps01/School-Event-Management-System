<?php include 'session.php'; ?>
<?php
//?-- ---------Author Austin Maps---------------- 

if(isset($_GET['return'])){
   $return = $_GET['return'];

}else{
    $return = 'profile.php';
}

if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $user = $_POST['id2'];
    $schoolid = $_POST['s_id'];
    $pass = $_POST['password'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $mbl = $_POST['mobile'];
    $img = $_FILES['file']['name'];
    if(!empty($img)){
        move_uploaded_file($_FILES['file']['tmp_name'], '../images/'.$img);

    }
    mysqli_query($db, "UPDATE user_info SET School_ID = '$schoolid', fname = '$fname', mname = '$mname',
     lname = '$lname', gender = '$gender', image = '$img', mobile = '$mbl', email = '$email'
      WHERE userinfo_id = '$id'") or die(mysqli_error($db));
    mysqli_query($db, "UPDATE user_account SET Account_ID = '$schoolid', Password = '$pass' 
    WHERE user_account.Account_ID = '$user'") or die(mysqli_error($db));
    header('location:profile.php');
}

?>