html lang="en">
<?php include('head.php');?>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<?php include('header.php');?>
        <div class="page-container">
            <?php include('sidebar.php');?>
           <div class="page-content-wrapper">
               <div class="page-content">
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index-2.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Confirm Delete</span>
                            </li>
                        </ul>
                       
                    </div>

              <div class="maincontent">       
            <form method="POST" onclick="" enctype="multipart/form-data">
							<?php
							$id = $_GET["ID"];
							$result = mysqli_query($con,"SELECT * FROM Account where user_id='$id'") or die(mysqli_error());	
							$data = mysqli_fetch_array($result);
							 ?>		<br>
								<center>
								<div class="modal-content" style="margin-top : 5px; width : 750px; height: 720px; align :center;">
										<div class="modal-header">
											<div class="modal-title"><h3>Account Deletion Form</h3></div>
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
												echo "User Type: ".'<strong>'.$data["user_type"].'</strong>'.'<br>';
												echo "User Id: ".'<strong>'.$studid.'</strong>'.'<br>';
												echo "E_mail Address: ".'<strong>'.$data["e_mail"].'</strong>'.'<br>';
												echo "Phone Num: ".'<strong>'.$data["phone_no"].'</strong>'.'<br>';
												echo "Account Status: ".'<strong>'.$data["status"].'</strong>'.'<br>';
												echo '<br>';
												
											?><div id="" style="overflow:scroll; height:400px;">
												<img src="../Uploads/<?php echo $pic;?>" style="width:690px; height: 700px;" /></div>
											<?php echo '</div>';?>
											<?php 
												$run = mysqli_query($con,"select * from Account where user_id = '$studid'" ) or die(mysqli_error());
												$row = mysqli_fetch_array($run);	
												$mail=$row['e_mail'];
												$subject="Haramaya CEP School";
												$status=$row['status'];
											?>
										</div>
										
										
										<div class="modal-footer">
										<?php 
										$Active="Active";
										$deactive="De-Active";
										if($status==$Active){
										echo'	<input type="submit" name="deactive" value="De-Activate" class="btn btn-danger">';
										}
										else if($status==$deactive){
										echo'	<input type="submit" name="active" value="Activate" class="btn btn-success">';
										}	
										else{
										echo '<input type="submit" name="active" value="Activate" class="btn btn-success">';
										}
										?>
										<input type="submit" name="cancel" value="Cancel" class="btn default">	
										</div>
										</form>
									</div>
									
								</center>
<?php 
						if(isset($_POST['active'])){
									
								    $dt = "Active";
								    mysqli_query($con,"update Account set status = '$dt'  where user_id = '$id'")or die(mysqli_error());
									mysqli_query($con,"update Student set acadamic_status = '$dt'  where stud_id = '$id'")or die(mysqli_error());
									$message = "Dear $fname $fname your Account has been Activated. Please don't replay!!!!!";
									mail($mail, $subject, $message, "From: "."hu_dcems@haramaya.com");
									echo"<script>alert('This Account has been Activated')</script>";
									echo "<script>windows: location='accountstatus.php'</script>";
							}
						else if(isset($_POST['deactive'])){
						            $dt = "De-Active";
									mysqli_query($con,"update Account set status = '$dt'  where user_id = '$id'")or die(mysqli_error());
									$message = "Dear $fname $fname your Account has been De-Activated. Please don't replay!!!!!";
									mail($mail, $subject, $message, "From: "."hu_dcems@haramaya.com");
									echo"<script>alert('This Account has been De-Activated')</script>";
									echo "<script>windows: location='accountstatus.php'</script>";
							}
						else if(isset($_POST['cancel'])){
											
									echo "<script>windows: location='accountstatus.php'</script>";
							}		
							?>								
		</div>
   </div>
               
            </div>
        </div>
                
         <?php include('footer.php');?>
<?php include('coreplugin.php');?>  