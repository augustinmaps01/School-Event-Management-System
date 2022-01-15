<?php //? ----- Author: Austin Maps ------ ?>
<!--  Add Student -->
<div class="modal modal-primary fade" id="add">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><i class = "fa fa-user"></i> Add Student </h4>
</div>
<div class="modal-body">
<form action = "server/add_student.php" method = "POST" id = "form_data" role="form" enctype="multipart/form-data">
<div class="box-body">
<div class="form-group">
<label for="idn">Student ID</label>
<input type="text" class="form-control" id="sid" name = "s_id" placeholder="Enter ID Number"required>
</div>
<div class="form-group">
<label for="pwd">Password</label>
<input type="password" class="form-control" id="pwd" name = "pwd" placeholder="Enter Password" required>
</div>
<div class = "form-group">
<label for="fname">Firstname</label>
<input type="text"class = "form-control" id = "fname" name = "fname" placeholder = "Enter Firstname">
</div>
<div class = "form-group">
<label for="mname">MiddleInitial</label>
<input type="text" name="mname" id="mname" class = "form-control" placeholder = "Enter Midddlename">
</div>
<div class = "form-group">
<label for="lname">Lastname</label>
<input type="text" name = "lname" class = "form-control"   placeholder = "Enter Lastname">
</div>
<div class = "form-group">
<label for="course">Course</label>
<select name="course" id="course" class = "form-control" placeholder = "Choose Course">
<option value = "None">None</option>
<option value="BSIT">BSIT</option>
<option value="BSBA">BSBA</option>
<option value="BSHRM">BSHRM</option>
<option value="BSSW">BSSW</option>
<option value="BSED">BSED</option>
<option value="BEED">BEED</option>
<option value="BSCRIM">BSCRIM</option>
<option value="BSA">BSA</option>
<option value="BSN">BSN</option>
</select>
</div>
<div class = "form-group">
<label for="yl">Year Level</label>
<select name="yl" id="yl" class = "form-control" placeholder = "Choose Year Level">
<option value = "None">None</option>
<option value = ""></option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
</select>
</div>
<div class = "form-group">
<label for="gen">Gender</label>
<select name="gender" id="gen" class = "form-control">
<option value = "">----Select Gender------</option>
<option value="Male">Male</option>
<option value="Female">Female</option>

</select>
</div>
<div class = "form-group">
<label>School Club</label>
<select name  = "club" class = "form-control" id = "club" required>
<option value = "" selected>--Select Club----</option>
<option value = "Sports Club">Sports Club</option>
<option value = "Mo.Ignacia Club">Mo. Ignacia Club</option>
<option value = "Society & Cultural Club">Society & Cultural Club</option>
<option value = "Peer Facilatator Club">Peer Facilatator Club</option>
</select>

</div>
<div class = "form-group">
<label for="email">Email</label>
<input type="email" name = "email" class = "form-control" id = "email" placeholder = "Enter Email">
</div>
<div class = "form-group">
<label for="mbl">Mobile No.</label>
<input type = "text"name = "mbl"class = "form-control"  id = "mbl" placeholder = "Enter Mobile No.">
</div>
<div class="form-group">
<label for="photo">Choose Photo</label>
<input type="file" id="file" name = "file" placeholder = "Choose Profile Picture">
<span id = "user_uploaded_image"></span>
</div>
</div>
<!-- /.box-body -->
<!-- /.box-body -->
</div>
<div class="modal-footer">
<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
<button type="submit" name = "save" class="btn btn-outline"><i class = "fa fa-save"></i> Save</button>
</div>
</div>
</form>
<!-- /.modal-content -->
</div>
</div>
<!--  Update Student-->
<div class="modal modal-primary fade" id="edit_<?php echo $row['userinfo_id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class = "fa fa-edit"></i> Update Student</h4>
      </div>
      <div class="modal-body">
      <form action = "server/edit_student.php" method = "POST" role="form" enctype = "multipart/form-data">
      <input type="hidden" class="id" name="id" value = "<?php echo $row['userinfo_id']; ?>">
      <input type="hidden" class="id" name="id2" value = "<?php echo $row['Account_ID']; ?>">
      <div class="box-body">  
    
      <div class="form-group">
    <label for="idn">Student ID</label>
  <input type="text" class="form-control" id="sid" name = "edit_id"  value ="<?php echo $row['School_ID']; ?>"required>
     </div>
      <div class="form-group">
    <label for="pwd">Password</label>
       <input type="password" class="form-control" id="pwd" name = "edit_pwd" value="<?php echo $row['Password']; ?>" required>
       </div>

        <div class = "form-group">
        <label for="fname">Firstname</label>
        <input type="text"class = "form-control" id = "edit_fname"  name = "fname" value = "<?php  echo $row['fname'];?>" placeholder = "Enter Firstname">
        </div>
        <div class = "form-group">
        <label for="mname">MiddleInitial</label>
        <input type="text" name="mname" id="edit_mname" class = "form-control"  value = "<?php echo $row['mname']; ?>" placeholder = "Enter Midddlename">
        </div>
        <div class = "form-group">
        <label for="lname">Lastname</label>
        <input type="text" name = "lname" id = "edit_lname" class = "form-control"  value = "<?php echo $row['lname']; ?>" placeholder = "Enter Lastname">
        </div>

        <div class = "form-group">
        <label for="course">Course</label>
        <select name="course" id="edit_course" class = "form-control"  placeholder = "Choose Course">
        <option value = "<?php echo $row['course']; ?>"> <?php echo $row['course']; ?></option>
        <option value  = "None">None</option>
        <option value="BSIT">BSIT</option>
        <option value="BSBA">BSBA</option>
        <option value="BSHRM">BSHRM</option>
        <option value="BSSW">BSSW</option>
        <option value="BSED">BSED</option>
        <option value="BEED">BEED</option>
        <option value="BSCRIM">BSCRIM</option>
        <option value="BSA">BSA</option>
        <option value="BSN">BSN</option>
        </select>
        </div>
        <div class = "form-group">
        <label for="yl">Year Level</label>
        <select name="yl" id="edit_yl" class = "form-control" placeholder = "Choose Year Level">
        <option value = "<?php echo $row['year_level']; ?>"><?php echo $row['year_level']; ?></option>
     <option value  = "None">None</option>
      <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        </select>
        </div>
        <div class = "form-group">
        <label for="gen">Gender</label>
        <select name="gender" id="gen" class = "form-control">
          <option value = "<?php  echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>

</select>
</div>
    <div class = "form-group">
    <label>School Club</label>
    <select name = "club" class = "form-control" id = "club"required>
    <option value = "<?php echo $row['Club_name']; ?>"><?php echo $row['Club_name']; ?></option>
<option value = "Sports Club">Sports Club</option>
<option value = "Mo.Ignacia Club">Mo. Ignacia Club</option>
<option value = "Society & Cultural Club">Society & Cultural Club</option>
<option value = "Peer Facilatator Club">Peer Facilatator Club</option>
</select>
    </div>
      <div class = "form-group">
      <label for="email">Email</label>
      <input type="email" name = "email"id = "edit_email" class = "form-control" id = "email" value = "<?php echo $row['email'] ?>" placeholder = "Enter Email">
      </div>

      <div class = "form-group">
      <label for="mbl">Mobile No.</label>
      <input type = "text" name = "mbl" class = "form-control" p id = "edit_mbl" value = "<?php echo $row['mobile']; ?>" placeholder = "Enter Mobile No.">
      </div>

      <div class="form-group">
          <label for="photo">Choose Photo</label>
          <input type="file" id="edit_file" name = "file"  value = "<?php echo $row['image']; ?>" placeholder = "Choose Profile Picture">
        </div>
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

<!-- Delete Student -->

<div class="modal modal-primary fade" id="delete_<?php  echo $row['userinfo_id']; ?>">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><i class = "fa fa-trash"></i> Delete Student</h4>
</div>
<div class="modal-body">
<input type="hidden" class="id" name="id">
<p style = "text-align:center; font-size:20px;">Do you want to Delete this Student</p>
<h2 class="text-center"><?php echo $row['fname'].' '.$row['lname']; ?></h2>
</div>

<div class="modal-footer">
<button type="button"  class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
<a href="server/delete_student.php?id=<?php echo $row['userinfo_id']; ?>&accountid=<?php echo $row['Account_ID']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

