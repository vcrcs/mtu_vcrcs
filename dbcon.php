<?php
$con=mysqli_connect('localhost','root','','vcrcs');
if(!$con){
die("not connected".mysqli_error());
}
mysqli_select_db($con,'vcrcs');

?>