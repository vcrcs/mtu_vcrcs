<?php 
$id = $_GET["ID"];
include('../dbcon.php');
$aben=mysqli_query($con,"Select * from Submit where assignment_id='$id'") or die(mysqli_error());
$kalo=mysqli_fetch_array($aben);
$code=$kalo['course_code'];
$query=mysqli_query($con,"Delete from submit where assignment_id='$id'") or die(mysqli_error());
header("location:manageassignment.php?ID=".$code."");
?>