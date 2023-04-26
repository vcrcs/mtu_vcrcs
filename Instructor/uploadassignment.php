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
                                    <a href="uploadassignment.php?ID=<?php echo $id;?>" > Upload Assignment </a>
                                </li>
								<li>
                                    <a href="viewgrade.php?ID=<?php echo $id;?>" > View Grade </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" class="tab-pane" id="tab_1_3">
                                    <div class="row profile-account">
                                        <div class="col-md-3">
                                            <ul class="ver-inline-menu tabbable margin-bottom-10">
                                                <li class="active">
                                                    <a href="uploadassignment.php?ID=<?php echo $id;?>">
                                                        <i class="fa fa-upload"></i> Upload Assignment </a>
                                                    <span class="after"> </span>
                                                </li>
												<li >
                                                    <a href="manageassignment.php?ID=<?php echo $id;?>">
                                                        <i class="icon-puzzle"></i> Manage Assignment </a>
                                                    <span class="after"> </span>
                                                </li>
                                                <li>
                                                    <a  href="downloadsubmitted.php?ID=<?php echo $id;?>">
                                                        <i class="fa fa-download"></i> Download Submitted</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="tab-content">
                                                <div id="tab_1-1" class="tab-pane active">
                                                    <form action="#" class="form-horizontal" id="form_sample_1" method="post" enctype="multipart/form-data">
													
													<?php
													$error = 0;
				if (isset($_POST['upload'])){		
						                $id=$_GET['ID'];
										$code=$_POST['course_code'];
				                        $dead_line=$_POST['deadline_date']; 
										$evlink=$_POST['evlink'];
										$date=date('y-m-d');
				                        $description = $_POST['description'];
										$status="New";
										$ass_id="$id"."-".rand();
				                        $file_cv = addslashes(file_get_contents($_FILES['file_cv']['tmp_name']));
		                                $file_cv = addslashes(file_get_contents($_FILES['file_cv']['tmp_name']));
		                                $Juses = addslashes($_FILES['file_cv']['name']);
		                                $image_size = getimagesize($_FILES['file_cv']['tmp_name']);
										$type = explode('.', $Juses);
										$type = end($type);
										
										if($date < $dead_line){
											$message = "The Date you are trying to use Passed";
											echo ' <center>	<div class="alert alert-dismissable alert-danger" style="margin-top:-20px;">';
											echo '<button type="button" class="close" data-dismiss="alert">X</button>';
											echo '<strong>'.$message.'</strong>';
											echo '</div>';
										}
										else{
											
											$abena=mysqli_query($con,"Select * from Assignment ")or die(mysqli_error());
											$roa = mysqli_fetch_array($abena);	
											$ev=$roa['eval_link'];
											if($ev==$evlink){
											$message = "You can not Ajust same evaluation link Twice";
											echo ' <center>	<div class="alert alert-dismissable alert-danger" style="margin-top:-20px;">';
											echo '<button type="button" class="close" data-dismiss="alert">X</button>';
											echo '<strong>'.$message.'</strong>';
											echo '</div></center>';
											}
											else{
												if($type != 'doc'  && $type != 'docx' && $type != 'pptx'&& $type != 'ppt' && $type != 'csv' && $type != 'pdf' ){
											$message = "Invalid File Format Selected File is not Document File !";
											echo '<div class="alert alert-dismissable alert-danger">';
											echo '<button type="button" class="close" data-dismiss="alert">X</button>';
											echo '<strong>'.$message.'</strong>';
											echo '</div>';
											}
										else{
											$kalo=mysqli_query($con,"Insert into Assignment (ass_id,inst_id,code,description,file,post_date,dead_line,eval_link,status) values('$ass_id','$session_id','$id','$description','$Juses','$date','$dead_line','$evlink','$status')")or die(mysqli_error());
											move_uploaded_file($_FILES["file_cv"]["tmp_name"], "../Uploads/" . $_FILES["file_cv"]["name"]);
											$message = "Assignment Upload Successfully!";
											echo ' <center>	<div class="alert alert-dismissable alert-success" style="margin-top:-20px;">';
											echo '<button type="button" class="close" data-dismiss="alert">X</button>';
											echo '<strong>'.$message.'</strong>';
											echo '</div></center>';
											
											$message = "This Asignment id is $ass_id";
											echo ' <center>	<div class="alert alert-dismissable alert-danger" style="margin-top:-20px;">';
											echo '<button type="button" class="close" data-dismiss="alert">X</button>';
											echo '<strong>'.$message.'</strong>';
											echo '</div></center>';
											}
											}
											
										}
				}
													?>
													   <div class="form-group">
                                                            <label class="control-label">Course Code </label>
                                                            <input type="text" readonly name="course_code" value="<?php echo $id;?>" class="form-control" /> </div>
                                                        
														<div class="form-group">
                                                            <label class="control-label">Evaluation Link To</label>
                                                            <select class="form-control" name="evlink" id="evlink" required>
																	<option value="">---- Select Caricullum type ----</option>
																	<?php
																	$abenn=mysqli_query($con,"Select * from caricullum where inst_id='$session_id'")or die(mysqli_error());
																	$array = array();
																	while($ro = mysqli_fetch_assoc($abenn)){
								                                       $array[] = $ro; 
																	   $ab=trim($ro['code']);
																	   $ac=trim($id);
																	   if($ab==$ac){
																	?>
																	<option value="<?php echo $ro['eval_1'];?>"><?php echo $ro['eval_1'];?></option>
																	<option value="<?php echo $ro['eval_2'];?>"><?php echo $ro['eval_2'];?></option>
																	<option value="<?php echo $ro['eval_3'];?>"><?php echo $ro['eval_3'];?></option>
																	<option value="<?php echo $ro['eval_4'];?>"><?php echo $ro['eval_4'];?></option>
																	<option value="<?php echo $ro['eval_5'];?>"><?php echo $ro['eval_5'];?></option><?php }
																	   else{
																		   ?>
																	<option value="">---- No Caricullum for This Specfic Course Please Adjust Caricullum ----</option>
																	
																	<?php   }
																	   }?>
																</select> </div>
														<div class="form-group">
                                                            <label class="control-label">Deadline Date</label>
                                                            <input type="date" name="deadline_date" class="form-control" required /> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Description</label>
                                                            <textarea required class="form-control" name="description" rows="5" placeholder="Describe the content of the Assignment you are going to Uppload..."></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">File to be Upload</label>
                                                            <input type="file" name="file_cv" class="form-control" required /> </div>
                                                        <div class="margiv-top-10" style="margin-top:40px;">
                                                           <button type="submit" class="btn green" name="upload" id="upload" >Upload Assignment</button>
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