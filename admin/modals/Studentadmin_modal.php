<?php //? ----- Author: Austin Maps ------ ?>


<!--update -->


<div class="modal modal-primary fade" id="edit<?php echo $row['userinfo_id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class = "fa fa-edit"></i> Update Student admin</h4>
      </div>
      <div class="modal-body">
      <form action = "server/edit_admin.php" method = "POST" role="form" enctype = "multipart/form-data">
      <input type="hidden" class="id" name="id" value = "<?php echo $row['userinfo_id']; ?>">
      <input type="hidden" class="id" name="id2" value = "<?php echo $row['Account_ID']; ?>">
      <div class="box-body">  
      <div class = "form-group">
        <label for="acc_id">Account ID</label>
        <input type="text" class = "form-control" id = "acc_id" name = "a_id" value = "<?php  echo $row['School_ID']; ?>">
        </div>
        <div class="form-group">
<label for="pass">Password</label>
<input type="password" class="form-control"name = "pass" id="pass" value="<?php echo $row['Password']; ?>"required>
</div>
        <div class = "form-group">
        <label for="fname">Firstname</label>
        <input type="text"class = "form-control" id = "edit_fname"  name = "fname" value = "<?php  echo $row['fname'];?>" placeholder = "Enter Firstname">
        </div>
        <div class = "form-group">
        <label for="mname">Middlename</label>
        <input type="text" name="mname" id="edit_mname"  class = "form-control" value = "<?php echo $row['mname']; ?>" placeholder = "Enter Midddlename">
        </div>
        <div class = "form-group">
        <label for="lname">Lastname</label>
        <input type="text" name = "lname" id = "edit_lname"  class = "form-control" value = "<?php echo $row['lname']; ?>" placeholder = "Enter Lastname">
        </div>
        <div class = "form-group">
        <label>Course</label>
        <select name = "course" id = "course" class = "form-control">
        <option value = "<?php echo $row['course']; ?>"><?php echo $row['course']; ?></option>
        <option value="BSIT">BSIT</option>
        <option value="BSBA">BSBA</option>
        <option value="BSHRM">BSHRM</>
        <option value="BSSW">BSSW</option>
        <option value="BSED">BSED</option>
        <option value="BEED">BEED</option>
        <option value="BSCRIM">BSCRIM</option>
        <option value="BSA">BSA</option>
        </select>
        </div>

        <div class = "form-group">
        <label>Year Level</label>
        <select name = "yl" id = "yl" class = "form-control">
        <option value = "<?php echo $row['year_level'] ?>"><?php echo $row['year_level']; ?></option>
        <option value = "1">1</option>
        <option value = "2">2</option>
        <option value = "3">3</option>
        <option value = "4">4</option>
        </select>
        </div>

        <div class = "form-group">
        <label>Gender</label>
        <select name = "gender" class = "form-control" id = "gender">
        <option value = "<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
        <option value = "Male">Male</option>
        <option value = "Female">Female</option>

        </select>
        </div>
        <div class = "form-group">
        <label>School Club</label>
        <select name = "club" class = "form-control" id ="club" required>
        <option value = "<?php echo $row['Club_name']; ?>"> <?php echo $row['Club_name']; ?></option>
        <option value = "Sports Club">Sports Club</option>
<option value = "Mo.Ignacia Club">Mo. Ignacia Club</option>
<option value = "Society & Cultural Club">Society & Cultural Club</option>
<option value = "Peer Facilatator Club">Peer Facilatator Club</option>
        </select>
        </div>
        <div class = "form-group">
<label>Email</label>
<input type = "email" name = "email" class = "form-control" value ="<?php echo $row['email']; ?>">
</div>
<div class = "form-group">
<label>Mobile #</label>
<input type = "text" name = "mobile" class = "form-control"  value = "<?php  echo $row['mobile']; ?>">
</div>
    

      <div class="form-group">
          <label for="photo">Choose Photo</label>
          <input type="file" id="edit_file" name = "file"  value = "<?php echo $row['image']; ?>" placeholder = "Choose Profile Picture">
        </div>
      </div>
      <!-- /.box-body -->
      <!-- /.box-body -->
   
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


<div class="modal modal-primary fade" id="delete<?php  echo $row['userinfo_id']; ?>">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><i class = "fa fa-trash"></i> Delete User Admin</h4>
</div>
<div class="modal-body">

<input type="hidden" class="id" name="id">
<p style = "text-align:center;z font-size:20px;">Do you want to Delete this User Admin</p>
<h2 class="text-center"><?php echo $row['fname'].' '.$row['lname']; ?></h2>
</div>
<div class="modal-footer">
<button type="button"  class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
<a href="server/del_admin.php?id=<?php echo $row['userinfo_id']; ?>&accountid=<?php echo $row['Account_ID']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

