<?php
include 'session.php';


if(isset($_POST['save'])){
   
    $desc = $_POST['desc'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $stime = $_POST['time'];
    $etime = $_POST['time2'];
    $venue = $_POST['venue'];
    $type = $_POST['type'];
    $proposal = $_POST['propose'];
    
$sql = "SELECT * FROM event WHERE venue = '$venue' AND Date = '$date'";
$query = $db->query($sql);

    if($query->num_rows > 0){
      header("location:event.php?msg=exist");
    }else{
        mysqli_query($db, "INSERT INTO event(event_id, title, description, Date, start_time, end_time, venue, type, reservation_id)
        VALUES('','$title', '$desc', '$date', '$stime', '$etime', '$venue', '$type', '$proposal')") or die(mysqli_error($db));
        header("location:event.php?save=success");
    }
  



}

?>