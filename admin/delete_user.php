<?php
include('dbcon.php');
$get_id=$_GET['id'];
mysqli_query("delete from user where user_id='$get_id'")or die(mysqli_error());
header('location:user.php');
?>
