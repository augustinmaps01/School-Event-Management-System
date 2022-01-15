<?php
include 'connect.php';

session_start();
$user_check =$_SESSION['login_user'];

$sql = mysqli_query($db, "SELECT * FROM user_info WHERE School_ID = '$user_check'");
$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
$_SESSION['id'] = $row['userinfo_id'];
$_SESSION['Firstname'] = $row['fname'];
$_SESSION['Lastname'] = $row['lname'];
$_SESSION['Account_ID'] = $row['School_ID'];
$_SESSION['photo'] = $row['image'];


if(!isset($_SESSION['login_user'])){
    header("location:../index.php");
}
?>