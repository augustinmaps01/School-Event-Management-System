<?php include 'session.php'; ?>
<?php 
//?-- ---------Author Austin Maps---------------- 
if(isset($_GET['id']) && isset($_GET['accountid'])){
   $query =  mysqli_query($db, "DELETE FROM user_info WHERE userinfo_id = '".$_GET['id']."'") 
   or die(mysqli_error($db));
   $query2 = mysqli_query($db, "DELETE FROM  user_account WHERE Account_ID = '".$_GET['accountid']."'") 
   or die(mysqli_error($db));
   header("location:../student.php?delete=danger");
}


?>