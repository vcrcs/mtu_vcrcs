								<?php
								include('dbcon.php');
								if (isset($_POST['login'])){
								session_start();
								$user_id = trim($_POST['user_id']);
								$password = $_POST['password'];
								$e_pass=trim(base64_encode($password));
								$query = "SELECT * FROM account WHERE user_id='$user_id' AND password='$e_pass' ";
								$result = mysqli_query($con,$query)or die(mysqli_error());
								$num_row = mysqli_num_rows($result);
								$row=mysqli_fetch_array($result);
								$row_id=$row['user_id'];
								$status=$row['status'];
								$abena = mysqli_query($con,"SELECT * FROM Assignment where status='New'"); 
										while($keb=mysqli_fetch_array($abena)){
											$date_co=trim($keb['dead_line']);
											$c_co=trim($keb['code']);
											$dat=date('Y-m-d');
											echo $date_co;
												echo $dat;
											if($dat>$date_co){
												mysqli_query($con,"Update Assignment set status='Pass' where dead_line='$date_co'");
											}
										}
												
								 $aben = mysqli_query($con,"SELECT * FROM Schedule where status='New'"); 
										while($kebe=mysqli_fetch_array($aben)){
											$date_come=$kebe['date'];
											$date=date('Y-m-d');
											if($date>$date_come){
												mysqli_query($con,"Update Schedule set status='Pass' where date='$date_come'");
											}
										}
								
								$ab = mysqli_query($con,"SELECT * FROM Withdrawal where status='Accept'"); 
										while($kebo=mysqli_fetch_array($ab)){
											$year=$kebo['year'];
											$da=date('Y');
											$stud_id=$kebo['stud_id'];
										
										}
								
								 $user_type =$row["user_type"];
									$row=mysqli_fetch_array($result);
									if( $num_row > 0 ) {                                  
									if($user_type=="Registrar"){
									header('location:Registrar/index.php');
									$_SESSION['id']=$row_id;
									}
									else if($user_type=="Dep_Head"){
									header('location:Dep_Head/index.php');
									$_SESSION['id']=$row_id;
									}
									else if($user_type=="Instructor"){
									header('location:Instructor/index.php');
									$_SESSION['id']=$row_id;
									}
									else if($user_type=="Student"){
									
									if($status=="Active"){
								
									header('location:Student/index.php');
									$_SESSION['id']=$row_id;
									}	
									else if($status=="Withdraw"){
									echo"<script>alert('Your account has been temporally Deactivated, because you have withdrew for this semester')</script>";
									echo "<script>windows: location='index.php'</script>";
									}
									else{
									echo"<script>alert('Your account has been temporally Deactivated')</script>";
									echo "<script>windows: location='index.php'</script>";
									}
									}
									else{ 
								header('location:access_denied.php');
								}}
								else{ 
								header('location:access_denied.php');
								}
							}	?>