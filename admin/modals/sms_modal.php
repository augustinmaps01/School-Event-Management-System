<div class="modal modal-primary fade" id="sms<?php echo $row['reservation_id']; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-envelope" aria-hidden="true"></i> Send Sms</h4>
              </div>
              <div class="modal-body">
                <form  action = "server/reservation_sms.php"  method = "POST">
                <div class = "form-group">
                <label>Your Mobile #</label>
                <input type = "text" name = "mobile" class = "form-control" value = "<?php echo $row['Contact_no']; ?>" placeholder = "Enter Mobile #">
                 
                </div>
                <div class = "form-group">
                <label>Message</label>
                <textarea class = "form-control" name = "message" placeholder = "Enter Message Here"></textarea>
                </div>
              
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="submit" name = "twilio" class="btn btn-primary">Send to Twilio <i class = "fa fa-send"></i></button>
              <button type = "submit" name = "text_local" class = "btn btn-primary">Send to text local <i class = "fa fa-send"></i></button>
              <button type = "submit" name = "sms_gateway" class = "btn btn-primary">Send to SMS Gateway <i class = "fa fa-send"></i></button>
             </div>
           
            </div>
            </form>


        


            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>




        