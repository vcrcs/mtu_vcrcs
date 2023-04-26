<?php include('head.php');?>
<?php include('../session.php');?>
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
                        <li class="nav-item ">
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
                                <span>Manage Profile </span>
                            </li>
                        </ul>
                    </div>
					<h3 class="page-title"> User Profile
                        <small>manage your own account</small>
                    </h3>
                    <div class="profile">
                        <div class="tabbable-line tabbable-full-width">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="profile.php"> Overview </a>
                                </li>
                                <li>
                                    <a href="account.php" > Account </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1_1" style="width:1600px">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <ul class="list-unstyled profile-nav">
                                                <li>
                                                <?php
                            $result = mysqli_query($con,"SELECT * FROM account where user_id='$session_id'") or die(mysqli_error());   
                            $data = mysqli_fetch_array($result);
                             $pic=$data["pro_image"];
                             ?>
                             <img src="../Uploads/<?php echo $pic;?>" class="img-responsive pic-bordered" alt="" />
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Friends </a>
                                                </li>
                                                <li>
                                            </ul>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-8 profile-info">
                                                <?php 
                        $query=mysqli_query($con,"select * from account where user_id='$session_id'")or die(mysqli_error());
                         $row=mysqli_fetch_array($query);
                         $quer=mysqli_query($con,"select * from student where stud_id='$session_id'")or die(mysqli_error());
                         $rows=mysqli_fetch_array($quer);
                        ?>
                                                
                                                    <h1 class="font-green sbold uppercase"><?php echo $row['f_name']." ".$row['m_name']." ".$row['l_name']; ?> </h1>
                                                    <p> <?php echo $row['about_me']; ?></p>
                                                    <p>
                                                        <a href="javascript:;"> www.mywebsite.com </a>
                                                    </p>
                                                    <ul class="list-block" style="list-style-type: none;">
                                                        <li>
                                                            <i ></i>Id Number:- <?php echo $rows['stud_id']; ?> </li>
                                                        <li>
                                                        <li>
                                                            <i ></i>Sex:- <?php echo $rows['sex']; ?> </li>
                                                        <li>
                                                            <i ></i>Age:-  <?php echo $rows['age']; ?></li>
                                                        <li>
                                                        <li>
                                                            <i ></i>Birth Date:- <?php echo $rows['birth_date']; ?></li>
                                                        <li>
                                                        <li>
                                                            <i ></i> Region:- <?php echo $rows['region']; ?> </li>
                                                        <li>
                                                            <i ></i>E-mail:- <?php echo $rows['e_mail']; ?></li>
                                                        <li>
                                                            <i ></i>Phone No:- <?php echo $rows['phone_no']; ?></li>
                                                        <li>
                                                            <i ></i>Department:- <?php echo $rows['department']; ?> </li>
                                                        <li>
                                                            <i ></i>Acadamc Year:- <?php echo $rows['acadamic_year']; ?> </li>
                                                        <li>
                                                        <li>
                                                            <i ></i>Semester:- <?php echo $rows['semester']; ?> Semester</li>
                                                        <li>
                                                        <li>
                                                            <i ></i>Registered on:- <?php echo $rows['year_of_registration']; ?> </li>
                                                        <li>
                                                        <li>
                                                            <i ></i>Graduate on:- <?php echo $rows['year_of_graduate']; ?> </li>
                                                        <li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--end row-->
                                        </div>
                                    </div>
                                </div>
                                <!--tab_1_2-->
                                <div class="tab-pane" id="tab_1_3">
                                    <div class="row profile-account">
                                        <div class="col-md-3">
                                            <ul class="ver-inline-menu tabbable margin-bottom-10">
                                                <li >
                                                    <a href="uploadassignment.php?ID=<?php echo $id;?>">
                                                        <i class="fa fa-cog"></i> Upload Assignment </a>
                                                    <span class="after"> </span>
                                                </li>
                                                <li >
                                                    <a  href="downloadsubmitted.php?ID=<?php echo $id;?>">
                                                        <i class="fa fa-picture-o"></i> Download Submitted</a>
                                                </li>
                                                <li >
                                                    <a href="recordresult.php?ID=<?php echo $id;?>">
                                                        <i class="fa fa-lock"></i> Record Result </a>
                                                </li>
                                            </ul>
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
</html>