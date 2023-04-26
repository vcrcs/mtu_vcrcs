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
                            <br>
                           </li>
                        <li class="nav-item start active open ">
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
                            <a href="feedback.php" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title">Manage Feedbacks</span>
                            </a>
                        </li>
						<li class="nav-item  ">
                            <a href="javascript:; " class="nav-link nav-toggle">
                                <i class="icon-calendar"></i>
                                <span class="title">Schedule Adjustment</span>
								<span class="arrow"></span>
                            </a>
							<ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="schedule.php" class="nav-link ">
                                        <span class="title">Adjust</span>
                                    </a>
                                </li>
								<li class="nav-item  ">
                                    <a href="listofschedule.php" class="nav-link ">
                                        <span class="title">List of Schedule</span>
                                    </a>
                                </li></ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title">Manage Home Slide</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="changeslide.php" class="nav-link ">
                                        <span class="title">Upload Slide Photo</span>
                                    </a>
                                </li>
								<li class="nav-item  ">
                                    <a href="manageslide.php" class="nav-link ">
                                        <span class="title">Manage Slide Photo</span>
                                    </a>
                                </li>
							</ul>
						</li>
						<li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title">Manage Mission &  Vision</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="changemission.php" class="nav-link ">
                                        <span class="title">Change Mission & Vision</span>
                                    </a>
                                </li>
								<li class="nav-item  ">
                                    <a href="managemission.php" class="nav-link ">
                                        <span class="title">Manage Mission & Vision</span>
                                    </a>
                                </li>
							</ul>
						</li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title">Manage User Account</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="adduser.php" class="nav-link ">
                                        <span class="title">Add User Account</span>
                                    </a>
                                </li>
								<li class="nav-item  ">
                                    <a href="updateuser.php" class="nav-link ">
                                        <span class="title">Update User Account </span>
                                    </a>
                                </li>
								<li class="nav-item  ">
                                    <a href="deleteuser.php" class="nav-link ">
                                        <span class="title">Delete User Account </span>
                                    </a>
                                </li>
								<li class="nav-item  ">
                                    <a href="accountstatus.php" class="nav-link ">
                                        <span class="title">Activate/Deactivate Account </span>
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
                            <a href="javascript:; " class="nav-link nav-toggle">
                                <i class="icon-paper-plane"></i>
                                <span class="title">Withdraw Request</span>
								<span class="arrow"></span>
                            </a>
							<ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="withdrawal.php" class="nav-link ">
                                        <span class="title">Aprove/ Reject</span>
                                    </a>
                                </li>
								<li class="nav-item  ">
                                    <a href="withdrawalreport.php" class="nav-link ">
                                        <span class="title">Withdrawal Report</span>
                                    </a>
                                </li></ul>
                        </li>
						<li class="nav-item  ">
                            <a href="javascript:; " class="nav-link nav-toggle">
                                <i class="icon-paper-plane"></i>
                                <span class="title">Leave Request</span>
								<span class="arrow"></span>
                            </a>
							<ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="leave.php" class="nav-link ">
                                        <span class="title">Aprove/ Reject</span>
                                    </a>
                                </li>
								<li class="nav-item  ">
                                    <a href="leavereport.php" class="nav-link ">
                                        <span class="title">Leave Report</span>
                                    </a>
                                </li></ul>
                        </li>
                 
                    </ul>
                </div>
            </div>
            <!-- END SIDEBAR -->