
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
						
						<li class="nav-item  ">
                            <a href="leave.php" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Leave Request</span>
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
						<li class="nav-item start active open ">
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
						<li class="nav-item">
                            <a href="mail.php" class="nav-link nav-toggle">
                                <i class="icon-envelope"></i>
                                <span class="title">Mail</span>
                            </a>
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
                                <span>Schedule Adjustment</span>
								<i class="fa fa-circle"></i>
                            </li>
							<li>
                                <span>Adjust</span>
                            </li>
                        </ul>
                       <div class="page-toolbar">
                            <div  class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" >
                                <div class="pull-right">
								<i class="icon-calendar icon-large"></i>
								<?php
								$Today = date('y:m:d');
								$new = date('l, F d, Y', strtotime($Today));
								echo $new;
								?>
							</div>
                            </div>
                        </div>
                    </div>

                    <h3 class="page-title"> Adjust Schedule </h3>

                  <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered">
							<?php
				             $error = 0;
				            if (isset($_POST['schedule'])){		
						
										$occure_on=$_POST['occure_on'];
										$event = $_POST['content'];
										$date = date("Y-m-d");
										$month = date("M"); # not this date change it to the correct one
										$year = date("Y");
										$to_day = date("d");
										$select = $_POST['select'];
                                        $post_by="Instructor";
										$status="New";
										$querys = "SELECT * FROM Schedule WHERE user_id='$session_id' ";
								         $results = mysqli_query($con,$querys)or die(mysqli_error());
								         $num_rows = mysqli_num_rows($results);
									     $rows=mysqli_fetch_array($results);
									         $date_come =$rows["date"];
											 $forevent=$rows["event"];
											 
							if($occure_on<$date){
							   echo '<div class="alert alert-dismissable alert-danger" style="margin-top:-20px;">';
												echo '<strong>'.'<center>'."The Date you use is Passed ! ".'</center>'.'<strong>';
												echo '</div>';
							}	
                           else{
						    if($date_come==$occure_on && $forevent==$event){
							   echo '<div class="alert alert-dismissable alert-danger" style="margin-top:-20px;">';
												echo '<strong>'.'<center>'." You have already post this Schedule !".'</center>'.'<strong>';
												echo '</div>';
							   }
							   else{
							   if($month=="Feb"||$month=="Mar"||$month=="Apr"||$month=="May"||$month=="Jun")
											{
											$semester="2nd";
											}
											else{
											$semester="1st";
											}
											$for="Student";
											mysqli_query($con,"insert into Schedule( date,user_id,occurance_day,month,year,event,post_for,post_by,acadamic_year,semester,status) values('$occure_on','$session_id','$to_day','$month','$year','$event','$for','$post_by','$select','$semester','$status')")or die(mysqli_error());
											
											echo '<div class="alert alert-dismissable alert-success" style="margin-top:-20px;">';
												echo '<strong>'.'<center>'."You have Adjust New Schedule for $select $semester Semester Students ! ".'</center>'.'<strong>';
												echo '</div>';
							    
							   }
						   
						   }							
                              }?>
							
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">Fill Schedule Information Below</span>
                                    </div>
                                </div>
                                <div class="portlet-body" style="margin-left:0px; width:1100px;">
                                    <!-- BEGIN FORM-->
                                    <form action="#" class="form-horizontal" id="form_sample_1" method="post" enctype="multipart/form-data">
	
									
									
                                        <div class="form-body">
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Occurance Date
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="date" class="form-control" placeholder="" name="occure_on" id="occure_on" required>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Enter the title for this News</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Schedule Event 
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <textarea class="wysihtml5 form-control" rows="6" name="content" id="content" data-error-container="#editor1_error" required></textarea>
                                                    <div class="form-control-focus"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="control-label col-md-3">Select User
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="select" id="select" required>
                                                        <option value="">---- Select to whom to be post ----</option>
														<?php
									   $qua = mysqli_query($con,"SELECT * FROM course WHERE inst_id='$session_id'");
                                       $array = array();
                                       while($rowsa = mysqli_fetch_assoc($qua)){
                                       $array[] = $rowsa; 
                                       $year_stu=$rowsa['year']; 
									   $semi_stu=$rowsa['semester']; 
									   $month=date('M');
									   if($month=="Feb"||$month=="Mar"||$month=="Apr"||$month=="May"||$month=="Jun")
											{
											$sem="2nd";
											}
											else{
											$sem="1st";
											}
									   if($semi_stu==$sem){
														?>
														<option value="<?php echo $year_stu;?>"><?php echo $year_stu;?> Student</option>
									   <?php }}?>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                         </div>
                                        <div class="form-actions">
                                            <div class="row" style="margin-left:700px">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green" name="schedule" id="schedule" >Adjust Schedule</button>&nbsp;&nbsp;&nbsp;
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
            <?php include('chat.php');?>
            <!-- END QUICK SIDEBAR -->
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