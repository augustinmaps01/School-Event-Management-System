<?php include 'session.php'; ?>
<?php

if(isset($_POST['post'])){
    $id = $_POST['sid'];
    $event = $_POST['event_id'];
    $post  = $_POST['message'];

    $sql = "SELECT * FROM post_event WHERE event_ID = '$event'";
    $query = $db->query($sql);

    if($query->num_rows > 0 ){
        header("location:../event.php?error=post");
    }else{ 
        mysqli_query($db, "INSERT INTO post_event(event_ID,message, Account_ID)
        VALUES('$event', '$post', '$id')") or die(mysqli_error($db));
    header("location:../event.php?success=post");

    }
    
}
?>