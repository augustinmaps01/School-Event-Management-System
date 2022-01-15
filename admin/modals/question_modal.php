<!-- add question -->
<div class="modal modal-primary fade" id="add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class = "fa fa-question"></i> Add  Survey Question</h4>
      </div>
      <div class="modal-body">
      <form action = "server/addQuestion.php" id = "frmbox" method = "POST" role="form" enctype = "multipart/form-data" onsubmit = return formSubmit();>
      <div class="box-body">  
      <div class = "form-group">
      <label>Evaluation Type</label>
      <select id = "eval_tpye" class = "form-control" name = "eval_type">
      <option value = ''>-----Choose Evaluation type---------</option>
      <?php
      $sql = "SELECT * FROM evaluation_type";
      $query = $db->query($sql);
      while($erow = $query->fetch_assoc()){
        echo "
   
        <option value = '".$erow['id']."'>".$erow['type']."</option>
        ";
      }
      ?>
      </select>
      </div>
        <div class = "form-group">
          <label>Question Type</label>
          <select name = "qtype" class = "form-control" id = "qtype" required>
          <option value = "">----Select Question Category------</option>
          <?php
          $query = "SELECT * FROM question_type";
          $result = $db->query($query);
          while($qrow = $result->fetch_assoc()){
            echo "
             <option vaLue = '".$qrow['qus_type_ID']."'>".$qrow['type']."</option>
            
            ";
          }
          ?>
          </select>
          <br>
          <label>Your Question Survery</label>
          <input type = "text" name = "question" class = "form-control" required placeholder = "Emter A question Here">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
        <button type="submit"name = "add_question" class="btn btn-outline"><i class = "fa fa-save"></i> Save</button>  
        </form>
      </div>
    </div>
  </div>
</div>
<!--update -->






<div class="modal modal-primary fade" id="delete">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title"><i class = "fa fa-trash"></i> Delete Event Attendance</h4>
</div>
<div class="modal-body">
<form class = "form-horizontal" action = "server/deleteQuestion.php" method = "POST">
<p style = "text-align:center; font-size:20px;">Do you want to Delete this Question</p>
</div>
<div class="modal-footer">
<button type="button"  class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
<button type="submit"name = "delete" class="btn btn-outline"><i class = "fa fa-trash"></i> Save</button>  
</form>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
