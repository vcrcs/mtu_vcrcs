<?php 
$id = $_GET["IDD"];
include('../dbcon.php');
$aben=mysql_query("Select * from materialupload where mat_code='$id'") or die(mysql_error());
$kalo=mysql_fetch_array($aben);
$code=trim($kalo['course_code']);
$query=mysql_query("Delete from materialupload where mat_code='$id'") or die(mysql_error());
header('location:managematerial.php?ID='.$code.'');
?>