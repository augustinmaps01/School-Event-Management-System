<?php //? ----- Author: Austin Maps ------ ?>
<div class="modal modal-primary fade" id="edit<?php echo $row['userinfo_id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class = "fa fa-edit"></i> Update Admin Profile</h4>
      </div>
      <div class="modal-body">
      <form action = "server/profile_update.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" method = "POST" role="form" enctype = "multipart/form-data">
      <input type="hidden" class="id" name="id" value = "<?php echo $row['userinfo_id']; ?>">
      <input type = "hidden" class = "id" name= "id2" value = "<?php  echo $row['Account_ID']; ?>"> 
      <div class="box-body">  
      <div class = "form-group">
      <label>Account ID</label>
      <input type= "text" name = "s_id" class = "form-control" value = "<?php echo $row['School_ID']; ?>">
      </div>
      <div class= "form-group">
      <laabel>Password</laabel>
      <input type ="password" name = "password" class = "form-control" value ="<?php echo  $row['Password']; ?>">
      </div>
        <div class = "form-group">
        <label for="fname">Firstname</label>
        <input type="text"class = "form-control" id = "edit_fname" name = "fname" value = "<?php  echo $row['fname'];?>">
        </div>
        <div class = "form-group">
        <label for="mname">MiddleInitial</label>
        <input type="text" name="mname" id="edit_mname" class = "form-control" value = "<?php echo $row['mname']; ?>">
        </div>
        <div class = "form-group">
        <label for="lname">Lastname</label>
        <input type="text" name = "lname" id = "edit_lname" class = "form-control" value = "<?php echo $row['lname']; ?>">
        </div>
        
        <div class = "form-group">
        <label for="gender">Gender</label>
        <select name="gender" id="edit_course" class = "form-control"  placeholder = "Gender">
        <option value = "<?php echo $row['gender']; ?>"> <?php echo $row['gender']; ?></option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>    
        </select>
        </div>
        <div class = "form-group">
        <label>Email</label>
        <input type = "email" name = "email" class = "form-control" value = "<?php echo $row['email']; ?>">
        </div>
        <div class = "form-group">
        <label>Mobile #</label>
        <input type = "text" name = "mobile" class = "form-control" value = "<?php  echo $row['mobile']; ?>"
        </div>
      <div class="form-group">
      <br>
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
