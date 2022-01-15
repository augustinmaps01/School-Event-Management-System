<?php include 'session.php'; ?>
<?php 
//?-- ---------Author Austin Maps---------------- 
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $query = mysqli_query($db, "DELETE FROM members WHERE member_id = '$id'") or die(mysqli_errror($db));
    header("location:member.php?delete=danger");
  

}


mysqli_close($db);
?>