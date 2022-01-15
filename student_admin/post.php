<?php include 'session.php'; ?>
<?php

if(isset($_POST['post'])){
    $id = $_POST['aid'];
    $event = $_POST['event_id'];

    $sql = "SELECT * FROM post_event WHERE event_ID = '$event'";
    $query = $db->query($sql);

    if($query->num_rows > 0 ){
        header("location:event.php?error=post");
    }else{ 
        mysqli_query($db, "INSERT INTO post_event(event_ID, Account_ID)VALUES('$event', '$id')") or die(mysqli_error($db));
    header("location:event.php?success=post");

    }
    
}
?>