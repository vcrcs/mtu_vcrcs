<?php 
include('../dbcon.php');
 $id=$_GET['ID'];
 $ay=$_GET['AY'];
 $status="Print";
 $q = mysqli_query("SELECT * FROM Evaluation where stud_id='$id' AND acc_year='$ay'")or die(mysqli_error());
 $rr= mysqli_fetch_array($q);
 $year=$rr['year'];
 $semi=$rr['semester'];	
 
 
 
 
 
  $count=0;$cpoint=0;$pt=0;$ct=0;
															$que=mysqli_query($con,"select * from Evaluation where stud_id = '$id' AND year = '$year' AND semester = '$semi'") or die(mysqli_error());
															while($element=mysqli_fetch_array($que)){
																
																$count+=1;
																$course=$element['course_code'];
																$gr=$element['grade'];
																
																$que1=mysqli_query($con,"select * from course where course_code = '$course'") or die(mysqli_error());
																$get_course=mysqli_fetch_array($que1);
																$crhr=$get_course['credit_hour'];
																$ct+=$crhr;
																if($gr=="A" || $gr=="A+" || $gr=="A-"){$cpoint = $cpoint + 4* $crhr; $pt=$pt + 4* $crhr; }
																else if($gr=="B" || $gr=="B+" || $gr=="B-"){$cpoint = $cpoint + 3* $crhr; $pt=$pt + 3* $crhr;}
																else if($gr=="C" || $gr=="C+" || $gr=="C-"){$cpoint = $cpoint + 2 * $crhr; $pt=$pt + 2* $crhr; }
																else if($gr=="D"){$cpoint = $cpoint + 1 * $crhr; $pt=$pt + 1* $crhr; }
																else if($gr=="F"){$cpoint = $cpoint + 0 * $crhr; $pt=$pt + 0* $crhr;}
																else if($gr=="NG"){$cpoint = $cpoint + 0 * $crhr; $pt=$pt + 0* $crhr;}
 
															$pgpa=$pt/$ct;} echo $pgpa;
 
 
 
 
 
 
 if($pgpa>=2){
 mysqli_query($con,"Update Evaluation set status='$status' where stud_id='$id' AND acc_year='$ay'")or die(mysqli_error());
 $qq = mysqli_query($con,"SELECT * FROM Student where stud_id='$id'")or die(mysqli_error());
 $rrr= mysqli_fetch_array($qq);
 $acc_year=$rrr['acadamic_year'];
 $acc_semi=$rr['semester'];
 if($acc_year=='First Year' && $acc_semi=='1st'){
	 $up_semi='2nd';
	 $up_year='First Year';
	 mysqli_query($con,"Update Student set acadamic_year='$up_year', semester='$up_semi' where stud_id='$id'")or die(mysqli_error());
 }
 else if($acc_year=='First Year' && $acc_semi=='2nd'){
	 $up_semi='1st';
	 $up_year='Second Year';
	 mysqli_query($con,"Update Student set acadamic_year='$up_year', semester='$up_semi' where stud_id='$id'")or die(mysqli_error());
 }
 else if($acc_year=='Second Year' && $acc_semi=='1st'){
	 $up_semi='2nd';
	 $up_year='Second Year';
	 mysqli_query($con,"Update Student set acadamic_year='$up_year', semester='$up_semi' where stud_id='$id'")or die(mysqli_error());
 }
 else if($acc_year=='Second Year' && $acc_semi=='2nd'){
	 $up_semi='1st';
	 $up_year='Third Year';
	 mysqli_query($con,"Update Student set acadamic_year='$up_year', semester='$up_semi' where stud_id='$id'")or die(mysqli_error());
 }
 else if($acc_year=='Third Year' && $acc_semi=='1st'){
	 $up_semi='2nd';
	 $up_year='Third Year';
	 mysqli_query($con,"Update Student set acadamic_year='$up_year', semester='$up_semi' where stud_id='$id'")or die(mysqli_error());
 }
 else if($acc_year=='Third Year' && $acc_semi=='2nd'){
	 $up_semi='1st';
	 $up_year='Fourth Year';
	 mysqli_query($con,"Update Student set acadamic_year='$up_year', semester='$up_semi' where stud_id='$id'")or die(mysqli_error());
 }
 else if($acc_year=='Fourth Year' && $acc_semi=='1st'){
	 $up_semi='2nd';
	 $up_year='Fourth Year';
	 mysqli_query($con,"Update Student set acadamic_year='$up_year', semester='$up_semi' where stud_id='$id'")or die(mysqli_error());
 }
 else if($acc_year=='Fourth Year' && $acc_semi=='2nd'){
	 $up_semi='Graduate';
	 $up_year='Graduate';
	 mysqli_query("Update Student set acadamic_year='$up_year', semester='$up_semi' where stud_id='$id'")or die(mysqli_error());
 } 
 }
 else{
	 mysqli_query($con,"Update Evaluation set status='$status' where stud_id='$id' AND acc_year='$ay'")or die(mysql_error());
	 $que1=mysqli_query("select * from Account where user_id = '$id'") or die(mysqli_error());
	 $get=mysqli_fetch_array($que1);
	 $mail=$get['e_mail'];
	 $name=$get['f_name'];
	 $subject="Haramaya Registrar Office";	
	 $message = "Dear $name Your Grade Did not fill to Register to the next course!!
	 Grade: $pgpa";
	 mail($mail, $subject, $message, "From: "."hu_vcrcs@haramaya.com");
 }
 
?>	<script>windows: location='grade.php?Y=<?php echo $year;?>&S=<?php echo $semi;?>&WY=<?php echo $ay;?>'</script>;