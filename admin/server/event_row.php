<?php 
include 'session.php';
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $sql = "SELECT event.title, event.event_id,event.description, event.Date, event.start_time, event.end_time, event.venue,event.type, event.Timestamp, reservation.reservation_id, members.firstname, members.lastname, members.middlename FROM event LEFT JOIN reservation ON reservation.reservation_id = event.reservation_id LEFT JOIN members ON members.member_id = reservation.member_id WHERE event.event_id = '$id'";
    $query = $db->query($sql);
    $row = $query->fetch_assoc();

    echo json_encode($row);
}
?>