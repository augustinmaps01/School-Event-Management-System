<?php //? ----- Author: Austin Maps ------ ?>

<?php //? ----- Author: Austin Maps ------ ?>

<div class="modal modal-success fade" id="add">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><i class = "fa fa-user-plus"></i> Add Member</h4>
</div>
<div class="modal-body">
<div class="box-body">
<div class = "form-group">
<form action = "addMember.php" method = "POST" role = "form-group" enctype='multipart/form-data'>
<label for = "fname">ID Number </label>
<input type = "text" name = "id_num" class = "form-control" id = "id_num" placeholder = "Enter ID Number">
</div>
<div class = "form-group">
<label>Firstname</label>
<input type = "text" name = "fname" class = "form-control" id = "fname" placeholder = "Enter Firstname">
</div>
<div class = "form-group">
<label for = "mname">Middlename</label>
<input type= "text" name = "mname" class = "form-control" id = "mname" placeholder = "Enter Middlename">
</div>
<div class="form-group">
<label for="lname">Lastname</label>
<input type="text" class="form-control" name = "lname" id="lname" placeholder="Enter Lastname">
</div>
<div class = "form-group">
<label>Address</label>
<input type = "text" name = "address" class = "form-control" id = "address" placeholder = "Enter Address">
</div>
<div class="form-group">
<label for="con">Contact no.</label>
<input type="text" class="form-control"name = "contact" id="contac" placeholder="Enter  Contact #">
</div>
<div class = "form-group">
<label for = "type">Member Type</label>
<select name = "type" class ="form-control" id = "type">
<option value = ""></option>
<option value = "Student Representative<">Student Representative</option>
<option value = "Faculty">Faculty</option>
<option value ="Program Dean">Program Dean</option>
</select>
</div>
</div>
<!-- /.box-body -->
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary" name = "save"><i class = "fa fa-save"></i> Save</button>
</form>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>



<!--update -->





<div class="modal modal-success fade" id="edit<?php echo $row['member_id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class = "fa fa-edit"></i> Update Student</h4>
      </div>
      <div class="modal-body">
      <form action = "editMember.php" method = "POST" role="form" enctype = "multipart/form-data">
      <input type="hidden" class="id" name="id" value = "<?php  echo $row['member_id']; ?>">
      <div class="box-body">  
      <div class = "form-group">
        <label for="id_num">ID Number</label>
        <input type="text" class = "form-control" id = "id_num" name = "id_num" value = "<?php echo $row['ID_Number']; ?>" placeholder = "Enter ID Number">
        </div>
    
        <div class = "form-group">
        <label for="fname">Firstname</label>
        <input type="text"class = "form-control" id = "edit_fname" name = "fname" value = "<?php echo $row['firstname']; ?>" placeholder = "Enter Firstname">
        </div>
        <div class = "form-group">
        <label for="mname">Middlename</label>
        <input type="text" name="mname" id="edit_mname" class = "form-control" value = "<?php echo $row['middlename']; ?>" placeholder = "Enter Midddlename">
        </div>
        <div class = "form-group">
        <label for="lname">Lastname</label>
        <input type="text" name = "lname" id = "edit_lname" class = "form-control" value = "<?php echo $row['lastname']; ?>">
        </div>
        <div class ="form-group">
        <label for = "address">Address</label>
        <input type ="text" name = "address" class ="form-control" id ="address" value ="<?php echo $row['Address']; ?>">
        </div>
        <div class ="form-group">
        <label for = "contact">Contact No.</label>
        <input type = "text" name = "contact" class ="form-control" id = "contact" value = "<?php echo $row['Contact_no']; ?>">
        </div>


        <div class = "form-group">
        <label>Member Type</label>
        <select name = "type" class = "form-control" id = "type">
        <option value = "<?php echo $row['Type']; ?>"><?php echo $row['Type']; ?> </option>
        <option value = "Student Representative">Student Representative </option>
        <option value = "Faculty">Faculty</option>
        <option value ="Program Dean">Program Dean</option>

        </select>
        </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
        <button type="submit"name = "edit" class="btn btn-outline"><i class = "fa fa-save"></i> Save</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
