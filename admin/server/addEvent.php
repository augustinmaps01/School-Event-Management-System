<?php include 'session.php'; ?>
<?php 
//!-- ---------Author Austin Maps---------------- 
if(isset($_POST['save'])){
    $event_id = $_POST['event_id'];
    $d = $_POST['desc'];
    $t = $_POST['title'];
    $dt = $_POST['date'];
    $s_t = $_POST['start_time'];
    $e_t = $_POST['end_time'];
    $v = $_POST['venue'];
    $ty = $_POST['type'];
    $prop = $_POST['propose'];

     $res = mysqli_query($db, "SELECT * FROM event WHERE venue = '$v' AND date = '$dt' AND start_time = '$s_t' AND end_time = '$e_t'");
     
    if(mysqli_num_rows($res)>0){
        header("location:../event.php?msg=exist");
    }else{
        $sql = "INSERT INTO event (event_id, title, description, Date, start_time, end_time, venue, type, reservation_id)
        VALUES('', '$t','$d', '$dt', '$s_t', '$e_t', '$v', '$ty', '$prop')";
        mysqli_query($db, $sql) or die(mysqli_error($db));
               header("location:../event.php?save=success");
    }
    mysqli_close($db);  
}
?>