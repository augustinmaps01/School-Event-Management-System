<?php include 'session.php'; ?>
<?php 

if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $query = mysqli_query($db, "DELETE FROM evaluation_questionaire WHERE id = '$id'") 
    or die(mysqli_error($db));

   header("location:../Event_evaluationQuestion.php?success=delete");
}

?>