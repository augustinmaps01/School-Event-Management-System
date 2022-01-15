
<div class="modal fade" id="edit">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><i class = "fa fa-edit"></i> Update Reservation  </h4>
</div>
<div class="modal-body">
<!--  form method -->
<form action = "server/edit_room.php" role = "form" method = "POST">
<input type="hidden"  class="id" name="id">
<div class ="form-group">
<label>Name</label>
<select name = "name" class = "form-control" id = "nmae">
<option value  = "" selected id = "edit_member"></option>
<?php
$sql = "SELECT * FROM members";
$query = $db->query($sql);
while($row = $query->fetch_assoc()){
  echo "
  <option value = '".$row['member_id']."'>".$row['lastname']. ', '. $row['firstname']. ' '. $row['middlename']. '.'."</option>
  ";
}
?>
</select>
</div>
<div class="form-group">
<label for = "date">Start Date Reserve</label>
<input type="date" id = "edit_start"  name="start" class="form-control">
	</div>
  <div class = "form-group">
<label>End Date Reserve</label>
<input type = "date" id = "edit_end" name = "end" class  = "form-control">
</div>
<div class = "form-group">
<label>Description</label>
<textarea name = "desc" id = "descr" class = "form-control"></textarea>
</div>
<div class="form-group">
<label for="room">Room</label>
<select name = "room"  class = "form-control">
<option value = ""selected id = "edit_room"></option>
<?php
$sql_room = "SELECT * FROM room";
$room_query = $db->query($sql_room);
while($rr = $room_query->fetch_assoc()){
   echo "
        <option id = 'room_select' value = '".$rr['room_ID']."'>".$rr['name']."</option>
   ";
}
?>
</select>
</div>
<div class = "form-group">
<input type="radio"  name="status" value = "Approved">  Approved
</div>
<div class = "form-group">
<input type="radio" name="status" value = "Cancelled">  Cancelled
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
<button type="submit" name = "edit" class="btn btn-primary"><i class = "fa fa-save"></i> Save</button>
</form>

</div>
</div>
</div>
</div>


<div class="modal modal-danger fade" id="delete">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><i class = "fa fa-trash"></i> Delete Reservation</h4>
</div>
<div class="modal-body">
<form action = "server/reservation.php" method = "POST">
<input type="hidden" class="id" name="id">
<p style = "text-align:center; font-size:20px;">Do you want to Delete this Reserve Transaction?</p>

</div>

<div class="modal-footer">
<button type="button"  class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
</form>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

