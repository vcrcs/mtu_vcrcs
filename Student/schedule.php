<html lang="en">
<?php include('head.php');?>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<?php include('header.php');?>
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
                            <a href="WebRTC-PeerJs-Demo-main/index.html" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Video Conference</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="../chat-application-using-php-ajax-jquery/index.php" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Chatting</span>
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
                        <li class="nav-item start active open ">
                            <a href="schedule.php" class="nav-link nav-toggle">
                                <i class="fa fa-calendar-plus-o"></i>
                                <span class="title">Schedule</span>
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
                                <a href="index-2.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Schedule</span>
                            </li>
                        </ul>
                        <div class="page-toolbar">
                            <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                                <i class="icon-calendar"></i>&nbsp;
                                <span class="thin uppercase hidden-xs"></span>&nbsp;
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </div>
                    </div>
                    <h3 class="page-title"> Schedule
                        <small>Schedule & statistics</small>
                    </h3>
                    
                    <div class="clearfix"></div>
				   <div class="col-md-12" >
                            <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
									<?php 
									   $query = "SELECT * FROM Student WHERE stud_id='$session_id'";
								       $result = mysqli_query($con,$query)or die(mysqli_error());
								       $num_row = mysqli_num_rows($result);
									   $row=mysqli_fetch_array($result);
									   $semester_come =$row["semester"];
								       $year_come=$row["acadamic_year"];
									   $year=date('Y');
									?>
                                        <i class="fa fa-cogs"></i>List of All Event in <?php echo $year_come;?> <?php echo $semester_come;?>  Semester of <?php echo $year;?></div>
                                    <div class="tools" style="margin-left:-93px;">
                                        <a href="javascript:;" class="collapse"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body" >
								
								
								<table class="table table-striped table-bordered table-hover" id="sample_2">
									<thead>
                        <tr>
                            <th class="head0">Date</th>
                            <th class="head1">Status</th>
                            <th class="head0">Event </th>
                            <th class="head0">From</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php
						               $query = "SELECT * FROM Student WHERE stud_id='$session_id'";
								       $result = mysqli_query($con,$query)or die(mysqli_error());
								       $num_row = mysqli_num_rows($result);
									   $row=mysqli_fetch_array($result);
									   $semester_come =$row["semester"];
								       $year_come=$row["acadamic_year"];
									   $for="Student";
									   $today=date('d');
									   $tomonth=date('M');
                                  $querys = mysqli_query($con,"SELECT * FROM Schedule WHERE post_for='$for' AND acadamic_year='$year_come' AND semester='$semester_come'");
								  $array = array();
								  while($rows = mysqli_fetch_assoc($querys)){
								  $array[] = $rows; 
								  $occurance_day=$rows['occurance_day'];
                                  $occurance_month=$rows['month'];								  
								 ?>
                        <tr class="gradeX">
                            <td><?php echo $rows['date'];?></td>
							<td>
							<?php 
			if($tomonth==$occurance_month){
						if($occurance_day>$today){
						$result=$occurance_day-$today;
						echo "The Event Occures in $result Day!";
						
						}
						else if($occurance_day==$today){
						echo "The Event Occures Today !";
						}
						else{
						$result=$today-$occurance_day;
						echo "The Event is $result Days Old!";
						}
				}
			else{
			
			}
						?>
							</td>
                            <td><?php echo $rows['event'];?></td>
                            <td><?php echo $rows['post_by'];?></td>
                        </tr> <?php } ?>
                        
                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                            <!-- END PORTLET-->
                        </div></div></div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
<?php include('footer.php');?>    
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
        <script src="../assets/pages/scripts/table-datatables-colreorder.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../../../../www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-37564768-1', 'keenthemes.com');
  ga('send', 'pageview');
</script> 