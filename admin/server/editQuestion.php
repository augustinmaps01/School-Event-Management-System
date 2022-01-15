<?php include 'session.php';

?>
 <?php 
 
  if(isset($_POST['edit'])){
    $eval = $_POST['eval_type'];
    $qtype = $_POST['qtype'];
    $id = $_POST['id'];
    $ques = $_POST['question'];
    $query = mysqli_query($db, "UPDATE evaluation_questionaire SET question_type_ID= '$qtype',
     question = '$ques', eval_type_id = '$eval' WHERE id = '$id'");
  }
  header("location:../Event_evaluationQuestion.php?edit=successfully");

 ?>
