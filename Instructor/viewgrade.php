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
$aben=mysqli_query($con,"Select * from Caricullum where inst_id='$session_id'");
$rows = mysqli_fetch_array($aben);
$code=trim($rows['code']);
echo $code;
if($id==$code){
$evaluate1 = $rows['eval_1'];
$evaluate2 = $rows['eval_2'];
$evaluate3 = $rows['eval_3'];
$evaluate4 = $rows['eval_4'];
$evaluate5 = $rows['eval_5'];	
}

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
                                <li  >
                                    <a href="course.php?ID=<?php echo $id;?>" > Course Material </a>
                                </li>
                                <li >
                                    <a href="uploadassignment.php?ID=<?php echo $id;?>" > Upload Assignment </a>
                                </li>
								<li class="active">
                                    <a href="viewgrade.php?ID=<?php echo $id;?>" > View Grade </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1_1" >
                                    <div class="row">
                                    <div class="col-md-12">
									
									<?php if($id==$code){
                                 echo '<div class="portlet box green">';
                                  echo '<div class="portlet-title">';
                                    echo '  <div class="caption">';
								
									   $year=date('Y');
									
                                     echo '     <i class="fa fa-cogs"></i>List of Student Result in '.$year.' </div>';
                                     echo ' <div class="tools" style="margin-left:-93px;">';
                                     echo '     <a href="javascript:;" class="collapse"> </a>';
                                     echo ' </div>';
                                echo '  </div>';
                                echo '  <div class="portlet-body" >';
								
								
								  echo ' <table class="table table-striped table-hover table-bordered" id="sample_editable_1">';
                                     echo '     <thead>';
                                       echo '       <tr>';
                                         echo '         <th> Stud_Id </th>';
                                           echo '       <th> Full Name</th>';
                                             echo '     <th> '.$evaluate1.'</th>';
                                               echo '   <th> '.$evaluate2.'</th>';
                                                echo '  <th> '.$evaluate3.' </th>';
												  echo '<th> '.$evaluate4.'</th>';
                                                 echo ' <th> '.$evaluate5.' </th>';
                                                 echo ' <th> Result </th>';
                                                 echo ' <th> Grade</th>';
                                                 echo ' <th> Action 1 </th>';
												  echo ' <th> Action 2</th>';
                                             echo ' </tr>';
                                         echo ' </thead>';
                                        echo '  <tbody>';
											
								  $querys = mysqli_query($con,"SELECT * FROM Evaluation WHERE course_code='$code'");
								  $array = array();
								  while($ro = mysqli_fetch_assoc($querys)){
								  $array[] = $ro; 
								  $stuu=$ro['stud_id'];
								  $status=$ro['status'];
								  $qu = mysqli_num_rows(mysqli_query($con,"SELECT * FROM Evaluation WHERE course_code='$code' AND status='Incomplete'"));
								  $q = mysqli_query($con,"SELECT * FROM Student WHERE stud_id='$stuu'")or die(mysqli_error());
								  $max=mysqli_fetch_array($q);
								   
                               
                                              echo ' <tr>';
										      echo ' <td name="occ_on"> '.$ro['stud_id'].' </td>';
											  echo ' <td name="occ_on">'. $max['f_name'].''. $max['m_name'].''.$max['l_name'].' </td>';
											  echo ' <td name="occ_on">'.$ro['eval_1'].' </td>';
											  echo ' <td name="occ_on">'. $ro['eval_2'].' </td>';
											  echo ' <td name="occ_on">'. $ro['eval_3'].' </td>';
											  echo ' <td name="occ_on"> '. $ro['eval_4'].' </td>';
                                              echo ' <td name="event_occ">'. $ro['eval_5'].' </td>';
                                              echo ' <td name="event_for">'. $ro['result'].' </td>';
                                              echo ' <td name="acc_stat"> '. $ro['grade'].' </td>';
                                              echo ' <td>';?>
                                              <a  href="recordresult.php?ID=<?php echo $id;?>&IDD=<?php echo $stuu?>" > Record Result </a>
											  <?php
											  echo ' </td>';
											  echo ' <td>';
											 
											  if($status=="Incomplete"){
												echo '<a href="grade.php?ID='.$id.'&AY='.$year.'&ST='.$stuu.'"><button name="print" style="float:right;"class="btn btn-success" >Approve Course</button></a>';  
											  }
											  else{
										echo '<a href=""><button name="print" style="float:right;"class="btn btn-danger" >Course Approved</button></a>';
												}
                                              
											  echo ' </td>';
                                              echo ' </tr>';} 
                                              echo ' </tbody>';
                                              echo ' </table>  ';
                                              echo ' </div>  ';
								              echo ' </div> ';}
									          else{
										      echo '<div class="alert alert-dismissable alert-danger" style="margin-top:10px;">';
										      echo '<strong>'.'<center>'."Please Adjust Course Caricullum Before Doing any Thing ".'</center>'.'<strong>';
										      echo '</div>';
									}
									?>
                                            <!--end row-->
											<?php
										if($qu>=1){
										echo '<a href="approvegrade.php?ID='.$id.'&AY='.$year.'"><button name="print" style="float:right;"class="btn btn-success" >Approve All Course</button></a>';  
											
										}
										else if ($qu==0){
										echo '<a href=" "><button name="print" style="float:right;"class="btn btn-success" >Already Approved</button></a>';  
										}
											 
										
										?>
                                        </div>
										
                                    </div>
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