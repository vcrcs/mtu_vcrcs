<?php include('head.php');?>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<?php include('header.php');?>
        <div class="clearfix"> </div>
        <div class="page-container">
<div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse">
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                          
						  <center>  
						  <li class="heading">
                            <h4 style="color:white;" class="uppercase">User Profile</h4><br>
                        </li>
						<?php 
						$query=mysqli_query($con,"select * from account where user_id='$session_id'")or die(mysqli_error());
					     $row=mysqli_fetch_array($query);
						  $pic=$row["pro_image"];
						?>
                        <img alt="" style="width:100px;" class="img-cube" src="../Uploads/<?php echo $pic;?>" />
                                <span class="username username-hide-on-mobile" style="color:white"><?php echo $row['f_name']." ".$row['m_name']; ?> </span>
                            </center>
						  <li class="sidebar-toggler-wrapper hide">
                            <div class="sidebar-toggler"> </div>
                        </li><br>
                        <li class="nav-item ">
                            <a href="index.php" class="nav-link " >
                                <i class="icon-home"></i>
                                <span  class="title">Home</span>
                                <span class="selected"></span>
                            </a>
                        </li>
						<li class="nav-item  ">
                            <a href="postnews.php" class="nav-link nav-toggle">
                                <i class="fa fa-file-text"></i>
                                <span class="title">Post News</span>
                            </a>
                        </li>
						
						<li class="nav-item  ">
                            <a href="leave.php" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Leave Request</span>
                            </a>
                        </li>
						<li class="nav-item start active open ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title">Course to Lecture</span>
                                <span class="arrow"></span>
                            </a>
							 
                            <ul class="sub-menu">
							<?php
							$month=date('M');
														if($month=="Feb"||$month=="Mar"||$month=="Apr"||$month=="May"||$month=="Jun")
															{
															$semester="2nd";
															}
															else{
															$semester="1st";
																}
							         
                                       $querys = mysqli_query($con,"SELECT * FROM course WHERE inst_id='$session_id' AND semester='$semester'");
                                       $array = array();
                                       while($rows = mysqli_fetch_assoc($querys)){
                                       $array[] = $rows; 
                                       $course=$rows['course_name']; 
									   $code =$rows['course_code']; ?>
                                <li class="nav-item  ">
                                    <a href="course.php?ID=<?php echo $code;?> " class="nav-link ">
                                        <span class="title"><?php echo $rows['course_name'];?></span>
                                    </a>
                                </li><?php } ?>
                            </ul>
                        </li>
						<li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-calendar-plus-o"></i>
                                <span class="title">Manage Schedule</span>
                                <span class="arrow"></span>
                            </a>
							 
                            <ul class="sub-menu">
							<li class="nav-item  ">
                                    <a href="schedule.php " class="nav-link ">
                                        <span class="title">Adjust Schedule</span>
                                    </a>
                                </li>
								<li class="nav-item  ">
                                    <a href="listofschedule.php " class="nav-link ">
                                        <span class="title">List Schedule</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
						<li class="nav-item  ">
                            <a href="mail.php" class="nav-link nav-toggle">
                                <i class="icon-envelope"></i>
                                <span class="title">Mail</span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </div>
<?php
$ass_id = trim($_GET["ID"]);
$abena=mysqli_query($con,"Select * from Assignment where ass_id='$ass_id'")or die(mysqli_error());
$roa = mysqli_fetch_array($abena);	
$id=trim($roa['code']);
$evlink=$roa['eval_link'];

$abe=mysqli_query($con,"Select * from Submit where assignment_id='$ass_id'")or die(mysqli_error());
$roq = mysqli_fetch_array($abe);
$Student=$roq['stud_id'];

$abiy=mysqli_query($con,"Select * from Student where stud_id='$Student'")or die(mysqli_error());
$rost = mysqli_fetch_array($abiy);
$year=$rost['acadamic_year'];
$semester=$rost['semester'];

$abiti=mysqli_query($con,"Select * from Caricullum where code='$id'")or die(mysqli_error());
$mita = mysqli_fetch_array($abiti);
$mark_1=trim($mita['mark_1']);
echo $mita['code'];

$abiba=mysqli_query($con,"Select * from Evaluation ")or die(mysqli_error());
$mitaye = mysqli_fetch_array($abiba);
$stu=$mitaye['stud_id'];
$co=$mitaye['course_code'];
?>
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.php">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Manage Resource</span>
                            </li>
                        </ul>
                    </div>
                    <div class="profile">
                        <div class="tabbable-line tabbable-full-width">
                            <ul class="nav nav-tabs">
                                <li >
                                    <a href="course.php?ID=<?php echo $id;?>" > Course Material </a>
                                </li>
                                <li class="active">
                                    <a href="uploadassignment.php?ID=<?php echo $id;?>" > Upload Assignment </a>
                                </li>
								<li>
                                    <a href="viewgrade.php?ID=<?php echo $id;?>" > View Grade </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div  class="tab-pane active"  id="tab_1_3">
                                    <div class="row profile-account">
                                        <div class="col-md-3">
                                            <ul class="ver-inline-menu tabbable margin-bottom-10">
                                                <li >
                                                    <a href="uploadassignment.php?ID=<?php echo $id;?>">
                                                        <i class="fa fa-upload"></i> Upload Assignment </a>
                                                    <span class="after"> </span>
                                                </li>
												<li >
                                                    <a href="manageassignment.php?ID=<?php echo $id;?>">
                                                        <i class="icon-puzzle"></i> Manage Assignment </a>
                                                    <span class="after"> </span>
                                                </li>
                                                <li >
                                                    <a  href="downloadsubmitted.php?ID=<?php echo $id;?>">
                                                        <i class="fa fa-download"></i> Download Submitted</a>
                                                </li>
                                                <li class="active">
                                                    <a >
                                                        <i class="fa fa-edit"></i> Record Result </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="tab-content">
                                              <div class="tab-pane Active">
                                                    <form action=" " method="post">
				                                 <?php
													
													if (isset($_POST['setresult'])){
														$result_1=$_POST['result_1'];
													if($co==$id){
														if( $mark_1 > $result_1 ){
														$status="Incomplete";
														$kalo=mysqli_query($con,"Update Evaluation set eval_1='$result_1' where course_code='$id' ")or die(mysqli_error());
														$message = "Result Updated Successfully!";
														echo ' <center>	<div class="alert alert-dismissable alert-success" style="margin-top:-20px;">';
														echo '<button type="button" class="close" data-dismiss="alert">X</button>';
														echo '<strong>'.$message.'</strong>';
														echo '</div></center>';	
														}
														else{
														$message = "You canot Set Mark greater than $mark_1 because Your Caricullum doesnot Approve!";
														echo ' <center>	<div class="alert alert-dismissable alert-danger" style="margin-top:-20px;">';
														echo '<button type="button" class="close" data-dismiss="alert">X</button>';
														echo '<strong>'.$message.'</strong>';
														echo '</div></center>';		
														}	
													}
													else{
														if( $mark_1 > $result_1){
														$status="Incomplete";
														$kalo=mysqli_query($con,"Insert into Evaluation (stud_id,inst_id,course_code,year,semester,eval_1,status) values('$Student','$session_id','$id','$year','$semester','$result_1','$status')")or die(mysqli_error());
														$message = "Result Setted Successfully!";
														echo ' <center>	<div class="alert alert-dismissable alert-success" style="margin-top:-20px;">';
														echo '<button type="button" class="close" data-dismiss="alert">X</button>';
														echo '<strong>'.$message.'</strong>';
														echo '</div></center>';	
														}
														else{
														$message = "You canot Set Mark greater than $mark_1 because Your Caricullum doesnot Approve!";
														echo ' <center>	<div class="alert alert-dismissable alert-danger" style="margin-top:-20px;">';
														echo '<button type="button" class="close" data-dismiss="alert">X</button>';
														echo '<strong>'.$message.'</strong>';
														echo '</div></center>';		
														}
													}	
													}
													if (isset($_POST['cancel'])){		
														
													}
													   echo '     <div class="form-group">';
                                                       echo '     <label class="control-label">Course Code</label>';
													   echo $mark_1;
                                                       echo '     <input type="text" readonly class="form-control" value="';echo$id;echo'" name="code" id="code" required/> </div>';
													   echo '	  <div class="form-group">';
                                                       echo '     <label class="control-label">Student ID</label>';
                                                       echo '     <input type="text" readonly class="form-control" value="';echo $Student;echo'" name="stud_id" id="stud_id" required/> </div>';
													   echo '	  <div class="form-group">';
                                                       echo '     <label class="control-label">';echo$evlink;echo'</label>';
                                                       echo '     <input type="text"  placeholder="Set result..." class="form-control" name="result_1" id="result_1" required /> </div>';
													   echo '     <button type="submit" name="setresult" style="width:100px" class="btn btn-success">Set Result</button>';
                                                       echo '     <button type="submit" name="cancel" style="width:80px" class="btn btn-danger">Cancel</button>';
												
													 ?>
                                                        </div>
                                                    </form>
                                                </div>
                                        </div>
                                        <!--end col-md-9-->
                                    </div>
                                </div>
                                <!--end tab-pane-->
                                <!--end tab-pane-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
        </div>
<?php include('footer.php');?>
<?php include('coreplugin.php');?>
</body>
</html>