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
$id = trim($_GET["ID"]);
$idd = $_GET["IDD"];
$abenn=mysqli_query($con,"Select * from Caricullum where inst_id='$session_id'")or die(mysqli_error());
$ro = mysqli_fetch_array($abenn);	
$ab=trim($ro['code']);
$ac=trim($id);
$code_come=$ro['code'];
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
                                    <a href="course.php?ID=<?php echo $id;?>" > Course Material </a>
                                </li>
                                <li class="active">
                                    <a href="uploadassignment.php?ID=<?php echo $id;?>" > Upload Assignment </a>
                                </li>
								<li>
                                    <a href="viewgrade.php?ID=<?php echo $id;?>" > View Grade </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div  class="tab-pane active"  id="tab_1_3">
                                    <div class="row profile-account">
                                        <div class="col-md-3">
                                            <ul class="ver-inline-menu tabbable margin-bottom-10">
                                                <li >
                                                    <a href="uploadassignment.php?ID=<?php echo $id;?>">
                                                        <i class="fa fa-upload"></i> Upload Assignment </a>
                                                    <span class="after"> </span>
                                                </li>
												<li >
                                                    <a href="manageassignment.php?ID=<?php echo $id;?>">
                                                        <i class="icon-puzzle"></i> Manage Assignment </a>
                                                    <span class="after"> </span>
                                                </li>
                                                <li >
                                                    <a  href="downloadsubmitted.php?ID=<?php echo $id;?>">
                                                        <i class="fa fa-download"></i> Download Submitted</a>
                                                </li>
                                                <li class="active">
                                                    <a>
                                                        <i class="fa fa-edit"></i> Record Result </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="tab-content">
                                              <div class="tab-pane Active">
                                                    <form action=" " method="post">
				                                 <?php
										if (isset($_POST['update'])){		
										$result_1 = trim($_POST['result_1']);
										$result_2 = trim($_POST['result_2']);
										$result_3 = trim($_POST['result_3']);
										$result_4 = trim($_POST['result_4']);
                                        $result_5 = trim($_POST['result_5']);
										$ev_1=ucfirst($ro['eval_1']);
                                        $ev_2=ucfirst($ro['eval_2']);
                                        $ev_3=ucfirst($ro['eval_3']);
                                        $ev_4=ucfirst($ro['eval_4']);
                                        $ev_5=ucfirst($ro['eval_5']);
										
										$abebe=mysqli_query($con,"Select * from Caricullum where code='$id'");
										$almaz=mysqli_fetch_array($abebe);
										 if($ab==$ac){
										$mark1=$ro['mark_1'];
										$mark2=$ro['mark_2'];
										$mark3=$ro['mark_3'];
										$mark4=$ro['mark_4'];
										$mark5=$ro['mark_5'];
										 }
										if($mark1 < $result_1){
										$message = "$ev_1 canot be greater than $mark1!";
										echo ' <center>	<div class="alert alert-dismissable alert-danger">';
										echo '<button type="button" class="close" data-dismiss="alert">X</button>';
										echo '<strong>'.$message.'</strong>';
										echo '</div></center>';
										}
										else if($mark2 < $result_2){
										$message = "$ev_2 canot be greater than $mark2!";
										echo ' <center>	<div class="alert alert-dismissable alert-danger">';
										echo '<button type="button" class="close" data-dismiss="alert">X</button>';
										echo '<strong>'.$message.'</strong>';
										echo '</div></center>';
										}
										else if($mark3<$result_3){
										$message = "$ev_3 canot be greater than $mark3!";
										echo ' <center>	<div class="alert alert-dismissable alert-danger">';
										echo '<button type="button" class="close" data-dismiss="alert">X</button>';
										echo '<strong>'.$message.'</strong>';
										echo '</div></center>';
										}
										else if($mark4<$result_4){
										$message = "$ev_4 canot be greater than $mark4!";
										echo ' <center>	<div class="alert alert-dismissable alert-danger">';
										echo '<button type="button" class="close" data-dismiss="alert">X</button>';
										echo '<strong>'.$message.'</strong>';
										echo '</div></center>';
										}
										else if($mark5<$result_5){
										$message = "$ev_5 canot be greater than $mark5!";
										echo ' <center>	<div class="alert alert-dismissable alert-danger">';
										echo '<button type="button" class="close" data-dismiss="alert">X</button>';
										echo '<strong>'.$message.'</strong>';
										echo '</div></center>';
										}
										else{
											$result=$result_1+$result_2+$result_3+$result_4+$result_5;
										if($result>100){
										$message = "User Result Canot be greater than 100 !";
										echo ' <center>	<div class="alert alert-dismissable alert-danger">';
										echo '<button type="button" class="close" data-dismiss="alert">X</button>';
										echo '<strong>'.$message.'</strong>';
										echo '</div></center>';
										}
										else{
										if($result>=90){
											$grade="A+";
										}
										else if($result>=85){
											$grade="A";
										}
										else if($result>=80){
											$grade="A-";
										}
										else if($result>=75){
											$grade="B+";
										}
										else if($result>=70){
											$grade="B";
										}
										else if($result>=65){
											$grade="B-";
										}
										else if($result>=60){
											$grade="C+";
										}
										else if($result>=50){
											$grade="C";
										}
										else if($result>=45){
											$grade="C-";
										}
										else if($result>=40){
											$grade="D";
										}
										else{
										    $grade="F";	
										}
										mysqli_query($con,"Update Evaluation set eval_1='$result_1',eval_2='$result_2',eval_3='$result_3',eval_4='$result_4',eval_5='$result_5',result='$result',grade='$grade' where stud_id='$idd' AND course_code='$id'")or die(mysqli_error());
										$message = "User Mark Result has been Updated!";
										echo ' <center>	<div class="alert alert-dismissable alert-success">';
										echo '<button type="button" class="close" data-dismiss="alert">X</button>';
										echo '<strong>'.$message.'</strong>';
										echo '</div></center>';
										echo'<script>windows: location="viewgrade.php?ID='.$id.'"</script>';
													}
										}
										}
										else if (isset($_POST['cancel'])){
											echo'<script>windows: location="viewgrade.php?ID='.$id.'"</script>';
										}
														            if($ab==$ac){
                                                                    $ev_1=ucfirst($ro['eval_1']);
                                                                    $ev_2=ucfirst($ro['eval_2']);
                                                                    $ev_3=ucfirst($ro['eval_3']);
                                                                    $ev_4=ucfirst($ro['eval_4']);
                                                                    $ev_5=ucfirst($ro['eval_5']);
													   $a=mysqli_query($con,"Select * from Evaluation where stud_id='$idd' AND course_code='$id'")or die(mysqli_error());
													   $r = mysqli_fetch_array($a);	
																	$ev_11=$r['eval_1'];
                                                                    $ev_22=$r['eval_2'];
                                                                    $ev_33=$r['eval_3'];
                                                                    $ev_44=$r['eval_4'];
                                                                    $ev_55=$r['eval_5'];
                                                       echo '     <div class="form-group">';
                                                       echo '     <label class="control-label">Course Code</label>';
                                                       echo '     <input type="text" readonly class="form-control" value="'.$code_come.'" name="code" id="code" required/> </div>';
													   echo '	  <div class="form-group">';
                                                       echo '     <label class="control-label">Student ID</label>';
													   echo '     <input type="text" readonly class="form-control" value="'.$idd.'" name="code" id="code" required/> </div>';
													   echo '	  <div class="form-group">';
                                                       echo '     <label class="control-label">'.$ev_1.'</label>';
                                                       echo '     <input type="text"  value="'.$ev_11.'" class="form-control" name="result_1" id="result_1" /> </div>';
													   echo '     <div class="form-group">';
                                                       echo '     <label class="control-label">'.$ev_2.'</label>';
                                                       echo '     <input type="text"   value="'.$ev_22.'" class="form-control" name="result_2" id="result_2" /> </div>';
													   echo '	  <div class="form-group">';
                                                       echo '     <label class="control-label">'.$ev_3.'</label>';
                                                       echo '     <input type="text"  value="'.$ev_33.'"  class="form-control" name="result_3" id="result_3" /> </div>';
													   echo '	  <div class="form-group">';
                                                       echo '     <label class="control-label">'.$ev_4.'</label>';
                                                       echo '     <input type="text"  value="'.$ev_44.'" class="form-control" name="result_4" id="result_4" /> </div>';
													   echo '	  <div class="form-group">';
                                                       echo '     <label class="control-label">'.$ev_5.'</label>';
                                                       echo '     <input type="text"value="'.$ev_55.'" class="form-control" name="result_5" id="result_5" /> </div>';
                                                       echo '     <button type="submit" name="update" class="btn btn-success">Update Record</button>';
                                                       echo '     <button type="submit" name="cancel" class="btn btn-danger">Cancel</button>';
													}
										
													else{

														$message = 'Evaluation Method is not Ajust For this course Please Ajust now &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a name="ajust" href="caricullum.php?ID='.$id.'" style="width:180px" >Ajust Evaluation Method</a>';
											echo ' <center>	<div class="alert alert-dismissable alert-danger" style="margin-top:40px;">';
											echo '<strong>'.$message.'</strong>';
											echo '</div>';
													} ?>
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
        </div>
<?php include('footer.php');?>
<?php include('coreplugin.php');?>
</body>
</html>