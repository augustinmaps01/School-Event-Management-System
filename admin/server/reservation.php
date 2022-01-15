<?php 
include 'session.php';
//?-- ---------Author Austin Maps---------------- 
?>
<?php 
if(isset($_POST['delete'])){
    $delete = $_POST['id'];

    $query = mysqli_query($db, "DELETE FROM reservation WHERE reservation_id = '$delete'")
     or die(mysqli_error($db));
    header("location:../room.php?delete=danger");
}



?>