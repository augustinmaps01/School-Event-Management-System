<div class="modal modal-success fade" id="add">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class = "fa fa-calendar"></i> Add Event  </h4>
              </div>
              <div class="modal-body">
              
             <form action = "addEvent.php" method = "POST">
             <input type = "hidden" name = "event_id" class = "id">
             <div class = "form-group">
<label>Proposed By:</label>
<select name = "propose" id = "propose" class = "form-control"required> 
<option value = ""selected></option>
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
             <textarea class = "form-control" name = "desc" placeholder = "description"></textarea>
            
             </div>
             <div class = "form-group">
             <label>Event Title</label>
             <input type = "text" name = "title" class = "form-control" placeholder = "Enter Event Title">
             </div>
             <div class = "form-group">
             <label>Date</label>
             <input type = "date" name = "date" class = "form-control" placeholder = "Enter Date">
             </div>
             <div class = "form-group">
             <label>Start Time</label>
             <input type="time" name = "time" class = "form-control" placeholder = "Enter Start Time">
             </div>
             <div class = "form-group">
             <label>End Time</label>
             <input type = "time" mame = "tiime2" class = "form-control" placeholder = "Enter End Time">
             </div>
             <div class = "form-group">
             <label>Venue</label>
             <select name = "venue" class = "form-control" placeholder = "Choose Venue" required>
             <option value = "Mo.Ignacian Gymnasium">Mo.Ignacian Gymnasium</option>
             <option value = "Review Center">Review Center</option>
             <option value = "Audio Visual Room 1">Audio Visual Room 1</option>
             <option value ="Audio Visual Room 2">Audio Visual Room 2</option>
             <option value ="Nursing Lab">Nursing Lab</option>
             <option value ="Computer Lab">Computer Lab</option>
             <option value ="Outside Campus">Outside Campus</option>
             </select>
             </div>

             <div class = "form-group">
             <label>Type</label>
             <select class = "form-control" name="type" id="type" placeholder = "Choose Type">
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
<option value = "SportClub Only">SportsClub Only</option>
<option value = "Mo.Ignacia Club Only">Mo. Ignacia Club Only</option>
<option value = "Society & Cultural Club">Society & Cultusral Club</option>
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
            <!-- /.modal-content -->
          </div>
        </div>

        <!-- update events-->
   
<div class="modal modal-success fade" id="edit<?php echo $row['event_id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class = "fa fa-edit"></i> Update Event</h4>
      </div>
      <div class="modal-body">


      <form action = "editEvent.php" role = "form" method = "POST">
      <input type = "hidden" name = "id" class = "id" value = "<?php echo $row['event_id']; ?> ">
     <div class = "form-group">
     
     <label>Description</label>
     <textarea name = "desc"  class = "form-control"   placeholder = "description"><?php echo $row['description']; ?></textarea>
   
     </div>
     <div class = "form-group">
     <label>Event Title</label>
     <input type = "text" name = "title" class = "form-control" value = "<?php echo $row['title']; ?>" placeholder = "Enter Event Title">
     </div>
     <div class = "form-group">
     <label>Date</label>
     <input type = "date" name = "date" class = "form-control" value = "<?php echo $row['Date']; ?>" placeholder = "Enter Date">
     </div>
     <div class = "form-group">
     <label>Start Time</label>
     <input type="time" min = "7:00" max ="19:00" required name = "start_time" class = "form-control" value = "<?php echo $row['start_time']; ?>" placeholder = "Enter Time">
     <span class ="visibilty"> </span>
     </div>
     <div class = "form-group">
     <label>End Time</label>
     <input type="time" min = "7:00" max ="19:00" required name = "end_time" class = "form-control" value = "<?php echo $row['end_time']; ?>" placeholder = "Enter Time">
     <span class ="visibilty"> </span>
     </div>
     <div class = "form-group">
     <label>Venue</label>
     <select name = "venue" class = "form-control" placeholder = "Choose Venue" required>
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
     <select class = "form-control" name="type" id="type" placeholder = "Choose Type">
     <option value = "<?php echo $row['type']; ?>"><?php echo $row['type']; ?></option>
     <option value = "College Only">College Only</option>
     <option value = "High School Only">High School Only</option>
     <option value = "All">All</option>
     <option value = "BSIT Only">BSIT Only</option>
     <option value = "BSN Only">BSN Only</option>
     <option value = "BSED Only">BSED Only</option>
     <option value = "BEED Only">BEED Only</option>
     <option value = "BSBA Only">BSBA Only</option>
     <option value = "BSHRM Only">BSHRM Only</option>
     <option value = "BSCRIM Only">BSCRIM Only</option>
     <option value = "BSSW Only">BSSW Only</option>
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
                              <!-- /.box-header -->

                              <div class="modal modal-danger fade" id="delete<?php echo $row['event_id']; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class = "fa fa-trash"></i> Delete Event</h4>
              </div>
              <div class="modal-body">
              <input type = "hidden" name = "id" class = "id">
              <p style = "text-align:center; font-size:20px;">Do you want to Delete this Event</p>
              <h2 class = "text-center"><?php echo $row['title'] ?></h2>
              </div>
              <div class="modal-footer">
                <button type="button"  class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                <a href = "deleteEvent.php?id=<?php echo $row['event_id']; ?>" class = "btn btn-danger"><i class = "fa fa-trash"></i>Delete </a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

       
    