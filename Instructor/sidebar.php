<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        
    </title>
</head>
<body>


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
                        <li class="nav-item start active open">
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
            <!-- END SIDEBAR -->

        </body>

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