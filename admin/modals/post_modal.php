   <div class="modal modal-primary fade" id="post<?php echo $row['event_id']; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Post event</h4>
              </div>

              <div class="modal-body">
              <form action = "server/post.php" method = "POST">
                <input  id = "acc_id" type ="text" name = "sid" class = "id" value = "<?php echo $_SESSION['Account_ID']; ?>" hidden =""> 
               <input id = "eventid" type ="text" name ="event_id" class = "id" value ="<?php echo $row['event_id']; ?>" hidden ="">
              <div class = "form-group">
              <textarea name = "message" class = "form-control" placeholder = "Enter A Post Message"></textarea>
              </div>





          
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button id = "submit" type="submit" name ="post" class="btn btn-primary">Post</button>
              </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>