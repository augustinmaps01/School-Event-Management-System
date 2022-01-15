<?php include 'session.php'; ?>
<?php
//?-- ---------Author Austin Maps---------------- 
if(isset($_POST['delete'])){
    $delete = $_POST['id'];
    $query = mysqli_query($db, "DELETE FROM event WHERE event_id = '$delete'")
     or die(mysqli_error($db));
    header("location:../event.php?delete=danger");
}

?>