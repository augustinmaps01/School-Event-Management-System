<?php //? ----- Author: Austin Maps ------ ?>



<!-- Add Event -->

<div class="modal modal-primary fade" id="add">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><i class = "fa fa-calendar"></i> Add Event  </h4>
</div>
<div class="modal-body">
<!--  form method -->
<form action = "server/addEvent.php" role = "form" method = "POST">
<input type = "hidden" class = "id" name= "event_id">
<div class = "form-group">
<label>Proposed By:</label>
<select name = "propose" id = "propose" class = "form-control">
<option value = ""selected></option>
<?php

$sql_select = "SELECT reservation.status, members.firstname, members.lastname, members.middlename, reservation.reservation_id
          FROM reservation LEFT JOIN members ON members.member_id = reservation.member_id WHERE reservation.status = 'Approved'";
$sql_query = $db->query($sql_select);
while($rows = $sql_query->fetch_assoc()){
  echo "
  <option id = 'propose' value = '".$rows['reservation_id']."'>".$rows['lastname']. ', '.$rows['firstname']."</option>
  ";

}          
?>
</select>
</div>
<div class = "form-group">
<label>Description</label>
<textarea id = "desc" class = "form-control" name = "desc" placeholder = "description" required>
</textarea>
</div>
<div class = "form-group">
<label>Event Title</label>
<input type = "text" id = "title" name = "title" class = "form-control" placeholder = "Enter Event Title" required>
</div>
<div class = "form-group">
<label>Date</label>
<input type = "date" id = "date" name = "date" class = "form-control" placeholder = "Enter Date"required>
</div>
<div class = "form-group">
<label>Start Time</label>
<input type="time" id = "start" min = "7:00" max ="19:00" name = "start_time" required class = "form-control" placeholder = "Enter Time">
<span class = "validity"></span>
</div>
<div class = "form-group">
<label>End Time</label>
<input type="time" id = "end" name = "end_time"  max ="19:00" required class = "form-control" placeholder = "Enter Time">
<span class = "validity"></span>
</div>
<div class = "form-group">
<label>Venue</label>
<select  id = "venue" name = "venue" class = "form-control" placeholder = "Choose Venue" required>
<option value = "" ></option>
<option value = "Mo.Ignacian Gymnasium">Mo.Ignacian Gymnasium</option>
<option value = "Review Center" >Review Center</option>
<option value = "Audio Visual Room 1" >Audio Visual Room 1</option>
<option value = "Audio Visual Room 2" >Audio Visual Room 2</option>
<option value = "Nursing Lab">Nursing Lab</option>
<option value = "Computer Lab">Computer Lab</option>
<option value = "Outside Campus"></option>
</select>
</div>

<div class = "form-group">
<label>Type</label>
<select id = "type" class = "form-control" name="type" id="type" placeholder = "Choose Type" required>
<option value = "College Only">College Only</option>
<option value = "High School Only">High School Only</option>
<option value = "All">All</option>
<option value = "BSIT Only" >BSIT Only</option>
<option value = "BSN Only">BSN Only</option>
<option value = "TEP">TEP</option>
<option value = "BSBA Only">BSBA Only</option>
<option value = "BSHRM Only">BSHRM Only</option>
<option value = "BSCRIM Only">BSCRIM Only</option>
<option value = "BSSW Only">BSSW Only</option>
<option value = "BSA Only">BSA Only</option>
<option value = "SportsClub Only">SportsClub Only</option>
<option value = "Mo.Ignacia Club Only">Mo. Ignacia Club Only</option>
<option value = "Society & Cultural Club">Society & Cultural Club</option>
<option value = "Peer Facilatator Club">Peer Facilatator Club</option>


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

<!-- Update Event -->
<!-- ---------Author Austin Maps---------------- -->
<div class="modal modal-primary fade" id="edit">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><i class = "fa fa-edit"></i> Update Event</h4>
</div>
<div class="modal-body">


<form action = "server/edit_event.php" role = "form" method = "POST">
<input type = "hidden" id = "id" name = "id" class = "id">
<div class = "form-group">
<label>Proposed By:</label>
<select name = "propose" id = "propose" class = "form-control"required>
<option value = ""selected id = "edit_proposed"></option>
<?php

$sql_select = "SELECT reservation.status, members.firstname, members.lastname, members.middlename, reservation.reservation_id
          FROM reservation LEFT JOIN members ON members.member_id = reservation.member_id WHERE reservation.status = 'Approved'";
$sql_query = $db->query($sql_select);
while($rows = $sql_query->fetch_assoc()){
  echo "
  <option value = '".$rows['reservation_id']."'>".$rows['lastname']. ', '.$rows['firstname']."</option>
  ";

}          
?>
</select>
</div>

<div class = "form-group">
     
<label>Description</label>
<textarea name = "edit_desc"  class = "form-control"id ="edit_desc"   placeholder = "description" required></textarea>
   
</div>
<div class = "form-group">
<label>Event Title</label>
<input type = "text" name = "edit_title" class = "form-control" id ="edit_title" required placeholder = "Enter Event Title">
</div>
<div class = "form-group">
<label>Date</label>
<input type = "date" name = "edit_date" class = "form-control" id ="edit_date" placeholder = "Enter Date">
</div>
<div class = "form-group">
<label>Start Time</label>
<input type="time" min = "7:00" max ="19:00" required name = "edit_start" class = "form-control" id = "edit_start" placeholder = "Enter Time">
<span class = "visibility"></span>
</div>
<div class = "form-group">
<label>End Time</label>
<input type="time"  max ="19:00" name = "edit_end" class = "form-control" id = "edit_end" required placeholder = "Enter Time">
<span class = "visibility"></span>
</div>
<div class = "form-group">
<label>Venue</label>
<select name = "edit_venue" class = "form-control" placeholder = "Choose Venue" required>
<option value = ""selected id = "edit_venue"></option>
<option value = "Mo.Ignacian Gymnasium">Mo.Ignacian Gymnasium</option>
<option value = "Review Center">Review Center</option>
<option value = "Audio Visual Room 1">Audio Visual Room 1</option>
<option value = "Audio Visual Room 2">Audio Visual Room 2</option>
<option value = "Nursing Lab">Nursing Lab</option>
<option value = "Computer Lab">Computer Lab</option>
<option value = "Outside Campus">Outside Campus</option>
</select>
</div>

<div class = "form-group">
<label>Type</label>
<select class = "form-control" name="edit_type"placeholder = "Choose Type" required>

<option value = ""selected id = "edit_type"></option>
<option value = "College Only">College Only</option>
<option value = "High School Only">High School Only</option>
<option value = "All">All</option>
<option value = "BSIT Only">BSIT Only</option>
<option value = "BSN Only">BSN Only</option>
<option value = "TEP Only">TEP Only</option>
<option value = "BSBA Only">BSBA Only</option>
<option value = "BSHRM Only">BSHRM Only</option>
<option value = "BSCRIM Only">BSCRIM Only</option>
<option value = "BSSW Only">BSSW Only</option>
<option value = "BSA Only">BSA Only</option>
<option value = "SportsClub Only">SportsClub Only</option>
<option value = "Mo.Ignacia Club Only">Mo. Ignacia Club Only</option>
<option value = "Society & Cultural Club">Society & Cultural Club</option>
<option value = "Peer Facilatator Club">Peer Facilatator Club</option>
</select>
</div>


</div>
<div class="modal-footer">
<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
<button type="submit"name = "edit" class="btn btn-outline"><i class = "fa fa-save"></i> Save</button>
</form>
</div>
</div>
</div>
</div>

<!-- Delete Event--> 


<div class="modal modal-primary fade" id="delete">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><i class = "fa fa-trash"></i> Delete Event</h4>
</div>
<form action = "server/delete_event.php" method = "POST">
<div class="modal-body">
<input type = "hidden" name = "id" class = "id">
<p style = "text-align:center; font-size:20px;">Do you want to Delete this Event</p>

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
     