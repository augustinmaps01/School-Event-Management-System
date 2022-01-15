
<?php //? ----- Author: Austin Maps ------ ?>
<!-- delete Attendance -->
<div class="modal modal-primary fade" id="delete<?php echo $row['id']; ?>">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><i class = "fa fa-trash"></i> Delete Event Attendance</h4>
</div>
<div class="modal-body">
<input type = "hidden"name = 'id' class = "id">
<p style = "text-align:center; font-size:20px;">Do you want to Delete Attendance on <?php echo $row['Event_Title']; ?> </p>
<h2 class="text-center"><?php echo $row['first']. " ".$row['last']; ?></h2>
</div>
<div class="modal-footer">
<button type="button"  class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
<a href = "server/delete_attendance.php?id=<?php echo $row['id']; ?>"  class  = "btn btn-danger"><i class = "fa fa-trash"></i> Delete</a>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

