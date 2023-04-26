<?php 
include('../dbcon.php');
 $id=$_GET['ID'];
 $ay=$_GET['AY'];
 $status="Complete";
 mysqli_query($con,"Update Evaluation set status='$status' where course_code='$id' AND acc_year='$ay'")or die(mysql_error());
?>	<script>windows: location='viewgrade.php?ID=<?php echo $id;?>'</script>;