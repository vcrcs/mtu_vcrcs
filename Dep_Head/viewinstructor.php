html lang="en">
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
                        </li><br>
						<li class="heading">
                            <h3 class="uppercase">Features</h3>
                        </li>
                        <li class="nav-item start ">
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
						<li class="nav-item  start active open">
                            <a href="listofinstructors.php" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title">Manage Instructor</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title">Manage Course </span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="addcourse.php" class="nav-link ">
                                        <span class="title">Add Course</span>
                                    </a>
                                </li>
								<li class="nav-item  ">
                                    <a href="updatecourse.php" class="nav-link ">
                                        <span class="title">Update Course </span>
                                    </a>
                                </li>
								<li class="nav-item  ">
                                    <a href="deletecourse.php" class="nav-link ">
                                        <span class="title">Delete Course </span>
                                    </a>
                                </li>
								<li class="nav-item  ">
                                    <a href="listofcourse.php" class="nav-link ">
                                        <span class="title">List of Course</span>
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
                            <a href="mail.php" class="nav-link nav-toggle">
                                <i class="icon-envelope-open"></i>
                                <span class="title">Mail</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END SIDEBAR -->
           <div class="page-content-wrapper">
               <div class="page-content">
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.php">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>View Profile</span>
                            </li>
                        </ul>
                    </div>

              <div class="maincontent">       
            <form method="POST" onclick="" enctype="multipart/form-data">
							<?php
							$id = $_GET["ID"];
							$dt = date("Y-M-d");
							$result = mysqli_query($con,"SELECT * FROM Account where user_id='$id'") or die(mysqli_error());	
							$data = mysqli_fetch_array($result);
							 $aben=mysqli_query($con,"Select * from Course where inst_id='$id'")or die(mysqli_error());
												$kal=mysqli_num_rows($aben);
												$array = array();
													$cr=0;
												while($mita=mysqli_fetch_assoc($aben)){
													$array[] = $mita; 
												    $cr_hr = $mita['credit_hour'];
													$cr=$cr+$cr_hr;
												}
							 ?>		<br>
								<center>
								<div class="modal-content" style="margin-top : 5px; width : 750px; height: 638px; align :center;">
										<div class="modal-header">
											<div class="modal-title"><h3>View Instructor's Profile</h3></div>
										</div>
										<div class="modal-body">
														
											<?php 
											echo '<div style="text-align: left; font-size:15px; background-color:#f6f6f6">';
											
												$pic=$data["pro_image"];
												$fname = ucfirst($data["f_name"]);
												$mname = ucfirst($data["m_name"]);
												$lname = ucfirst($data["l_name"]);
												$studid=$data["user_id"];
												echo "Name: ".'<strong>'.$fname.' '.$mname.' '.$lname.'</strong>'.'<br>';
												echo "User ID: ".'<strong>'.$studid.'</strong>'.'<br>';
												echo "E_mail: ".'<strong>'.$data["e_mail"].'</strong>'.'<br>';
												echo "Phone: ".'<strong>'.$data["phone_no"].'</strong>'.'<br>';
												echo "Status: ".'<strong>'.$data["status"].'</strong>'.'<br>';
												echo "About Me: ".'<strong>'.$data["about_me"].'</strong>'.'<br>';
												echo '<br>';
											?><div id="" style="overflow:scroll; height:250px;">
												<img src="../Uploads/<?php echo $pic;?>" style="width:250px; height: 200px;" /></div>
											<?php echo '</div>';
											    
											?>
											<?php 
												$run = mysqli_query($con,"select e_mail from student where stud_id = '$studid'" ) or die(mysqli_error());
												$row = mysqli_fetch_array($run);	
												$mail=$row['e_mail'];
												$subject="MTU CEP School";
													echo'<div style="margin-top:-250px">';
											
												echo 'Num of Course to Lecture : '; echo '<b>'; echo $kal; echo' </b><br>';
												echo 'Num of Total Credit Holds : '; echo '<b>'; echo $cr; echo' </b><br>';
												echo'</div>';
											?>
										</div>
										<div class="modal-footer" style="margin-top:200px;" >
												<input type="submit" name="approve" value="Assign Course" class="btn btn-success">
												<input type="submit" name="cancel" value="Cancel" class="btn default">	
										</div>
										
											<?php 
											
						if(isset($_POST['approve'])){
							if($cr>=9){
								echo '<div class="alert alert-dismissable alert-danger" style="margin-top:0px;">';
								echo '<strong>'.'<center>'."This Instructor Hold Enogh Credit Please Assign another! ".'</center>'.'<strong>';
								echo '</div>';	
							}
							else{
								?>
								<script>windows: location='assigncourse.php?ID=<?php echo $studid; ?> '</script>;	
							<?php }
							}
						else if(isset($_POST['cancel'])){
											
									echo "<script>windows: location='listofinstructors.php'</script>";
							}		
							?>	
										</form>
									</div>
									
								</center>
					
		</div>
   </div>
               
            </div>
        </div>
                
         <?php include('footer.php');?>
<?php include('coreplugin.php');?>  