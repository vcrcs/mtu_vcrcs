<?php
include('dbcon.php');
$get_id=$_GET['id'];
mysqli_query($con,"delete from course where course_id='$get_id'")or die(mysqli_error());
header('location:course.php');
?>