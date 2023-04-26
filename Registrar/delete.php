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
							$dt = date("Y-M-d");
							$result = mysqli_query($con,"SELECT * FROM Account where user_id='$id'") or die(mysqli_error());	
							$data = mysqli_fetch_array($result);
							 
							 ?>		<br>
								<center>
								<div class="modal-content" style="margin-top : 5px; width : 750px; height: 510px; align :center;">
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
												echo '<br>';
												
											?><div id="" style="overflow:scroll; height:200px;">
												<img src="../Uploads/<?php echo $pic;?>" style="width:200px; height: 180px;" /></div>
											<?php echo '</div>';?>
											<?php 
												$run = mysqli_query($con,"select e_mail from Account where user_id = '$studid'" ) or die(mysqli_error());
												$row = mysqli_fetch_array($run);	
												$mail=$row['e_mail'];
												$subject="Haramaya CEP School";	
											?>
										</div>
										
										
										<div class="modal-footer">
												<input type="submit" name="confirm" value="Confirm" class="btn btn-success">
												<input type="submit" name="cancel" value="Cancel" class="btn default">	
										</div>
										</form>
									</div>
									
								</center>
<?php 
						if(isset($_POST['confirm'])){
									mysqli_query($con,"delete from Account where user_id='$id'")or die(mysqli_error());
									$message = "Dear $fname $mname your Account has been deleted. Contact the Administrator. Please don't replay!!!!!";
									mail($mail, $subject, $message, "From: "."hu_vcrcs@haramaya.com");
									echo "<script>windows: location='deleteuser.php'</script>";
							}
						else if(isset($_POST['cancel'])){
											
									echo "<script>windows: location='deleteuser.php'</script>";
							}		
							?>								
		</div>
   </div>
               
            </div>
        </div>
                
         <?php include('footer.php');?>
<?php include('coreplugin.php');?>  