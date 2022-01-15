<?php  include 'session.php'  ?>
<?php 
if(isset($_POST['id'])){
    $id = $_POST['id'];

    $sql = "SELECT reservation.member_id as Member, reservation.reservation_id, 
    reservation.room_id, reservation.member_id, room.room_ID, room.name,
    members.member_id, members.firstname, members.lastname, 
    reservation.description, reservation.start_time as start , reservation.end_time as end, reservation.start_date, reservation.end_date,
     reservation.status FROM reservation LEFT JOIN room ON
      room.room_ID = reservation.room_id LEFT JOIN members ON 
       members.member_id = reservation.member_id  
       WHERE reservation.reservation_id = '$id'";
    $query  =$db->query($sql);
    $row = $query->fetch_assoc();
    echo json_encode($row);
}
?>