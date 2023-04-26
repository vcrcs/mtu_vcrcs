<?php
$recive_from=$_GET['hide'];
include('../dbcon.php');
include('../session.php');
$quer= "SELECT * FROM Account WHERE user_id='$session_id'";
$resul = mysqli_query($con,$quer)or die(mysqli_error());
$roww = mysqli_fetch_array($resul);
$user_email=$roww["e_mail"];	
	
$message=$_GET['message'];
$subject="Message of Chat";
$date = date("Y-m-d h:m:s");
$status_from="Sent";
$status_to="New";
$image_name =" ";

mysqli_query($con,"insert into mail(date,send_from,send_to,subject,content,attachment,status_from,status_to) values('$date','$user_email','$recive_from','$subject','$message','$image_name','$status_from','$status_to')")or die(mysqli_error());					 
echo "<script>windows: location='index.php'</script>";
?>	