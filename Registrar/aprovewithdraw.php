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
                                <span>Withdraw Request</span>
                            </li>
                        </ul>
                    </div>

              <div class="maincontent">       
            <form method="POST" onclick="" enctype="multipart/form-data">
							<?php
							$id = $_GET["ID"];
							$result = mysqli_query($con,"SELECT * FROM withdrawal where withdraw_id='$id'") or die(mysqli_error());	
							$data = mysqli_fetch_array($result);
							 
							 ?>		<br>
								<center>
								<div class="modal-content" style="margin-top : 5px; width : 750px; height: 720px; align :center;">
										<div class="modal-header">
											<div class="modal-title"><h3>Student Withdrawal Request</h3></div>
										</div>
										<div class="modal-body">
											
												
											<?php 
											echo '<div style="text-align: left; font-size:15px; background-color:#f6f6f6">';
											
												$pic=$data["document"];
												$name = ucfirst($data["full_name"]);
												$studid=trim($data["stud_id"]);
												echo "Name: ".'<strong>'.$name.'</strong>'.'<br>';
												echo "Department: ".'<strong>'.$data["department"].'</strong>'.'<br>';
												echo "ID Number: ".'<strong>'.$studid.'</strong>'.'<br>';
												echo "Reason For Withdrawal: ".'<strong>'.$data["reason"].'</strong>'.'<br>';
												echo "Request Date: ".'<strong>'.$data["date"].'</strong>'.'<br>';
												echo '<br>';
												
											?><div id="" style="overflow:scroll; height:400px;">
												<img src="../Uploads/<?php echo $pic;?>" style="width:690px; height: 700px;" /></div>
											<?php echo '</div>';?>
											<?php 
												$run = mysqli_query($con,"select e_mail from student where stud_id = '$studid'" ) or die(mysqli_error());
												$row = mysqli_fetch_array($run);	
												$mail=$row['e_mail'];
												$subject="Haramaya CEP School";	
											?>
										</div>
										
										
										<div class="modal-footer">
												<input type="submit" name="approve" value="Approve" class="btn btn-success">
												<input type="submit" name="reject" value="Reject" class="btn btn-danger">
												<input type="submit" name="cancel" value="Cancel" class="btn default">	
										</div>
										</form>
									</div>
									
								</center>
<?php 
						if(isset($_POST['reject'])){
									$dt = date("Y-m-d");
									mysqli_query($con,"update withdrawal set status = 'Reject', approval_date = '$dt' where withdraw_id = '$id'")or die(mysqli_error());
									$message = "Dear $name your withdrawal request is Rejected. Please don't replay!!!!!";
									mail($mail, $subject, $message, "From: "."hu_cep@haramaya.com");
									echo"<script>alert('Request for withdrawal is rejected and email notification is sent')</script>";
									echo "<script>windows: location='withdrawal.php'</script>";
							}
						else if(isset($_POST['approve'])){
							        $dt = date("Y-m-d");
									mysqli_query($con,"update Account set status = 'Withdraw' where user_id = '$studid'");
									mysqli_query($con,"update Student set acadamic_status = 'Withdraw' where stud_id = '$studid'");
									mysqli_query($con,"update withdrawal set status = 'Accept', approval_date = '$dt'  where withdraw_id = '$id'")or die(mysqli_error());		
									$message = "Dear $name your withdrawal request is accepted. Please don't replay!!!!!";
									mail($mail, $subject, $message, "From: "."hu_vcrcs@haramaya.com");
									echo"<script>alert('Request for withdrawal is accepted and email notification is sent')</script>";
									echo "<script>windows: location='withdrawal.php'</script>";
							}
						else if(isset($_POST['cancel'])){
											
									echo "<script>windows: location='withdrawal.php'</script>";
							}		
							?>								
		</div>
   </div>
               
            </div>
        </div>
                
         <?php include('footer.php');?>
<?php include('coreplugin.php');?>  