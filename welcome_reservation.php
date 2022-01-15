<?php include 'includes/header.php'; ?>
<body class = "hold-transition skin-blue layout-top-nav">
<div class = "wrapper">
<!--nav bar -->
<?php include 'includes/navbar.php'; ?>
<div class = "content-wrapper">
<div class = "container">
<section class = "content">

<div class = "row">
<div class = "col-xs-12 ">
<div class = "box">
<div class="box-header">
<h1 style = "font-family: Times New Roman, Times, serif;font-size:50px;text-shadow:  1px 2px 2px #4d4dff;" class = "page-header text-primary text-center title">Welcome to Room Reservation </h1>
</div>
<div class = "box-body">




<table id = "example1" class = "table table-bordered">
<thead>
<th>Name</th>
<th>Room</th>
<th>Time</th>
<th>Description</th>
 <th>Start Date</th>
<th>End Date</th>
<th>Status</th>
</thead>
<tbody>
<?php 

include 'admin/server/connect.php';
$sql = "SELECT members.firstname, members.lastname, members.middlename, room.name
     , reservation.description, reservation.start_time,reservation.start_date, reservation.end_date,  reservation.end_time, reservation.status
       FROM reservation INNER JOIN members ON members.member_id = reservation.member_id INNER JOIN 
         room ON room.room_id = reservation.room_id";
$query = $db->query($sql);
while($row = $query->fetch_assoc()){
$name = $row['lastname']. ',  '.$row['firstname']. ' '. $row['middlename']. '.';
if (empty($row['middlename'])){
    $name = $row['lastname']. '  '.$row['firstname'];
}
$s_time = date('g:i A', strtotime($row['start_time']));
$e_time = date('g:i A', strtotime($row['end_time']));
$s_date = date('F d Y', strtotime($row['start_date']));
$e_date = date('F d Y', strtotime($row['end_date']));

?>

<tr>
<td><?php echo $name; ?> </td>
<td><?php echo $row['name']; ?> </td>
<td><?php echo $s_time . '-'.$e_time; ?> </td>
<td><?php echo $row['description']; ?> </td>
<td><?php echo $s_date; ?> </td>
<td><?php echo $e_date; ?></td>
<?php
if($row['status'] == 'Approved'){
    echo '
    <td> <span class = "label label-success">'.$row['status'].'</span> </td>
    ';
}else if($row['status'] == 'Processing'){
    echo '
     <td> <span class = "label label-warning">'.$row['status'].'</span> </td>
    ';
}else if($row['status'] == 'Cancelled'){
    echo '
    <td> <span class = "label label-danger">'.$row['status'].'</span></td>
    ';
}
?>


</tr>
</tbody>
<?php } ?>
</table>

</div>

</div>





</div>
</div>


</section>
</div>
</div>
<?php include 'includes/footer.php'; ?>

</div>
















<script>
var d = new Date();

document.getElementById("dates").innerHTML = " Capstone Project &copy; "+ d.getFullYear();
</script>


<!-- Scripts -->
<?php include 'includes/scripts.php'; ?>

 <script>
      $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : true
        })
      })
    </script>
</body>
</html>