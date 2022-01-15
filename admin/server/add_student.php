<?php include 'session.php'; ?>

<?php
//!-- ---------Author Austin Maps---------------- 
if(isset($_POST['save'])){

    $id = $_POST['s_id'];
    $pass = $_POST['pwd'];
    $club  = $_POST['club'];
    $first = $_POST['fname'];
    $middle = $_POST['mname'];
    $last = $_POST['lname'];
    $course = $_POST['course'];
    $yl = $_POST['yl'];
    $email = $_POST['email'];
    $mobile =$_POST['mbl'];
    $gender = $_POST['gender'];
    $img = $_FILES['file']['name'];
   



    if (!empty($img)) {
        move_uploaded_file($_FILES['file']['tmp_name'], '../images/' . $img);
    }

    
    $sql = "SELECT * FROM user_info WHERE School_ID ='$id'";
    $query = $db->query($sql);
    $sql2 = "SELECT * FROM user_account WHERE Account_ID = '$id'";
    $sql3 = "SELECT * FROM user_info";
    $query3 = $db->query($sql3);
    $query2 = $db->query($sql2);



    if($query->num_rows > 0){
        header("location:../student.php?error=exist");
    }else if ($query3->num_rows > 200){
        header("location:../student.php?error");
    }
    
    else {
        mysqli_query($db, "INSERT INTO user_info(School_ID, fname, mname, lname, gender, course, year_level, email, mobile, Club_name, image)
                     VALUES('$id', '$first', '$middle', '$last', '$gender', '$course', '$yl', '$email', '$mobile','$club', '$img')") or die(mysqli_error($db));
        mysqli_query($db, "INSERT INTO user_account(Account_ID, Password,usertype) VALUES('$id', '$pass',3)") or die(mysqli_error($db));
        header("location:../student.php?save=success");
    }
    
 



}

?>