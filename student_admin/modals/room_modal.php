
<div class="modal modal-success fade" id="addroom">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><i class = "fa fa-file"></i> Add Reservation  </h4>
</div>
<div class="modal-body">
<!--  form method -->
<form action = "addRoom.php" role = "form" method = "POST">
<input type = "hidden" name = "id" class = "id">
<div class ="form-group">
<label>Name</label>
<select name = "name" class = "form-control" id = "nmae">
<option value =""selected></option>
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
<input type="date" name="s_date" class="form-control" placeholder="Enter Start Date Reserve">
	</div>
  <div class = "form-group">
<label>End Date Reserve</label>
<input type = "date" name = "e_date" class  = "form-control" placeholder = "Enter  End Date Reserve">
</div>
<div class = "form-group">
<label>Description</label>
<textarea name = "desc" class = "form-control" id = "desc"></textarea>
</div>
<div class="form-group">
<label for="room">Room</label>
<select name = "room" id = "room" class = "form-control">
<?php
$sql_room = "SELECT * FROM room";
$room_query = $db->query($sql_room);
while($rr = $room_query->fetch_assoc()){
   echo "
        <option value = '".$rr['room_ID']."'>".$rr['name']."</option>
   ";
}
?>
</select>
</div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
<button type="submit" name = "save" class="btn btn-outline"><i class = "fa fa-save"></i> Save</button>
</form>

</div>
</div>
</div>
</div>


<div class="modal modal-success fade" id="edit">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><i class = "fa fa-edit"></i> Update Reservation  </h4>
</div>
<div class="modal-body">
<!--  form method -->
<form action = "edit_room.php" role = "form" method = "POST">
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
<form action = "deleteReserve.php" method = "POST">
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








  <?php //? ----- Author: Austin Maps ------ ?>
  <div class="modal modal-success fade" id="addemail">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class = "fa fa-envelope"> Send Email</i></h4>
      </div>
      <div class="modal-body">

      <!-- form here -->

    <!-- /.box-header -->
    <div class="box-body">
    <form action = "../admin/server/send_email.php" method = "POST">
    <div class="form-group">
        <input type = "email" class="form-control" name = "send_to" placeholder="To:">
      </div>
      <div class="form-group">
        <input type ="text" name = "subject" class="form-control" placeholder="Subject:"required>
      </div>
      <div class="form-group">
            <textarea id="compose-textarea" name = "message" required placeholder = "Type Message Here" class="form-control" style="height: 300px"></textarea>
           
      </div>




    </div>
    <!-- /.box-body -->
  
    <!-- /.box-footer -->

      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
        <button type="submit" name = "submit" class="btn btn-primary"><i class = "fa fa-send"></i> Send</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  </div>
