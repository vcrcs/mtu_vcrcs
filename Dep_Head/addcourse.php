<html lang="en">
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
						<li class="heading">
                            <h3 class="uppercase">Features</h3>
                        </li>
                        <li class="nav-item">
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
                            <a href="listofinstructors.php" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title">Manage Instructor</span>
                            </a>
                        </li>
                        <li class="nav-item  start active open">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title">Manage Course </span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="addcourse.php" class="nav-link ">
                                        <span class="title">Add Course</span>
                                    </a>
                                </li>
								<li class="nav-item  ">
                                    <a href="updatecourse.php" class="nav-link ">
                                        <span class="title">Update Course </span>
                                    </a>
                                </li>
								<li class="nav-item  ">
                                    <a href="deletecourse.php" class="nav-link ">
                                        <span class="title">Delete Course </span>
                                    </a>
                                </li>
								<li class="nav-item  ">
                                    <a href="listofcourse.php" class="nav-link ">
                                        <span class="title">List of Course</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
						<li class="nav-item  ">
                            <a href="managegrade.php" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title">Manage Grade Report</span>
                            </a>
                        </li>
			
                    </ul>
                </div>
            </div>
            <!-- END SIDEBAR -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.php">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Add New Course</span>
                            </li>
                        </ul>
                      
                    </div>

                    <h3 class="page-title"> Add New Course</h3>

                  <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered">
							<?php
				              $error = 0;
				              if (isset($_POST['register'])){		
						      $mita=mysqli_query($con,"Select * from Account where user_id='$session_id'");
							  $fetch=mysqli_fetch_array($mita);
							  $sender=$fetch['e_mail'];
										$code = $_POST['code'];
										$c_name = $_POST['c_name'];
										$year = $_POST['year'];
										$semester = $_POST['semester'];
										$description = $_POST['description'];
										$instructor = $_POST['instructor'];
										$cr_hr = $_POST['cr_hr'];
                                        $status_from="Sent";
										$status_to="New";
										$date=date("Y-M-D");
										$subject="Anouncment";
							  $mitaye=mysqli_query($con,"Select * from Account where user_id='$instructor'");
							  $fet=mysqli_fetch_array($mitaye);
							  $f_name=$fet['f_name'];
							  $reciver=$fet['e_mail'];
								$content="Dear $f_name You have assigned to lecture the course $c_name be active to teach this course";
							   $aben=mysqli_query($con,"Select * from Course where inst_id='$instructor'")or die(mysqli_error());
												$kal=mysqli_num_rows($aben);
												$array = array();
													$cr=0;
												while($mita=mysqli_fetch_assoc($aben)){
													$array[] = $mita; 
												    $cr_hr = $mita['credit_hour'];
													$cr=$cr+$cr_hr;
												}
									if($cr>=9){
								echo '<div class="alert alert-dismissable alert-danger" style="margin-top:0px;">';
								echo '<strong>'.'<center>'."This Instructor Hold Enogh Credit Please Assign another! ".'</center>'.'<strong>';
								echo '</div>';	
							}
							else{		
										mysqli_query($con,"insert into course( course_code,course_name,credit_hour,year,semester,description,inst_id) values('$code','$c_name','$cr_hr','$year','$semester','$description','$instructor')")or die(mysqliii_error());
										mysqli_query($con,"insert into mail( date,send_from,send_to,subject,content,status_from,status_to) values('$date','$sender','$reciver','$subject','$content','$status_from','$status_to')")or die(mysqli_error());	
										echo '<div class="alert alert-dismissable alert-success" style="margin-top:-20px;">';
										echo '<strong>'.'<center>'."New Course Added successfully! ".'</center>'.'<strong></div>';
							}}?>
							
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">Fill News Information Below</span>
                                    </div>
                                </div>
                                <div class="portlet-body" style="margin-left:0px; width:500px;">
                                    <!-- BEGIN FORM-->
                                    <form action="#" class="form-horizontal" id="form_sample_1" method="post" enctype="multipart/form-data">
                                        <div class="form-body">
                                           <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Your form validation is successful! </div>
						<div style=" ">						
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Course Code
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="textonly" class="form-control" placeholder="" name="code" id="code" required>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Enter Course Code </span>
                                                </div>
                                            </div>
											<div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Course Name
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" placeholder="" name="c_name" id="c_name" required>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Enter Course Name </span>
                                                </div>
                                            </div>
											<div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Credit Hour
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="number" max=6 min=1 class="form-control" placeholder="" name="cr_hr" id="cr_hr" required>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Enter Credit Hour </span>
                                                </div>
                                            </div>
											<div class="form-group form-md-line-input">
                                                <label class="control-label col-md-3">Acadamic Year 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4" style="width:367px">
                                                    <select class="form-control" name="year" id="year" required>
                                                        <option value="">---- Select type ----</option>
														<option value="First Year">First Year</option>
														<option value="Second Year">Second Year</option>
														<option value="Thrid Year">Thrid Year</option>
                                                        <option value="Fourth Year">Fourth Year</option>
                                                     </select>
                                                </div>
                                            </div>
										   
						</div>					
						<div style="margin-left:600px; width:500px; float:left; margin-top:-280px;">					
                                             
											<div class="form-group form-md-line-input">
                                                <label class="control-label col-md-3">Acadamic Semester 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4" style="width:367px">
                                                    <select class="form-control" name="semester" id="semester" required>
                                                        <option value="">---- Select Semester ----</option>
														<option value="1st">1st Semester</option>
														<option value="2nd">2nd Semester</option>
                                                     </select>
                                                </div>
                                            </div>
											<div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Descrption
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <textarea class="wysihtml5 form-control" rows="6" name="description" id="description" data-error-container="#editor1_error" required></textarea>
                                                    <div class="form-control-focus"> </div>
                                                </div>
                                            </div>
											<div class="form-group form-md-line-input">
                                                <label class="control-label col-md-3">Instructor 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4" style="width:367px">
                                                    <select class="form-control" name="instructor" id="instructor" required>
                                                        <option value="">---- Select Instructor ----</option>
														<?php
														$type="Instructor";
														$aben=mysqli_query($con,"Select * from Account where user_type='$type'");
														$array = array();
														while($ro = mysqli_fetch_assoc($aben)){
									                     $array[] = $ro;
														 $kk = $ro['user_id'];
														 $ab=mysqli_query($con,"select * from account where user_id='$kk'");
														?>
														<option value="<?php echo $ro['user_id'];?>"><?php echo $ro['user_id'];?> (<?php echo $ro['f_name'];?> <?php echo $ro['m_name'];?> <?php echo $ro['l_name'];?>)</option><?php } ?>
													</select>
                                                </div>
                                            </div>
                     </div>
						                  </div>
                                        <div class="form-actions">
                                            <div class="row" style="margin-left:900px; margin-top:30px;">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green" name="register" id="register" >Register Course</button>&nbsp;&nbsp;&nbsp;
                                                 </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
							
							
                            </div>
                            <!-- END VALIDATION STATES-->
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
<?php include('footer.php');?>
<?php include('coreplugin.php');?>
</body>

      <script src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
      <script src="../assets/pages/scripts/form-validation-md.min.js" type="text/javascript"></script>

   
    

<!-- Mirrored from www.keenthemes.com/preview/metronic/theme/admin_1/form_validation_md.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2016 18:49:56 GMT -->
</html>