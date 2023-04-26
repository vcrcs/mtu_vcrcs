<?php 
include('../dbcon.php');
 $id=$_GET['ID'];
 $ay=$_GET['AY'];
 $status="Approve";
 mysqli_query($con,"Update Evaluation set status='$status' where course_code='$id' AND acc_year='$ay'")or die(mysqli_error());
?>	<script>windows: location='managegrade.php?I=<?php echo $id;?>&WY=<?php echo $ay;?>'</script>;