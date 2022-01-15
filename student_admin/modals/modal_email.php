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
