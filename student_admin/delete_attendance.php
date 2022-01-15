<?php include 'session.php'; ?>
<?php
if(isset($_GET['id'])){
    $del = mysqli_query($db, "DELETE FROM event_attendance WHERE eatt_id = '".$_GET['id']."'") or die(mysqli_error($db));
    header("location:event_attendance.php?delete=danger");
}


?>