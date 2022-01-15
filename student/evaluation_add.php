<?php 
include 'pattern.php';
include 'session.php'; ?>
<?php 



if(isset($_POST['submit'])){
    $stud_id = $_POST['stud_id'];
    $title = $_POST['title'];
 
    $eval_type = $_POST['eval'];

    $sql = "SELECT * FROM studentevent_evaluation WHERE stud_id = '$stud_id' AND event_id = '$title' AND Eval_type_id = '$eval_type'";
    $query = $db->query($sql);
 if($query->num_rows > 0 ){
    $_SESSION['error'] = 'You have already Evaluated this Event';
 }else{
   if(count($_POST) == 0){
       $_SESSION['error'][] = 'Please Complete this evaluationn form';
   }
   else{
    $_SESSION['post'] = $_POST;
    
    $sql2 = "SELECT * FROM evaluation_questionaire  ORDER BY question_type_ID ASC";
    
    $query2 = $db->query($sql2);
    $error = false;
    $sql_arr = array();
    while($row2 = $query2->fetch_assoc()){
        $question = pattern($row2['question']);
        $id = $row2['id'];   
        if(isset($_POST[$question])){
        foreach($_POST[$question] as $key => $values){
            $sql_array[] = "INSERT INTO Studentevent_evaluation
            (stud_id, event_id, answer_id, questionaire_id, Eval_type_id)
             VALUES('$stud_id', '$title', '$values', '$id', '$eval_type')"; 
        }
        $answer = $_POST[$question];
        $sql_array[] = "INSERT INTO Studentevent_evaluation
        (stud_id, event_id, answer_id, questionaire_id, Eval_type_id)
         VALUES('$stud_id', '$title', '$answer', '$id', '$eval_type')";   
    }
        }    
      if(!$error){
          foreach($sql_array as $sql_row){
              $db->query($sql_row);

          }
          unset($_SESSION['post']);
          $_SESSION['success'] = 'Succesfully Submited';
      }
}


 }

}

else{
    $_SESSION['error'][] ='Fill up the following Question first';
}
header("location:evaluation.php"); 
?>