<?php include('head.php');?>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<?php include('header.php');?>
        <div class="clearfix"> </div>
        <div class="page-container">

<?php
$id = $_GET["ID"];
$ab=mysqli_query($con,"Select * from Course where course_code='$id'")or die(mysqli_error());
$roo = mysqli_fetch_array($ab);	
$inst_id=$roo['inst_id'];
$cname=$roo['course_name'];
$abenn=mysqli_query($con,"Select * from Caricullum where inst_id='$inst_id'")or die(mysqli_error());
$ro = mysqli_fetch_array($abenn);	
$ab=trim($ro['code']);
$ac=trim($id);
$code_come=$ro['code'];
?>
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
                        <li class="nav-item start active open ">
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
                                    <a href="course.php?ID=<?php echo $id;?>" > Course Material </a>
                                </li>
                                <li >
                                    <a href="assignment.php?ID=<?php echo $id;?>" > Assignment </a>
                                </li>
								<li class="active">
                                    <a href="viewresult.php?ID=<?php echo $id;?>" > View Result</a>
                                </li>
                            </ul>
                            <div class="tab-content">
							<center><h3><?php echo $cname;?> Grade Result</h3></center><hr>
                                <div class="tab-pane active" id="tab_1_1" >
								
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
                                            </ul>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6 profile-info">
												<?php
												       if($ab==$ac){
                                                                    $ev_1=ucfirst($ro['eval_1']);
                                                                    $ev_2=ucfirst($ro['eval_2']);
                                                                    $ev_3=ucfirst($ro['eval_3']);
                                                                    $ev_4=ucfirst($ro['eval_4']);
                                                                    $ev_5=ucfirst($ro['eval_5']);
													   $a=mysqli_query($con,"Select * from Evaluation where stud_id='$session_id' AND course_code='$id'")or die(mysqli_error());
													   $r = mysqli_fetch_array($a);	
																	$ev_11=$r['eval_1'];
                                                                    $ev_22=$r['eval_2'];
                                                                    $ev_33=$r['eval_3'];
                                                                    $ev_44=$r['eval_4'];
                                                                    $ev_55=$r['eval_5'];
																	$result=$r['result'];
                                                                    $grade=$r['grade'];
                                                                    $status=$r['status'];
												       echo '     <div class="form-group">';
                                                       echo '     <label class="control-label">Course Code</label>';
                                                       echo '     <input type="text" readonly class="form-control" value="'.$code_come.'" name="code" id="code" required/> </div>';
													   echo '	  <div class="form-group">';
                                                       echo '     <label class="control-label">Student ID</label>';
													   echo '     <input type="text" readonly class="form-control" value="'.$session_id.'" name="code" id="code" required/> </div>';
													   echo '	  <div class="form-group">';
                                                       echo '     <label class="control-label">'.$ev_1.'</label>';
                                                       echo '     <input type="text"  readonly value="'.$ev_11.'" class="form-control" name="result_1" id="result_1" /> </div>';
													   echo '     <div class="form-group">';
                                                       echo '     <label class="control-label">'.$ev_2.'</label>';
                                                       echo '     <input type="text" readonly  value="'.$ev_22.'" class="form-control" name="result_2" id="result_2" /> </div>';
													   echo '	  <div class="form-group">';
                                                       echo '     <label class="control-label">'.$ev_3.'</label>';
                                                       echo '     <input type="text" readonly value="'.$ev_33.'"  class="form-control" name="result_3" id="result_3" /> </div>';
													   echo '<div style="margin-left:500px; margin-top:-365px;" class="col-md-12 profile-info">';
													   echo '	  <div class="form-group">';
                                                       echo '     <label class="control-label">'.$ev_4.'</label>';
                                                       echo '     <input type="text" readonly value="'.$ev_44.'" class="form-control" name="result_4" id="result_4" /> </div>';
													   echo '	  <div class="form-group">';
                                                       echo '     <label class="control-label">'.$ev_5.'</label>';
                                                       echo '     <input type="text" readonly value="'.$ev_55.'" class="form-control" name="result_5" id="result_5" /> </div>';
												       echo '	  <div class="form-group">';
                                                       echo '     <label class="control-label">Result</label>';
                                                       echo '     <input type="text" readonly value="'.$result.'" class="form-control" name="result_5" id="result_5" /> </div>';
												       echo '	  <div class="form-group">';
                                                       echo '     <label class="control-label">Grade</label>';
                                                       echo '     <input type="text" readonly value="'.$grade.'" class="form-control" name="result_5" id="result_5" /> </div>';
												       echo '	  <div class="form-group">';
                                                       echo '     <label class="control-label">Status</label>';
                                                       echo '     <input type="text" readonly value="'.$status.'" class="form-control" name="result_5" id="result_5" /> </div>';
												       echo '</div>';
													   }?>
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