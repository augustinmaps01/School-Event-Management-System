
<div class="modal fade" id="status<?php echo $row['reservation_id']; ?>">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><i class = "fa fa-trash"></i> Confirm Status</h4>
</div>
<div class="modal-body">
<form action = "update_status.php" method = "POST">
<input type="hidden"  class = "id" name="id">
<div class = "form-group">
    <input type = "radio" checked name = "status" value = "<?php echo $row['status']; ?>">  <?php echo $row['status']; ?>
</div>
<div class = "form-group">
<input type="radio"  name="status" value = "Approved">  Approved
</div>
<div class = "form-group">
<input type="radio" name="status" value = "Cancelled">  Cancelled
</div>

</div>

<div class="modal-footer">
<button type="button"  class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
<button type="submit" class="btn btn-primary btn-flat" name="confirm_status"><i class="fa fa-trash"></i> Delete</button>
</form>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

