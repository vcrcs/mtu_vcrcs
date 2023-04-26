<head>
<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
</head>

<?php include('head.php');?>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<?php include('header.php');?>
        <div class="page-container">
            <?php include('sidebar.php');?>
           <div class="page-content-wrapper">
               <div class="page-content">
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.php">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Manage Grade Report</span>
                            </li>
                        </ul>
                        
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                  <center>  <h3 class="page-title"> Student Grade</center></h3>
                    
                    <div class="row">
                        <div class="col-md-12" id="printme" name="printme">
						<?php
						$idno=$_GET['ID'];
						$year=$_GET['YE'];
						$semester=$_GET['SE'];
						$semi=$semester;
$que=mysqli_query($con,"select * from Evaluation where stud_id = '$idno' AND year = '$year' AND semester = '$semester'") or die(mysqli_error());
$bab=mysqli_fetch_array($que);
$ay=$bab['acc_year'];
				$dept="Information Systems";
				if(mysqli_num_rows($que)>0){ ?>
										<div class="table-responsive">
													<table class="table table-striped table-hover table-bordered">
														<?php echo '<h3 style="text-align:center; padding-top:5px;">';echo "Grade Report For "; echo $dept." "; echo $year." ".$semester." Semester Student".'</h3>';?>
														<br>
														<tr>
															<?php 
																$que=mysqli_query($con,"select * from Student where stud_id = '$idno'") or die(mysqli_error());
																$run1 = mysqli_fetch_array($que);
															?>
															<td>Student Name</td>
															<td><?php echo $run1['f_name']." ".$run1['m_name']." ".$run1['l_name'];?></td>
															<td>ID</td>
															<td><?php echo $idno;?></td>
															<td>Sex</td>
															<td><?php echo $run1['sex'];?></td>
														</tr>
														<tr style = "background-color: #CCC; "><b>
															<th>#</th>
															<th>Course title</th>
															<th>Course Code</th>
															<th>Credit Hour</th>
															<th>Grade</th>
															<th>GPT</th>
															</b>
														</tr>
														
														
															<?php $count=0;$cpoint=0;$pt=0;$ct=0;
															$que=mysqli_query($con,"select * from Evaluation where stud_id = '$idno' AND year = '$year' AND semester = '$semester'") or die(mysqli_error());
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
																?>
																<tr>
																	<td><?php echo $count;?></td>
																	<td><?php echo $get_course['course_name'];?></td>
																	<td><?php echo $course;?></td>
																	<td><?php echo $crhr;?></td>
																	<td><?php echo $gr;?></td>
																	<td><?php echo $cpoint;?></td>
																	
																<tr>
																<?php
																$cpoint=0;
															}
												?>
																 <tr style = "background-color: #CCC; text-align:right;">
																		 <td>Summary</td>
																		 <td>Total Credit</td>
																		 <td>Total Point</td>
																		 <td>GPA</td>
																		 <td colspan="2">Academic Status</td>
																 </tr>
																 
																 <?php 
																 $tcm="";
																 $query=mysqli_query($con,"select * from Evaluation where stud_id = '$idno' AND year = '$year' AND semester = '$semester'") or die(mysqli_error());
																 $run_que=mysqli_fetch_array($query);
																 $q=mysqli_query($con,"select * from Total_credit where year = '$year' AND semester = '$semester'") or die(mysqli_error());
																 $r=mysqli_fetch_array($q);
																 if($year=="First Year" && $semester == "1st"){$tcm="-----";}else{$tcm=$r['total_cr'];}
																 ?>
																 <tr style="text-align:center;">	
																		 <td>Previous</td>
																		 <td><?php 
																		 if($year=="First Year" && $semester=="1st"){ 
																			$prev="-----";
																		  }
																		  else if($year=="First Year" && $semester=="2nd"){
																			  $semm="1st";
																			$qq=mysqli_query($con,"select * from Total_credit where year = '$year' AND semester = '$semm'") or die(mysqli_error());
																            $rr=mysqli_fetch_array($qq); 
																			$prev=$rr['total_cr'];
																		  }
																		  else if($year=="Second Year" && $semester=="1st"){
																			 $yea="First Year";
																			 $semm="2nd";
																			$qq=mysqli_query($con,"select * from Total_credit where yea = '$year' AND semester = '$semm'") or die(mysqli_error());
																            $rr=mysqli_fetch_array($qq); 
																			$prev=$rr['total_cr']; 
																		  }
																		  else if($year=="Second Year" && $semester=="2nd"){
																			  $semm="1st";
																			$qq=mysqli_query($con,"select * from Total_credit where year = '$year' AND semester = '$semm'") or die(mysqli_error());
																            $rr=mysqli_fetch_array($qq); 
																			$prev=$rr['total_cr'];
																		  }
																		  else if($year=="Third Year" && $semester=="1st"){
																			 $yea="Second Year";
																			 $semm="2nd";
																			$qq=mysqli_query($con,"select * from Total_credit where year = '$yea' AND semester = '$semm'") or die(mysqli_error());
																            $rr=mysqli_fetch_array($qq); 
																			$prev=$rr['total_cr'];
																		  }
																		  else if($year=="Third Year" && $semester=="2nd"){
																			  $semm="1st";
																			$qq=mysqli_query($con,"select * from Total_credit where year = '$year' AND semester = '$semm'") or die(mysqli_error());
																            $rr=mysqli_fetch_array($qq); 
																			$prev=$rr['total_cr'];
																		  }
																		  else if($year=="Fourth Year" && $semester=="1st"){
																			  $yea="Third Year";
																			  $semm="2nd";
																			$qq=mysqli_query($con,"select * from Total_credit where year = '$yea' AND semester = '$semm'") or die(mysqli_error());
																            $rr=mysqli_fetch_array($qq); 
																			$prev=$rr['total_cr'];
																		  }
																		  else if($year=="Fourth Year" && $semester=="2nd"){
																			  $semm="1st";
																			$qq=mysqli_query($con,"select * from Total_credit where year = '$year' AND semester = '$semm'") or die(mysqli_error());
																            $rr=mysqli_fetch_array($qq); 
																			$prev=$rr['total_cr'];
																		  }
																		 echo $prev;?></td>
																		 <?php
																		  if($year=="First Year" && $semester=="1st"){ 
																			$tot=0;
																		  }
																		  else if($year=="First Year" && $semester=="2nd"){
																			 $semm="1st";
																			$qo=mysqli_query($con,"select * from Grade_report where stud_id = '$idno' AND year = '$year' AND semester = '$semm'") or die(mysqli_error());
																            $ro=mysqli_fetch_array($qo);
																			$tot=$ro['total_point'];																			
																		  }
																		  else if($year=="Second Year" && $semester=="1st"){
																			 $yea="First Year";
																			 $semm="2nd";
																			$qo=mysqli_query($con,"select * from Grade_report where stud_id = '$idno' AND year = '$yea' AND semester = '$semm'") or die(mysqli_error());
																            $ro=mysqli_fetch_array($qo);
																			$tot=$ro['total_point'];
																		  }
																		  else if($year=="Second Year" && $semester=="2nd"){
																			  $semm="1st";
																			$qo=mysqli_query($con,"select * from Grade_report where stud_id = '$idno' AND year = '$year' AND semester = '$semm'") or die(mysqli_error());
																            $ro=mysqli_fetch_array($qo);
																			$tot=$ro['total_point'];
																		  }
																		  else if($year=="Third Year" && $semester=="1st"){
																			 $yea="Second Year";
																			 $semm="2nd";
																			$qo=mysqli_query($con,"select * from Grade_report where stud_id = '$idno' AND year = '$yea' AND semester = '$semm'") or die(mysqli_error());
																            $ro=mysqli_fetch_array($qo);
																			$tot=$ro['total_point'];
																		  }
																		  else if($year=="Third Year" && $semester=="2nd"){
																			  $semm="1st";
																			$qo=mysqli_query($con,"select * from Grade_report where stud_id = '$idno' AND year = '$year' AND semester = '$semm'") or die(mysqli_error());
																            $ro=mysqli_fetch_array($qo);
																			$tot=$ro['total_point'];
																		  }
																		  else if($year=="Fourth Year" && $semester=="1st"){
																			  $yea="Third Year";
																			  $semm="2nd";
																			$qo=mysqli_query($con,"select * from Grade_report where stud_id = '$idno' AND year = '$yea' AND semester = '$semm'") or die(mysqli_error());
																            $ro=mysqli_fetch_array($qo);
																			$tot=$ro['total_point'];
																		  }
																		  else if($year=="Fourth Year" && $semester=="2nd"){
																			  $semm="1st";
																			$qo=mysqli_query($con,"select * from Grade_report where stud_id = '$idno' AND year = '$year' AND semester = '$semm'") or die(mysqli_error());
																            $ro=mysqli_fetch_array($qo);
																			$tot=$ro['total_point'];
																		  }
																		 
																		 
																		 
																		 ?>
																		 <td><?php if($year=="First Year" && $semester == "1st"){echo "--------";}else{echo $ro['total_point'];}?></td>
																		 <td><?php if($year=="First Year" && $semester == "1st"){echo "--------";}else{$pgpa=$ro['grade']; echo $pgpa;}?></td>
																		 <td colspan="2"><?php if($year=="First Year" && $semester == "1st"){echo "--------";}
																		 else if($pgpa<=1.5){
																			echo "Faired";
																		}else if($pgpa<= 1.74444499 ){
																			echo "Readmission";
																		}else if($pgpa<= 1.99999){
																			echo "Warning";
																		}else if($pgpa>= 2 && $pgpa<3){
																			echo "Satisfactory";
																		}else if($pgpa>= 3 && $pgpa<3.5){
																			echo"GS";
																		}else if($pgpa>= 3.5 && $pgpa<=3.7){
																			echo "GD";
																		}else if($pgpa>= 3.7){
																			echo "DST";
																		}?></td>
																 </tr>
																 <tr style="text-align:center;">	
																		 <td>Current Semester</td>
																		 <td><?php echo $ct;?></td>
																		 <td><?php echo $pt;?></td>
																		 <td><?php $pgpa=$pt/$ct;echo $pgpa;?></td>
																		 <td colspan="2"><?php if($pgpa<=1.5){
																			echo "Faired";
																		}else if($pgpa<= 1.74444499 ){
																			echo "Readmission";
																		}else if($pgpa<= 1.99999){
																			echo "Warning";
																		}else if($pgpa>= 2 && $pgpa<3){
																			echo "Satisfactory";
																		}else if($pgpa>= 3 && $pgpa<3.5){
																			echo"GS";
																		}else if($pgpa>= 3.5 && $pgpa<=3.7){
																			echo "GD";
																		}else if($pgpa>= 3.7){
																			echo "DST";
																		}?></td>
																 </tr>
																 <tr style="text-align:center;">	
																		 <td>Cumulative</td>
																		 <td><?php 
																		 if($year=="First Year" && $semester=="1st"){ 
																			echo $ct;
																		  }
																		  else{
																			echo $r['total_cr'];  
																		  }?></td>
																		 <td><?php $result=$pt+$tot; echo $result;?> </td>
																		 <td><?php 
																		 if($year=="First Year" && $semester=="1st"){ 
																			 $pgpa=$result/$ct;echo $pgpa;
																		  }
																		  else{
																			 $pgpa=$result/$r['total_cr'];echo $pgpa;
																		  }
																		?></td>
																		 <td colspan="2"><?php if($pgpa<=1.5){
																			echo "Faired";
																		}else if($pgpa<= 1.74444499 ){
																			echo "Readmission";
																		}else if($pgpa<= 1.99999){
																			echo "Warning";
																		}else if($pgpa>= 2 && $pgpa<3){
																			echo "Satisfactory";
																		}else if($pgpa>= 3 && $pgpa<3.5){
																			echo"GS";
																		}else if($pgpa>= 3.5 && $pgpa<=3.7){
																			echo "GD";
																		}else if($pgpa>= 3.7){
																			echo "DST";
																		}?></td>
																 </tr>
															<?php			
															//}?>
																
												</table>
											</div>	
										
										<?php
				}else{
					echo '<div class="alert alert-dismissable alert-danger">';
						echo '<strong>'."grade report is not prepared".'</strong>';
					echo '</div>';
				}?>
				   </div>
				   <a href="grade.php?Y=<?php echo $year;?>&S=<?php echo $semi;?>&WY=<?php echo $ay;?>"> <button  style="float:left;"class="btn btn-success" >Back</button></a>&nbsp;&nbsp;&nbsp;
				   <button onclick="printContent('printme')" name="print" style="float:right;"class="btn btn-success" >Print Grade Report</button>
                    </div>

                </div>
                <!-- END CONTENT BODY -->
            </div>
			<?php include('chat.php');?>
        </div>
<?php include('footer.php');?>


        <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/table-datatables-colreorder.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../../../../www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-37564768-1', 'keenthemes.com');
  ga('send', 'pageview');
</script> 
</body>

