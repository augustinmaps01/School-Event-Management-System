<?php include 'session.php'; ?>
<?php
if(isset($_POST['id'])){
    $id = $_POST['id'];


   $sql = " SELECT evaluation_type.type as types, question_type.type, evaluation_questionaire.question_type_ID, evaluation_questionaire.id,
               evaluation_questionaire.question FROM evaluation_questionaire 
               LEFT JOIN question_type ON question_type.qus_type_ID = 
               evaluation_questionaire.question_type_ID LEFT JOIN evaluation_type ON evaluation_questionaire.eval_type_id = evaluation_type.id WHERE evaluation_questionaire.id = '$id' ";
$query= $db->query($sql);
$row = $query->fetch_assoc();
 
echo json_encode($row);
}

?>