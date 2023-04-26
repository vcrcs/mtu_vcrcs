<?php
	if(isset($_POST['submit'])){
								include('dbcon.php');
								if (isset($_POST['submit'])){
								$e_mail = $_POST['email'];
								$subject="Password Recovery";	
								$query = "SELECT * FROM Account WHERE e_mail='$e_mail' ";
								$result = mysqli_query($con,$query)or die(mysqli_error());
								$num_row = mysqli_num_rows($result);
									$row=mysqli_fetch_array($result);
									$fname =$row["f_name"];
									$mname =$row["m_name"];
									$pass =base64_decode($row["password"]);
									if( $num_row > 0 ) {
									
										$message = "Dear $fname $mname  your recovery password is $pass. You can login now ...!";
                                            

                                          
											 // Send mail by PHP Mail Function
											mail($e_mail, $subject, $message, "From: "."dereseamanuel8@gmail.com");
											echo '<div class="alert alert-dismissable alert-success"><strong>';
											echo "<center> Password recovery sent to your e-mail</center>";
											echo '</strong></div>';
									}
									else{ 
									header('location:access_password.php');
								}}
								}
								?>