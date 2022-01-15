<?php include 'session.php'; ?>
<?php 
//?-- ---------Author Austin Maps---------------- 
if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $desc = $_POST['edit_desc'];
    $title = $_POST['edit_title'];
    $dt = $_POST['edit_date'];
    $stime = $_POST['edit_start'];
    $etime = $_POST['edit_end'];
    $v = $_POST['edit_venue'];
    $type = $_POST['edit_type'];
    $props = $_POST['propose'];

  
  
        mysqli_query($db, "UPDATE event SET title = '$title', description = '$desc',
         Date = '$dt', start_time = '$stime', end_time = '$etime', venue = '$v',
          type = '$type', reservation_id = '$props' WHERE event_id = '$id'")
           or die(mysqli_error($db));
        header("location:../event.php?edit=success");

    

}

?>