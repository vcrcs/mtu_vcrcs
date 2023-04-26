
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
                                <span>Add New User</span>
                            </li>
                        </ul>
                      
                    </div>

                    <h3 class="page-title">Add New Users</h3>

                  <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered">
							<?php
				             $error = 0;
				            if (isset($_POST['register'])){		
						
										$fname = $_POST['fname'];
										$mname = $_POST['mname'];
										$lname = $_POST['lname'];
										$select = $_POST['select'];
										$email = $_POST['email'];
										$phone = $_POST['phone'];
										$about = $_POST['about'];
                                        $status = "Active";
										$password = rand();
										$pass=($password);
                                        $image = $_FILES['image']['tmp_name'];
										$image_name = $_FILES['image']['name'];
										$image_size = getimagesize($_FILES['image']['tmp_name']);
										$image_type = $_FILES['image']['type'];
										$image_error = $_FILES['image']['error'];
			                            $stat="Active";
										$runn = mysqli_query($con,"select * from Account")or die(mysqli_error());
										while($roww = mysqli_fetch_array($runn)){
										$iddb = $roww['e_mail'];	
										if($iddb==$email){
											echo '<div class="alert alert-dismissable alert-danger" style="margin-top:-20px;">';
												echo '<strong>'.'<center>'."You have inserted Used E_mail. Please insert another!".'</center>'.'<strong>';
											echo '</div>';
											$error = 1;
										}}
										 if($image_size==FALSE && $error ==0 ){
											echo '<div class="alert alert-dismissable alert-danger error" style="margin-top:-20px;">';
												echo '<strong>'.'<center>'."That is not an image!".'</center>'.'<strong>';
											echo '</div>';
											$error = 1;
										}
										else if($image_error > 0 && $error == 0){
											echo '<div class="alert alert-dismissable alert-danger" style="margin-top:-20px;">';
												echo '<strong>'.'<center>'."There is error in uploading an image".'</center>'.'<strong>';
											echo '</div>';
											$error = 1;
										}
										
										else if($error == 0){
										
										if($select=="Admin"){
										$userid = "ADM".rand();
										mysqli_query($con,"insert into account( user_id,f_name, m_name,l_name,user_type,e_mail,phone_no,pro_image,about_me,password,status) values('$userid','$fname','$mname','$lname','$select','$email','$phone','"."$image_name"."','$about','$pass','$status')")or die(mysql_error());
											move_uploaded_file($image,"../Uploads/".$image_name);
											echo '<div class="alert alert-dismissable alert-success" style="margin-top:-20px;">';
												echo '<strong>'.'<center>'."New $select Created successfully! ".'</center>'.'<strong>';
										}
										else if($select=="Registrar"){
										$userid = "REG".rand();
										mysqli_query($con,"insert into account( user_id,f_name, m_name,l_name,user_type,e_mail,phone_no,pro_image,about_me,password,status) values('$userid','$fname','$mname','$lname','$select','$email','$phone','"."$image_name"."','$about','$pass','$status')")or die(mysql_error());
											move_uploaded_file($image,"../Uploads/".$image_name);
											echo '<div class="alert alert-dismissable alert-success" style="margin-top:-20px;">';
												echo '<strong>'.'<center>'."New $select Created successfully! ".'</center>'.'<strong>';
										}
										else if($select=="Instructor"){
										$userid = "INS".rand();
										mysqli_query($con,"insert into account( user_id,f_name, m_name,l_name,user_type,e_mail,phone_no,pro_image,about_me,password,status) values('$userid','$fname','$mname','$lname','$select','$email','$phone','"."$image_name"."','$about','$pass','$status')")or die(mysql_error());
											move_uploaded_file($image,"../Uploads/".$image_name);
											echo '<div class="alert alert-dismissable alert-success" style="margin-top:-20px;">';
												echo '<strong>'.'<center>'."New $select Created successfully! ".'</center>'.'<strong>';

            

										}
                                      else if($select=="Student"){
                                        $userid = "STD".rand();
                                        mysqli_query($con,"insert into account( user_id,f_name, m_name,l_name,user_type,e_mail,phone_no,pro_image,about_me,password,status) values('$userid','$fname','$mname','$lname','$select','$email','$phone','"."$image_name"."','$about','$pass','$status')")or die(mysql_error());
                                            move_uploaded_file($image,"../Uploads/".$image_name);
                                            echo '<div class="alert alert-dismissable alert-success" style="margin-top:-20px;">';
                                                echo '<strong>'.'<center>'."New $select Created successfully! ".'</center>'.'<strong>';
                                        }
										else{
										$userid = "DEP".rand();
										mysqli_query($con,"insert into account( user_id,f_name, m_name,l_name,user_type,e_mail,phone_no,pro_image,about_me,password,status) values('$userid','$fname','$mname','$lname','$select','$email','$phone','"."$image_name"."','$about','$pass','$status')")or die(mysql_error());
											move_uploaded_file($image,"../Uploads/".$image_name);
											echo '<div class="alert alert-dismissable alert-success" style="margin-top:-20px;">';
												echo '<strong>'.'<center>'."New $select Created successfully! ".'</center>'.'<strong>';
										}


	$subject="Mtu Administration";	
									
										
$message = "Dear $fname $mname 

 Your User Id : $userid   
Your Password : $password

Please use this information to login !

DON'T REPLY to this email";
                                           
											 // Send mail by PHP Mail Function
											mail($email, $subject, $message, "From: "."dereseamanuel8@gmail.com");
											echo '</div>';										
										
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
						<div style=" ">						
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">First Name
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="textonly" class="form-control" placeholder="" name="fname" id="fname" required>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Enter First Name </span>
                                                </div>
                                            </div>
											<div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Middle Name
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" placeholder="" name="mname" id="mname" required>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Enter Middle Name </span>
                                                </div>
                                            </div>
											<div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Last Name
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" placeholder="" name="lname" id="lname" required>
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
                                                        <option value="">---- Select type ----</option>
														<option value="Registrar">Registrar</option>
														<option value="Dep_Heaad">Department Head</option>
                                                        <option value="Instructor">Instructor</option>
                                                        <option value="Student">Student</option>
                                                     </select>
                                                </div>
                                            </div>
						</div>					
						<div style="margin-left:600px; width:500px; float:left; margin-top:-280px;">					
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">E-mail
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="email" class="form-control" placeholder="" name="email" id="email" required>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Enter E-mail Address </span>
                                                </div>
                                            </div>
											
											<div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Phone No.
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="number" maxlength=10 minlength=10	class="form-control" placeholder="" name="phone" id="phone" required>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Enter Phone Number </span>
                                                </div>
                                            </div>
											<div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Profile Pic.
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="file" class="form-control" placeholder="" name="image" id="image" required>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Please choose profile picture </span>
                                                </div>
                                            </div>
											
											<div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">About User
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <textarea class="wysihtml5 form-control" rows="6" name="about" id="about" data-error-container="#editor1_error" required></textarea>
                                                    <div class="form-control-focus"> </div>
                                                </div>
                                            </div>
                     </div>
						                  </div>
                                        <div class="form-actions">
                                            <div class="row" style="margin-left:900px; margin-top:30px;">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green" name="register" id="register" >Register User</button>&nbsp;&nbsp;&nbsp;
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
    

        <script src="../assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
        <script src="../assets/pages/scripts/components-editors.min.js" type="text/javascript"></script>
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
        <script src="../assets/pages/scripts/table-datatables-editable.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
</html>