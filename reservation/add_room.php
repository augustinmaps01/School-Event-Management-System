<?php
include 'session.php';
//!-- ---------Author Austin Maps---------------- 
if(isset($_POST['save'])){
  $id = $_POST['id'];
   $name = $_POST['name'];
   $start = $_POST['s_date'];
   $end = $_POST['e_date'];
   $room = $_POST['room'];
   $desc = $_POST['desc'];
   $start_time = $_POST['start_time'];
   $end_time = $_POST['end_time'];
   $process = "Processing";


   $sql = "SELECT * FROM reservation WHERE room_id = '$room' AND start_date = '$start' AND end_date = '$end'";
  $query = $db->query($sql);
  if($query->num_rows > 0){
    header("location:room.php?exist=error");
}else{
    $query2 = mysqli_query($db, "INSERT INTO reservation(room_id, member_id, description, start_time, end_time, start_date, end_date, status)
    VALUES('$room', '$name', '$desc','$start_time', '$end_time', '$start', '$end', '$process')") or die(mysqli_error($db));                  
  
  header("location:room.php?save=success");
  }

 







}

?>