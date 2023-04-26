<?php 
include('../dbcon.php');
 $id=$_GET['ID'];
 $stu=$_GET['ST'];
 $ay=$_GET['AY'];
 $status="Complete";
 mysqli_query($con,"Update Evaluation set status='$status' where course_code='$id' AND acc_year='$ay' AND stud_id='$stu'")or die(mysqli_error());
?>	<script>windows: location='viewgrade.php?ID=<?php echo $id;?>'</script>;