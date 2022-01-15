<?php include 'session.php'; ?>
<?php
//?-- ---------Author Austin Maps---------------- 
if(isset($_POST['edit'])){

    $id = $_POST['id'];
    $member = $_POST['name'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $room = $_POST['room'];
    $desc = $_POST['desc'];
     $stat = $_POST['status'];
     $start_time = $_POST['start_time'];
     $end_time = $_POST['end_time'];
    
    
 $query2 = mysqli_query($db, "UPDATE reservation SET room_id = '$room', member_id = '$member',
   start_time = '$start_time', end_time = '$end_time', description  = '$desc', start_date = '$start', end_date = '$end', status = '$stat'
  WHERE reservation_id = '$id'");
 header("location:room.php?edit=success");
 
 
}

?>