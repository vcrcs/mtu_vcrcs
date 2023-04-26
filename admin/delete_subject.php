<?php
include('dbcon.php');
$get_id=$_GET['id'];
mysqli_query("delete from subject where subject_id='$get_id'")or die(mysqli_error());
header('location:subject.php');
?>
