<?php //? ----- Author: Austin Maps ------ ?>
<?php
session_start();
session_destroy();
header("location:../index.php");
?>