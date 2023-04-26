<?php include('../dbcon.php');?>
<?php
$idd=$_GET['ID'];
mysqli_query($con,"Delete from Schedule where id='$idd'") or die(mysqli_error());
header('location:listofschedule.php');
?>