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
   $process = "Processing";
   $pending = "Pending";

   $sql = "SELECT * FROM reservation WHERE reservation_id = '$id' AND room_id = '$room' AND start_date = '$start' AND end_date = '$end'";
  $query = $db->query($sql);
  if($query->num_rows > 0){
    $query2 = mysqli_query($db, "INSERT INTO reservation(room_id, member_id, description, start_date, end_date, status)
    VALUES('$room', '$name', '$desc', '$start', '$end', '$pending')") or die(mysqli_error($db));   
    header("location:../room.php?pending=success");
}else{
    $query2 = mysqli_query($db, "INSERT INTO reservation(room_id, member_id, description, start_date, end_date, status)
    VALUES('$room', '$name', '$desc', '$start', '$end', '$process')") or die(mysqli_error($db));                  
  
  header("location:../room.php?save=success");
  }

 







}

?>