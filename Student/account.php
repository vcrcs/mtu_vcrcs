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
                        <li class="nav-item  ">
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
                                    <a href="profile.php" > Overview </a>
                                </li>
                                <li class="active">
                                    <a href="account.php" > Account </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" class="tab-pane" id="tab_1_3">
                                    <div class="row profile-account">
                                        <div class="col-md-3">
                                            <ul class="ver-inline-menu tabbable margin-bottom-10">
                                                <li class="active">
                                                    <a href="account.php">
                                                        <i class="fa fa-cog"></i> Update Information </a>
                                                    <span class="after"> </span>
                                                </li>
                                                <li >
                                                    <a  href="profileimage.php">
                                                        <i class="fa fa-picture-o"></i>Profile Picture </a>
                                                </li>
                                                <li>
                                                    <a href="changepassword.php">
                                                        <i class="fa fa-lock"></i> Change Password</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="tab-content">
                                                <div id="tab_1-1" class="tab-pane active">
                                                    <form action="#" class="form-horizontal" id="form_sample_1" method="post" enctype="multipart/form-data">
													<?php 
													
				            if (isset($_POST['save'])){		
						$error = 0;
										$e_mail=$_POST['e_mail'];
										$phone = $_POST['phone'];
										$about = $_POST['about'];
										
										$runn = mysqli_query($con,"select * from Account")or die(mysqlii_error());
										while($roww = mysqli_fetch_array($runn)){
										$iddb = $roww['e_mail'];	
										if($iddb==$e_mail){
											echo '<div class="alert alert-dismissable alert-danger" style="margin-top:-20px;">';
												echo '<strong>'.'<center>'."You have inserted Used E_mail. Please insert another!".'</center>'.'<strong>';
											echo '</div>';
											$error = 1;
										}}
									if($error = 0)	{
										mysqli_query($con,"Update Account set e_mail='$e_mail',phone_no='$phone',about_me='$about' where user_id='$session_id' ")or die(mysqli_error());
											
							              $message = "Your Profile is Updated Now!";
											echo ' <center>	<div class="alert alert-dismissable alert-success" style="margin-top=20px";>';
											echo '<button type="button" class="close" data-dismiss="alert">X</button>';
											echo '<strong>'.$message.'</strong>';
											echo '</div></center>';
								  	
									}
									
							
							
							}
													?>
													
													<?php
													$query=mysqli_query($con,"select * from account where user_id='$session_id'")or die(mysqli_error());
													$row=mysqli_fetch_array($query);
													?>
                                                        <div class="form-group">
                                                            <label class="control-label">Full Name</label>
                                                            <input type="text" readonly value="<?php echo $row['f_name']." ".$row['m_name']." ".$row['l_name']; ?>" class="form-control" /> </div>
														<div class="form-group">
                                                            <label class="control-label">User ID</label>
                                                            <input type="text" readonly value="<?php echo $row['user_id']; ?>" class="form-control" /> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">E-mail Address</label>
                                                            <input type="text" value="<?php echo $row['e_mail']; ?>" name="e_mail" class="form-control" required /> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Mobile Number</label>
                                                            <input type="number" value="<?php echo $row['phone_no']; ?>" name="phone"  class="form-control" required  /> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">About</label>
                                                            <textarea class="form-control" name="about" rows="5" value="<?php echo $row['about_me']; ?>" required ></textarea>
                                                        </div>
                                                        <div class="margiv-top-10">
                                                        <button type="submit" class="btn green" name="save" id="save" >Save Changes</button>
                                                        <button type="reset" class="btn danger" name="cancel" id="cancel" >Cancel</button>
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
        <script src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="../assets/pages/scripts/form-validation-md.min.js" type="text/javascript"></script>
        </div>
<?php include('footer.php');?>
<?php include('coreplugin.php');?>
</body>
</html>