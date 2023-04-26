<?php
include('dbcon.php');
$get_id=$_GET['id'];
mysqli_query($con,"delete from files where file_id='$get_id'")or die(mysqli_error());
header('location:file.php');
?>
