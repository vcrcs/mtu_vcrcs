<?php
include('dbcon.php');
$get_id=$_GET['id'];

mysqli_query($con,"delete from student where student_id='$get_id'")or die(mysqli_error());
header('location:student.php');

?>