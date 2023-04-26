
<html lang="en">
<?php include('head.php');
$instructor=$_GET['ID'];
?>

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
						<li class="nav-item start active open ">
                            <a href="listofinstructors.php" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title">Manage Instructor</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
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
						<li class="nav-item  ">
                            <a href="mail.php" class="nav-link nav-toggle">
                                <i class="icon-envelope-open"></i>
                                <span class="title">Mail</span>
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
                                <span>Assign Course</span>
                            </li>
                        </ul>
                      
                    </div>

                    <h3 class="page-title"> Assign Course</h3>

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
										$status_from="Sent";
										$status_to="New";
										$date=date("Y-M-D");
										$subject="Anouncment";
							 $mitaye=mysqli_query($con,"Select * from Account where user_id='$instructor'");
							  $fet=mysqli_fetch_array($mitaye);
							  $f_name=$fet['f_name'];
							  $reciver=$fet['e_mail'];
										
								 $mi=mysqli_query($con,"Select * from Course where course_code='$code' ");
							     $feta=mysqli_fetch_array($mi);	
                                  	    $c_name = $feta['course_name'];
										$year = $feta['year'];
										$semester = $feta['semester'];
										$description = $feta['description'];
										$inst_come = $feta['inst_id'];
										$cr_hr = $feta['credit_hour'];							 
									if($inst_come==""){
										$content="Dear $f_name You have assigned to lecture the course $c_name be active to teach this course";
										mysqli_query($con,"insert into course( course_code,course_name,credit_hour,year,semester,description,inst_id) values('$code','$c_name','$cr_hr','$year','$semester','$description','$instructor')")or die(mysqli_error());
										mysqli_query($con,"insert into mail( date,send_from,send_to,subject,content,status_from,status_to) values('$date','$sender','$reciver','$subject','$content','$status_from','$status_to')")or die(mysqli_error());	
										echo '<div class="alert alert-dismissable alert-success" style="margin-top:-20px;">';
										echo '<strong>'.'<center>'."New Course Assigned successfully! ".'</center>'.'<strong></div>';
									}
									else if($inst_come==$instructor){
										echo '<div class="alert alert-dismissable alert-danger" style="margin-top:-20px;">';
										echo '<strong>'.'<center>'."This Course Already Assigned to This User! ".'</center>'.'<strong></div>';
									}
									else{
										mysqli_query($con,"Update course set inst_id = '$instructor' where course_code='$code'")or die(mysqli_error());
										mysqli_query($con,"Update Assignment set inst_id = '$instructor' where code='$code'")or die(mysqli_error());
										mysqli_query($con,"Update Caricullum set inst_id = '$instructor' where code='$code'")or die(mysqli_error());
										mysqli_query($con,"Update Evaluation set inst_id = '$instructor' where course_code='$code'")or die(mysqli_error());
										mysqli_query($con,"Update Submit set inst_id = '$instructor' where course_code='$code'")or die(mysqli_error());
										mysqli_query($con,"Update Materialupload set inst_id = '$instructor' where course_code='$code'")or die(mysqli_error());
										echo '<div class="alert alert-dismissable alert-success" style="margin-top:-20px;">';
										echo '<strong>'.'<center>'."This Course Information Updated Successfully! ".'</center>'.'<strong></div>';
									}
										
										}?>
							
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
						<div style=" ">		
											
											<div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Instructor
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="text" readonly class="form-control" value="<?php echo $instructor; ?>" required>
                                                    <div class="form-control-focus"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="control-label col-md-3">Course Code 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4" style="width:367px">
                                                    <select class="form-control" name="code" id="code" required>
                                                        <option value="">---- Select Coursse ----</option>
														<?php
														$aben=mysqli_query($con,"Select * from Course");
														$array = array();
														while($ro = mysqli_fetch_assoc($aben)){
									                     $array[] = $ro;
														 $code=$ro['course_code'];
														?>
														<option value="<?php echo $ro['course_code'];?>"><?php echo $ro['course_code'];?> ( <?php echo $ro['course_name'];?> )</option><?php } ?>
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