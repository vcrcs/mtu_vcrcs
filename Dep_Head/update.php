
<html lang="en">
<?php include('head.php');?>

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<?php include('header.php');?>
        <div class="clearfix"> </div>
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
                                <span>Update Course</span>
                            </li>
                        </ul>
                      
                    </div>

                   <center> <h3 class="page-title"> Update Course Information </h3></center>

                  <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered">
							<?php
				             $error = 0;
							 $id = $_GET["ID"];
							 $result = mysqli_query($con,"SELECT * FROM Course where course_code='$id'") or die(mysqli_error());	
							 $data = mysqli_fetch_array($result);
				            if (isset($_POST['register'])){		
						
										$code = $_POST['code'];
										$c_name = $_POST['c_name'];
										$year = $_POST['year'];
										$semester = $_POST['semester'];
                                        $cr_hr = $_POST['cr_hr'];
										$instructor = $_POST['instructor'];
                                        $description= $_POST['description'];
										
							if( $description ==" "){
										mysqli_query($con,"Update Course set course_code='$code',course_name='$c_name',credit_hour='$cr_hr',year='$year',semester='$semester',inst_id='$instructor' where course_code='$id'")or die(mysqli_error());
										$message = "Course Information Has Been Updated Now!";
										echo ' <center>	<div class="alert alert-dismissable alert-success">';
										echo '<button type="button" class="close" data-dismiss="alert">X</button>';
										echo '<strong>'.$message.'</strong>';
										echo '</div></center>';
										
							}
							else{
										mysqli_query($con,"Update Course set course_code='$code',course_name='$c_name',credit_hour='$cr_hr',year='$year',semester='$semester',description='$description',inst_id='$instructor' where course_code='$id'")or die(mysqli_error());
										$message = "Course Information Has Been Updated Now!";
										echo ' <center>	<div class="alert alert-dismissable alert-success">';
										echo '<button type="button" class="close" data-dismiss="alert">X</button>';
										echo '<strong>'.$message.'</strong>';
										echo '</div></center>';
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
                                                <label class="col-md-3 control-label" for="form_control_1">Course Code
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" placeholder="" name="code" id="code" value="<?php echo $data['course_code'];?>" required>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Enter Course Code </span>
                                                </div>
                                            </div>
											<div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Course Name
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" placeholder="" name="c_name" id="c_name" value="<?php echo $data['course_name'];?>"required>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Enter Course Name </span>
                                                </div>
                                            </div>
											<div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Credit Hour
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="text" min=1 max=6 class="form-control" placeholder="" name="cr_hr" id="cr_hr" value="<?php echo $data['credit_hour'];?> " required>
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
                                                        <option value="<?php echo $data['year'];?>"><?php echo $data['year'];?></option>
														<option value="First Year">First Year</option>
														<option value="Second Year">Second Year</option>
                                                        <option value="Third Year">Third Year</option>
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
                                                        <option value="<?php echo $data['semester'];?>"><?php echo $data['semester'];?> Semester</option>
														<option value="1st">1st Semester</option>
														<option value="2nd">2nd Semester</option>
                                                    </select>
                                                </div>
                                            </div>
											<div class="form-group form-md-line-input">
                                                <label class="control-label col-md-3">Instructor 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4" style="width:367px">
                                                    <select class="form-control" name="instructor" id="instructor" required>
                                                        <option value="<?php echo $data['inst_id'];?> "><?php echo $data['inst_id'];?> </option>
														<?php
														$type="Instructor";
														$aben=mysqli_query($con,"Select * from Account where user_type='$type'");
														$array = array();
														while($ro = mysqli_fetch_assoc($aben)){
									                     $array[] = $ro;
														?>
														<option value="<?php echo $ro['user_id'];?>"><?php echo $ro['user_id'];?></option><?php } ?>
													</select>
                                                </div>
                                            </div>
											<div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Description
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <textarea class="wysihtml5 form-control" rows="6" v name="description" id="description" data-error-container="#editor1_error" required ></textarea>
                                                    <div class="form-control-focus"> </div>
                                                </div>
                                            </div>
                     </div>
						                  </div>
                                        <div class="form-actions">
                                            <div class="row" style="margin-left:900px; margin-top:30px;">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green" name="register" id="register" >Update Course</button>&nbsp;&nbsp;&nbsp;
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