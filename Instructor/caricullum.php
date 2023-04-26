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
						<li class="nav-item start active open ">
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
<?php
$id =trim($_GET["ID"]);
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
                                <li class="active">
                                    <a href="course.php?ID=<?php echo $id;?>" > Course Material </a>
                                </li>
                                <li >
                                    <a href="uploadassignment.php?ID=<?php echo $id;?>" > Upload Assignment </a>
                                </li>
								<li>
                                    <a href="viewgrade.php?ID=<?php echo $id;?>" > View Grade </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" class="tab-pane" id="tab_1_3">
                                    <div class="row profile-account">
                                        <div class="col-md-3">
                                           <ul class="ver-inline-menu tabbable margin-bottom-10">
											    <li >
                                                    <a href="course.php?ID=<?php echo $id;?>">
                                                        <i class="fa fa-upload"></i> Upload Material </a>
                                                    <span class="after"> </span>
                                                </li>
                                                <li>
                                                    <a  href="managematerial.php?ID=<?php echo $id;?>">
                                                        <i class="icon-puzzle"></i> Manage Material</a>
                                                </li>
												<li class="active">
                                                    <a href="caricullum.php?ID=<?php echo $id;?>">
                                                        <i class="fa fa-edit (alias)"></i>Ajust Caricullum </a>
                                                    <span class="after"> </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="tab-content">
                                                <div id="tab_1-1" class="tab-pane active">
                                                    <form action="#" class="form-horizontal" id="form_sample_1" method="post" enctype="multipart/form-data">
													<?php
													$error = 0;
				if (isset($_POST['upload'])){		
						                $id=$_GET['ID'];
										$code = $_POST['course_code'];
										$evaluate1 = $_POST['evaluate1'];
				                        $evaluate2 = $_POST['evaluate2'];
										$evaluate3 = $_POST['evaluate3'];
										$evaluate4 = $_POST['evaluate4'];
				                        $evaluate5 = $_POST['evaluate5'];
										$mark1 = $_POST['mark1'];
										$mark2 = $_POST['mark2'];
				                        $mark3 = $_POST['mark3'];
										$mark4 = $_POST['mark4'];
										$mark5 = $_POST['mark5'];
								$result=$mark1 + $mark2 + $mark3+ $mark4+ $mark5; 	
                         $A=0;
					$aben=mysqli_query($con,"Select * from Caricullum");
					while($rows = mysqli_fetch_array($aben)){
						$array[] = $rows;
                                   $id_come=$rows['inst_id'];
                                   $code_come=$rows['code'];
								   if($id_come==$session_id && $code_come==$code ){
									   $A++;
								   }
								   else{
									   $A=0;
								   }
					}
								  							   
						if($A>0 ){
							if($result==100){
								  
								  mysqli_query($con,"Update Caricullum 
							set eval_1='$evaluate1',mark_1='$mark1',eval_2='$evaluate2',mark_2='$mark2',eval_3='$evaluate3',mark_3='$mark3',eval_4='$evaluate4',mark_4='$mark4',eval_5='$evaluate5',mark_5='$mark5' where code='$code'")or die(mysqli_error());
											
							              $message = "You have Ajust Evaluation But it is Updated Now!";
											echo ' <center>	<div class="alert alert-dismissable alert-danger">';
											echo '<button type="button" class="close" data-dismiss="alert">X</button>';
											echo '<strong>'.$message.'</strong>';
											echo '</div></center>';
								  
							  }       else{
								            $message = "Sum of All Evaluation Canot be Less or Greater than 100 !";
											echo ' <center>	<div class="alert alert-dismissable alert-danger">';
											echo '<button type="button" class="close" data-dismiss="alert">X</button>';
											echo '<strong>'.$message.'</strong>';
											echo '</div></center>';
							  } 
							
							
							
							
						}
						else if ($A==0){
							if($result==100){
								  
								  $kalo=mysqli_query($con,"Insert into Caricullum (inst_id,code,eval_1,mark_1,eval_2,mark_2,eval_3,mark_3,eval_4,mark_4,eval_5,mark_5) values('$session_id','$code','$evaluate1','$mark1','$evaluate2','$mark2','$evaluate3','$mark3','$evaluate4','$mark4','$evaluate5','$mark5')")or die(mysqli_error());
											$message = "Evaluation Caricullum Ajusted Successfully !";
											echo ' <center>	<div class="alert alert-dismissable alert-success">';
											echo '<button type="button" class="close" data-dismiss="alert">X</button>';
											echo '<strong>'.$message.'</strong>';
											echo '</div></center>';
								  
							  }       else{
								            $message = "Sum of All Evaluation Canot be Less or Greater than 100 !";
											echo ' <center>	<div class="alert alert-dismissable alert-danger">';
											echo '<button type="button" class="close" data-dismiss="alert">X</button>';
											echo '<strong>'.$message.'</strong>';
											echo '</div></center>';
							  } 
						}					
				}		?>
                                                        <div class="form-group">
                                                            <label class="control-label">Course Code </label>
                                                            <input type="text" readonly name="course_code" value=" <?php echo $id;?>" class="form-control" /> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Evaluation 1</label>
															<select name="evaluate1" class="form-control" style="width:400px;" required>
															<option value="">----------------  Select Evaluation Method 1 ----------------</option>
															<option value="assignment_1">Assignment 1</option>
															<option value="assignment_2">Assignment 2</option>
															<option value="quiz_1">Quiz 1</option>
															<option value="quiz_2">Quiz 2</option>
															<option value="project">Project</option>
															<option value="mid">Mid Exam</option>
															<option value="final">Final Exam</option>
															</select>

															<label class="control-label">Evaluation 2</label>
															<select name="evaluate2" class="form-control" style="width:400px;" required>
															<option value="">----------------  Select Evaluation Method 2 ----------------</option>
															<option value="assignment_1">Assignment 1</option>
															<option value="assignment_2">Assignment 2</option>
															<option value="quiz_1">Quiz 1</option>
															<option value="quiz_2">Quiz 2</option>
															<option value="project">Project</option>
															<option value="mid">Mid Exam</option>
															<option value="final">Final Exam</option>
															</select>
                       
					                                         <label class="control-label">Evaluation 3</label>
															<select name="evaluate3" class="form-control" style="width:400px;" required>
															<option value="">----------------  Select Evaluation Method 3 ----------------</option>
															<option value="assignment_1">Assignment 1</option>
															<option value="assignment_2">Assignment 2</option>
															<option value="quiz_1">Quiz 1</option>
															<option value="quiz_2">Quiz 2</option>
															<option value="project">Project</option>
															<option value="mid">Mid Exam</option>
															<option value="final">Final Exam</option>
															</select>
															
															<label class="control-label">Evaluation 4</label>
															<select name="evaluate4" class="form-control" style="width:400px;" required>
															<option value="">----------------  Select Evaluation Method 4 ----------------</option>
															<option value="assignment_1">Assignment 1</option>
															<option value="assignment_2">Assignment 2</option>
															<option value="quiz_1">Quiz 1</option>
															<option value="quiz_2">Quiz 2</option>
															<option value="project">Project</option>
															<option value="mid">Mid Exam</option>
															<option value="final">Final Exam</option>
															</select>
															
															<label class="control-label">Evaluation 5</label>
															<select name="evaluate5" class="form-control" style="width:400px;" required>
															<option value="">----------------  Select Evaluation Method 5 ----------------</option>
															<option value="assignment_1">Assignment 1</option>
															<option value="assignment_2">Assignment 2</option>
															<option value="quiz_1">Quiz 1</option>
															<option value="quiz_2">Quiz 2</option>
															<option value="project">Project</option>
															<option value="mid">Mid Exam</option>
															<option value="final">Final Exam</option>
															</select>
															</div>
															<div class="form-group" style="margin-left:450px; margin-top:-352px;">
                                                            <label class="control-label">Set Mark for Evaluation 1 </label>
                                                            <input type="number" style="width:400px;" name="mark1" class="form-control" required />

														    <label class="control-label">Set Mark for Evaluation 2</label>
                                                            <input type="number" style="width:400px;" name="mark2" class="form-control" required />
															
															<label class="control-label">Set Mark for Evaluation 3</label>
                                                            <input type="number" style="width:400px;" name="mark3" class="form-control" required/>
															
															<label class="control-label">Set Mark for Evaluation 4 </label>
                                                            <input type="number" style="width:400px;" name="mark4" class="form-control" required />
															
															<label class="control-label">Set Mark for Evaluation 5</label>
                                                            <input type="number" style="width:400px;" name="mark5" class="form-control" required />
															 </div>
                                                        <div class="margiv-top-10" style="margin-top:40px;">
														<button type="submit" class="btn green" name="upload" id="upload" >Ajust Evaluation</button>
                                                        <button type="reset" class="btn default" name="cancel" id="cancel" >Cancel</button>
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
<script src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="../assets/pages/scripts/form-validation-md.min.js" type="text/javascript"></script>
</body>
</html>