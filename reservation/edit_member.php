<?php include 'session.php'; ?>
<?php

//?-- ---------Author Austin Maps---------------- 
if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $id_num = $_POST['id_num'];
    $first = $_POST['fname'];
    $middle = $_POST['mname'];
    $last = $_POST['lname'];
    $add = $_POST['address'];
    $contact = $_POST['contact'];
    $type = $_POST['type'];

    $query = mysqli_query($db, "UPDATE members SET ID_Number = '$id_num', firstname = '$first',
     middlename = '$middle', lastname = '$last', Address = '$add', Contact_no = '$contact', 
      Type = '$type' WHERE member_id = '$id'") or die(mysqli_error($db));
    header("location:member.php?edit=success");
}

?>