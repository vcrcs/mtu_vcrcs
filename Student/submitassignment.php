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
                        </li>
                        <li class="sidebar-search-wrapper">
                            <form class="sidebar-search  " action="http://www.keenthemes.com/preview/metronic/theme/admin_1/page_general_search_3.html" method="POST">
                                <a href="javascript:;" class="remove">
                                    <i class="icon-close"></i>
                                </a>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <a href="javascript:;" class="btn submit">
                                            <i class="icon-magnifier"></i>
                                        </a>
                                    </span>
                                </div>
                            </form>
                           </li>
                        <li class="nav-item ">
                            <a href="index.php" class="nav-link " >
                                <i class="icon-home"></i>
                                <span  class="title">Home</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="withdrawal.php" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Withdrawal</span>
                            </a>
                        </li>
                        <li class="nav-item start active open ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title">Semester Course</span>
                                <span class="arrow"></span>
                            </a>
							 
                            <ul class="sub-menu">
							<?php
						               $query = "SELECT * FROM Student WHERE stud_id='$session_id'";
								       $result = mysqli_query($con,$query)or die(mysqli_error());
								       $num_row = mysqli_num_rows($result);
									   $row=mysqli_fetch_array($result);
									   $semester_come =$row["semester"];
								       $year_come=$row["acadamic_year"];
                                       $querys = mysqli_query($con,"SELECT * FROM course WHERE year='$year_come' AND semester='$semester_come' ");
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
                            <a href="gradereport.php" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title">View Grade Report</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="schedule.php" class="nav-link nav-toggle">
                                <i class="fa fa-calendar-plus-o"></i>
                                <span class="title">Schedule</span>
                            </a>
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
$id = $_GET["ID"];
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
                                    <a href="assignment.php?ID=<?php echo $id;?>" > Assignment </a>
                                </li>
								<li>
                                    <a href="viewresult.php?ID=<?php echo $id;?>" > View Result</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div  class="tab-pane active"  id="tab_1_3">
                                    <div class="row profile-account">
                                       <div class="col-md-3">
                                            <ul class="ver-inline-menu tabbable margin-bottom-10">
                                                <li >
                                                    <a href="assignment.php?ID=<?php echo $id;?>">
                                                        <i class="fa fa-download"></i> Download Assignment </a>
                                                    <span class="after"> </span>
                                                </li>
												<li class="active">
                                                    <a href="submitassignment.php?ID=<?php echo $id;?>">
                                                        <i class="fa fa-edit"></i> Submit Assignment </a>
                                                    <span class="after"> </span>
                                                </li>
                                                <li>
                                                    <a  href="manageassignment.php?ID=<?php echo $id;?>">
                                                        <i class="icon-puzzle"></i> Manage Assignment</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="tab-content">
                                              <div id="tab_2-2"  class="tab-pane active">
												<form action="#" class="form-horizontal" id="form_sample_1" method="post" enctype="multipart/form-data">
												<?php
												$error = 0;
				if (isset($_POST['save'])){		
						                $code=$_POST['course_code'];
				                        $ass_id=$_POST['ass_id']; 
										$date=date('y-m-d');
										$status="New";
										
										$file_cv = addslashes(file_get_contents($_FILES['file_cv']['tmp_name']));
		                                $file_cv = addslashes(file_get_contents($_FILES['file_cv']['tmp_name']));
		                                $Juses = addslashes($_FILES['file_cv']['name']);
		                                $image_size = getimagesize($_FILES['file_cv']['tmp_name']);
										$type = explode('.', $Juses);
										$type = end($type);
										
										$abena=mysqli_query($con,"Select * from Assignment")or die(mysqli_error());
										$roa = mysqli_fetch_array($abena);	
										$ab=trim($roa['code']);
										$ac=trim($id);
										if($ab==$ac){
										$dead_line=$roa['dead_line'];
										$inst_id=$roa['inst_id'];
										}
										
										if($dead_line > $date){
											echo '<div class="alert alert-dismissable alert-danger error" style="margin-top:-20px;">';
											echo '<strong>'.'<center>'."Submittion Dead Line has Passed !".'</center>'.'<strong>';
											echo '</div>';
										}
										else{
										$a=mysqli_query($con,"Select * from Submit where assignment_id='$ass_id'")or die(mysqli_error());
										$r = mysqli_num_rows($a);	
										  if($r<=0){
											mysqli_query($con,"insert into Submit( assignment_id,course_code,inst_id,stud_id,file,date,status) values('$ass_id','$id','$inst_id','$session_id','$Juses','$date','$status')")or die(mysqli_error());
											move_uploaded_file($_FILES["file_cv"]["tmp_name"], "../Uploads/" . $_FILES["file_cv"]["name"]);
											echo '<div class="alert alert-dismissable alert-success" style="margin-top:0px;">';
											echo '<strong>'.'<center>'."Assignment Submitted successfully! ".'</center>'.'<strong>';
											echo '</div>';	
											}
											else{
											mysqli_query($con,"Update Submit set file='$Juses',date='$date' where assignment_id='$ass_id'")or die(mysqli_error());
											move_uploaded_file($_FILES["file_cv"]["tmp_name"], "../Uploads/" . $_FILES["file_cv"]["name"]);
											echo '<div class="alert alert-dismissable alert-danger error" style="margin-top:-20px;">';
											echo '<strong>'.'<center>'."Assignment id Already exist So File Updated Successfully !".'</center>'.'<strong>';
											echo '</div>';	
											}
											
										}
				}?>	
												<center><h4>Submit Assignment</h4></center><hr>
												<div class="form-group">
                                                <label class="control-label">Course Code </label>
                                                <input type="text" readonly name="course_code" value="<?php echo $id;?>" class="form-control" /> </div>
                                                <div class="form-group">
                                                            <label class="control-label">Assignment ID</label>
                                                            <select class="form-control" name="ass_id" id="ass_id" >
																	<option value="">--------------- Select Assignment ID ------------------</option>
																	<?php
																	$abenn=mysqli_query($con,"Select * from Assignment where status='New'")or die(mysqli_error());
																	$array = array();
																	while($ro = mysqli_fetch_assoc($abenn)){
								                                       $array[] = $ro; 
																	   $ab=trim($ro['code']);
																	   $ac=trim($id);
																	   if($ab==$ac){
																	?>
																	<option value="<?php echo $ro['ass_id'];?>"><?php echo $ro['ass_id'];?></option><?php }  
																	   }?>
																</select> </div>
                                                <div class="form-group">
                                                <label class="control-label">File to be Upload</label>
                                                <input type="file" name="file_cv" class="form-control" required /> </div>
                                                <div class="margiv-top-10" style="margin-top:40px;">
                                                <button type="submit" class="btn green" name="save" id="upload" >Submit Assignment</button>
                                                <button type="submit" class="btn danger" name="cancel" id="upload" >Cancel</button>
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
 <script src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="../assets/pages/scripts/form-validation-md.min.js" type="text/javascript"></script>
</html>