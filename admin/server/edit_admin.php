<?php include 'session.php'; ?>

<?php 
//?-- ---------Author Austin Maps---------------- 
if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $sid = $_POST['id2'];
    $acc = $_POST['a_id'];
    $pass = $_POST['pass'];
    $f = $_POST['fname'];
    $m = $_POST['mname'];
    $l = $_POST['lname'];
    $c = $_POST['course'];
    $y = $_POST['yl'];
    $g = $_POST['gender'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $i = $_FILES['file']['name'];
    if(!empty($i)){
        move_uploaded_file($_FILES['file']['tmp_name'], '../images/'.$i);

    } 
        mysqli_query($db, "UPDATE user_info SET School_ID = '$acc', fname = '$f', mname = '$m',
         lname = '$l',  gender = '$g',course = '$c', year_level = '$y',  image = '$i' 
          WHERE userinfo_id = '$id'") or die(mysqli_error($db));
        mysqli_query($db, "UPDATE user_account SET Account_ID = '$acc', Password = '$pass'
         WHERE user_account.Account_ID = '$sid'") or die(mysqli_error($db));   
        header("location:../add_user.php?edit=success");    
}
?>