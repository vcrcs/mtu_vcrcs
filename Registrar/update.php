
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
                                <span>Update User</span>
                            </li>
                        </ul>
                      
                    </div>

                   <center> <h3 class="page-title"> Update User Information </h3></center>

                  <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered">
							<?php
				             $id = $_GET["ID"];
							 $result = mysqli_query($con,"SELECT * FROM Account where user_id='$id'") or die(mysqli_error());	
							 $data = mysqli_fetch_array($result);
				            if (isset($_POST['register'])){		
						
										$fname = $_POST['fname'];
										$mname = $_POST['mname'];
										$lname = $_POST['lname'];
										$select = $_POST['select'];
                                        $email= $data['e_mail'];
												 mysqli_query($con,"Update Account set f_name='$fname',m_name='$mname',l_name='$lname',user_type='$select' where user_id='$id'")or die(mysqli_error());
											
							              $message = "User Account Has Been Updated Now!";
											echo ' <center>	<div class="alert alert-dismissable alert-success">';
											echo '<button type="button" class="close" data-dismiss="alert">X</button>';
											echo '<strong>'.$message.'</strong>';
											echo '</div></center>';
											
											
								$subject="MTU Administration";	
									
										
$message = "Dear $fname $mname 

Your Account Has been updated By the Registrar

DON'T REPLY to this email";

											 // Send mail by PHP Mail Function
											mail($email, $subject, $message, "From: "."dereseamanuel8@gmail.com");
											echo '</div>';										
										
										}?>
							
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">Fill User Information Below</span>
                                    </div>
                                </div>
                                <div class="portlet-body" style="margin-left:0px; width:500px;">
                                    <!-- BEGIN FORM-->
                                    <form action="#" class="form-horizontal" id="form_sample_1" method="post" enctype="multipart/form-data">
                                        <div class="form-body">
						<div style=" ">		


											<div class="form-group form-md-line-input">
                                                <div class="fileinput-new thumbnail" name="" id="" style="width: 200px; height: 200px;">
																<?php 
																$query=mysqli_query($con,"select * from account where user_id='$id'")or die(mysqli_error());
																 $row=mysqli_fetch_array($query);
																  $pic=$row["pro_image"];
																?>
                                                                    <img src="../Uploads/<?php echo $pic;?>" alt="" /> <br>
																<center>	<p>User Profile Pic.</p></center>
																	</div>
                                            </div>
											<div style="margin-top:-230px;margin-left:200px" >
											<ul class="list-block" style="list-style-type: none; ">
                                                        <li>
                                                            <i style="color :red">User ID:-</i> <?php echo $data['user_id']; ?> </li>
                                                        <li>
														<li>
                                                            <i style="color :red">User Type:-</i> <?php echo $data['user_type']; ?> </li>
                                                        <li>
                                                            <i style="color :red">E-mail:- </i><?php echo $data['e_mail']; ?></li>
                                                        <li>
                                                            <i style="color :red">Phone No:- </i><?php echo $data['phone_no']; ?></li>
                                                        <li>
                                                            <i style="color :red">Account Status:-</i> <?php echo $row['status']; ?> </li>
														<li>
                                                            <i style="color :red">About User:-</i> <?php echo $row['about_me']; ?> </li>
                                                    </ul>
											</div>
															
                                          
					

						
						</div>					
						<div style="margin-left:600px; width:500px; float:left; margin-top:-200px;">	
                                       
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">First Name
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" placeholder="" name="fname" id="fname" value="<?php echo $data['f_name'];?>" required>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Enter First Name </span>
                                                </div>
                                            </div>
											<div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Middle Name
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" placeholder="" name="mname" id="mname" value="<?php echo $data['m_name'];?>"required>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Enter Middle Name </span>
                                                </div>
                                            </div>
											<div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Last Name
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" placeholder="" name="lname" id="lname" value="<?php echo $data['l_name'];?>" required>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Enter Last Name </span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group form-md-line-input">
                                                <label class="control-label col-md-3">Account Type 
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4" style="width:367px">
                                                    <select class="form-control" name="select" id="select" required>
													    <option value="<?php echo $data['user_type'];?>"><?php echo $data['user_type'];?></option>
														<?
														$abe=$data['user_type'];
														if($abe=="Instructor"){
														echo '<option value="Dep_Head">Dep_Head</option>';
														echo '<option value="Registrar">Registrar</option>';
														echo '<option value="Student">Student</option>';
														}
														else if($abe=="Dep_Head"){
														echo '<option value="Instructor">Insturactor</option>';
														echo '<option value="Registrar">Registrar</option>';
														echo '<option value="Student">Student</option>';
														}
														else if($abe=="Student"){
														echo '<option value="Instructor">Insturactor</option>';
														echo '<option value="Dep_Head">Dep_Head</option>';
														echo '<option value="Registrar">Registrar</option>';
														}
														else {
														echo '<option value="Instructor">Insturactor</option>';
														echo '<option value="Dep_Head">Dep_Head</option>';
														echo '<option value="Student">Student</option>';
														}
														?>
                                                        
                                                    </select>
                                                </div>
                                            </div>     
                     </div>
						                  </div>
                                        <div class="form-actions">
                                            <div class="row" style="margin-left:900px; margin-top:-30px;">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green" name="register" id="register" >Update User</button>
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