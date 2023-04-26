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
						
						<li class="nav-item start active open ">
                            <a href="leave.php" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Leave Request</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                           <a href="../chat-application-using-php-ajax-jquery/index.php" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Chatting</span>
                           </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="WebRTC-PeerJs-Demo-main/index.html" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Video Conference</span>
                            </a>
                        </li>

						<li class="nav-item ">
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
				
                        
                    </ul>
                </div>
            </div>
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.php">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Leave</span>
                            </li>
                        </ul>
                    </div>

                    <h3 class="page-title">Request for Leave
                    </h3>

                  <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light  portlet-fit portlet-form bordered " >
							
							
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">Fill your Information Below</span>
                                    </div>
                                </div>
                                <div class="portlet-body" style="margin-left:0px;">
                                    <!-- BEGIN FORM-->
                                    <form action="#" class="form-horizontal" id="form_sample_1" method="post" enctype="multipart/form-data">
									<?php
				$error = 0;
				if (isset($_POST['submit_form'])){		
						
										$id=$_POST['ID'];
										$comment = $_POST['comment'];
										$date = date("Y-m-d");
										$year = date("Y");
										$status="Request";
										
										function generateRandomString($length = 4) {
                                         return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
                                         }
                                      $withdraw_id = generateRandomString();
										
										
										$run = mysqli_query($con,"select * from Account where user_id ='$session_id'")or die(mysqli_error());
										$row = mysqli_fetch_array($run);
										$fullname = $row['f_name']." ".$row['m_name']." ".$row['l_name'];
										$dept = "Information Systems";
										$iddb = $row['user_id'];	
										if($iddb!=$id){
											echo '<div class="alert alert-dismissable alert-danger" style="margin-top:-20px;">';
												echo '<strong>'.'<center>'."You have inserted incorrect ID number. Please insert your own Id number!".'</center>'.'<strong>';
											echo '</div>';
											$error = 1;
										}
										$image = $_FILES['image']['tmp_name'];
										$image_name = $_FILES['image']['name'];
										$image_size = getimagesize($_FILES['image']['tmp_name']);
										$image_type = $_FILES['image']['type'];
										$image_error = $_FILES['image']['error'];
			
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
										}else if($comment == "" && $error == 0){
											echo '<div class="alert alert-dismissable alert-danger error" style="margin-top:-20px;">';
												echo '<strong>'.'<center>'."Please enter the reason in reason field".'</center>'.'<strong>';
											echo '</div>';
											$error = 1;
										}
										else if($error == 0){
										
										$querys = "SELECT * FROM Leave_request WHERE inst_id='$session_id'";
								         $results = mysqli_query($con,$querys)or die(mysqli_error());
								         $num_rows = mysqli_num_rows($results);
									     $rows=mysqli_fetch_array($results);
									         $stud_id =$rows["inst_id"];
											 
											 $year_come=$rows["year"];
                               if($stud_id==$id && $year_come==$year){
							   echo '<div class="alert alert-dismissable alert-danger" style="margin-top:-20px;">';
												echo '<strong>'.'<center>'."You have already requested a Leave ! ".'</center>'.'<strong>';
												echo '</div>';
							   }
										
										else{
											mysqli_query($con,"insert into Leave_request( leave_id,inst_id, full_name,department,reason,document,date,year,status) values('$withdraw_id','$id','$fullname','$dept','$comment','"."$image_name"."','$date','$year','$status')")or die(mysqli_error());
											move_uploaded_file($image,"../Uploads/".$image_name);
											echo '<div class="alert alert-dismissable alert-success" style="margin-top:-20px;">';
												echo '<strong>'.'<center>'."Your Leave request is sent successfully! $stud_id $year_come ".'</center>'.'<strong>';
												
												
												
								$subject="Haramaya university Administration";	
								$query = "SELECT * FROM Account WHERE user_id='$id' ";
								$result = mysqli_query($con,$query)or die(mysqli_error());
								$num_row = mysqli_num_rows($result);
									$row=mysqli_fetch_array($result);
									       $fname =$row["f_name"];
									       $mname =$row["m_name"];
										   $e_mail =$row["e_mail"];		
$message = "Dear $fname $mname 

PLEASE DON'T ENGAGE TO DO ANYTHING BEFORE YOUR LEAVE REQEUEST APROVE !! 


DON'T REPLY to this email";

											 // Send mail by PHP Mail Function
											mail($e_mail, $subject, $message, "From: "."hu_vcrcs@haramaya.com");
											echo '</div>';
										}}
										
													
		}						
		?>
									
									
                                        <div class="form-body">
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Your Id Number
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" placeholder="" name="ID" id="ID" required>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">enter your correct id number</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Your Reason
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <textarea class="wysihtml5 form-control" rows="6" name="comment" id="comment" data-error-container="#editor1_error" required></textarea>
                                                    <div class="form-control-focus"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Upload File
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="file" class="form-control" placeholder="" name="image" id="image" required>
                                                    <div class="form-control-focus"> </div>
                                                </div>
                                            </div> 
                                            
                                         </div>
                                        <div class="form-actions">
                                            <div class="row" style="margin-left:700px">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green" name="submit_form" id="submit_form" >Send Request</button>&nbsp;&nbsp;&nbsp;
                                                    <button type="reset"  class="btn default">Clear Data</button>
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

<!-- Mirrored from www.keenthemes.com/preview/metronic/theme/admin_1/form_validation_md.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2016 18:49:56 GMT -->
</html>