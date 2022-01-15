<?php include 'session.php'; ?>
<?php 

if(isset($_POST['add_question'])){
    $eval_type = $_POST['eval_type'];
    $qtype = $_POST['qtype'];
   $quest = $_POST['question'];

mysqli_query($db, "INSERT INTO evaluation_questionaire(question_type_ID, question, eval_type_id)VALUES('$qtype', '$quest', '$eval_type')") or die(mysqli_error($db));
    header("location:../Event_evaluationQuestion.php");
}

if(isset($_POST['edit'])){
    $id  = $_POST['id'];
    $eval = $_POST['eval_type'];
    $qtype = $_POST['qtype'];
    $quest = $_POST['edit_question'];
    mysqli_query($db,"UPDATE evauluation_questionaire SET question_type_ID ='$qtype', 
                      question = '$quest', eval_type_id = '$eval' WHERE questionaire_id = '$id'");
}

?>