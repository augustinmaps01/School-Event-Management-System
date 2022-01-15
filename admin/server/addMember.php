<?php include 'session.php'; ?>
<?php 
//!-- ---------Author Austin Maps---------------- 
if(isset($_POST['save'])){
    $id = $_POST['id_num'];
    $first = $_POST['fname'];
    $middle = $_POST['mname'];
    $last = $_POST['lname'];
    $addr = $_POST['address'];
    $contact = $_POST['contact'];
    $member_type = $_POST['type'];

$query = mysqli_query($db,"INSERT INTO members(member_id, ID_Number, firstname, middlename, lastname, Address, Contact_no, Type)
                  VALUES('', '$id', '$first', '$middle', '$last', '$addr', '$contact', '$member_type')") or die(mysqli_error($db));
                  header("location:../member.php?save=success");
}
mysqli_close($db);
?>