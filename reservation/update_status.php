<?php include 'session.php'; ?>
<?php

if(isset($_POST['confirm_status'])){
    $id = $_POST['id'];
    $status = $_POST['status'];


    $query = mysqli_query($db, "UPDATE reservation SET status = '$status' WHERE reservation_id = '$id'");
   header("location:room.php?confirm=changes");
}
?>