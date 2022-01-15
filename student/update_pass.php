<?php include 'session.php' ?>
<?php
if(isset($_GET['return'])){
    $return = $_GET['return'];
}else{
    $return = 'profile.php?success=updated';
}



if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $new = $_POST['pass'];
    $curr = $_POST['curr_pass'];
    $pwd = $_POST['passw'];
  
        if($curr == $pwd){
            $query2 = mysqli_query($db, "UPDATE user_account SET Password = '$new' WHERE Account_ID = '$id'");
            header("location:profile.php"); 
        }else{
         header("location:profile_edit.php?error=update");
        }
    
     
  
 
}

?>