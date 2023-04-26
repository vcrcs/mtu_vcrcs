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
                        <li class="nav-item  ">
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
                        <li class="nav-item start active open ">
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
                                <span>Mail</span>
                            </li>
                        </ul>
                        <div class="page-toolbar">
                            <div  class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" >
                                <div class="pull-right">
								<i class="icon-calendar icon-large"></i>
								<?php
								$Today = date('y:m:d');
								$new = date('l, F d, Y', strtotime($Today));
								echo $new;
								?>
							</div>
                            </div>
                        </div>
                    </div>
                    <h3 class="page-title"> Draft
                        <small>message</small>
                    </h3>
                    <div class="inbox">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="inbox-sidebar">
                                    <a  data-title="Compose" class="btn red compose-btn btn-block" data-toggle="modal" href="#long">
                                        <i class="fa fa-edit"></i> Compose </a>
                                    <ul class="inbox-nav">
                                        <li >
                                            <a href="mail.php" data-type="inbox" data-title="Inbox"> Inbox
                                                <span class="badge badge-success">
							<?php
							            $ans = mysqli_query($con,"SELECT * FROM Account WHERE user_id='$session_id'")or die(mysqli_error());
								        $da=mysqli_fetch_array($ans);
									         $to_email =$da["e_mail"];
											 $sta="New";
									$ab = mysqli_query($con,"SELECT * FROM Mail WHERE send_to='$to_email' AND status_to='$sta' OR status_to='Read' ORDER by date"); 
										  $X=0;
										  while($na= mysqli_fetch_array($ab)){
											$X++;
											}
							?>
							<?php echo $X ?>
												</span>
                                            </a>
                                        </li>
                                        <li >
                                            <a href="sent.php" data-type="sent" data-title="Sent"> Sent 
											<span class="badge badge-success">
											<?php
							            $answe = mysqli_query( $con,"SELECT * FROM Account WHERE user_id='$session_id'")or die(mysqli_error());
								        $dat=mysqli_fetch_array($answe);
									         $too =$dat["e_mail"];
											 $statuss="Sent";
									$abenn = mysqli_query($con,"SELECT * FROM Mail WHERE send_from='$too' AND status_from='$statuss'"); 
										  $Z=0;
										  while($nasaa = mysqli_fetch_array($abenn)){
											
											$Z++;
											}
											
							?>
							<?php echo $Z ?></span></a>
                                        </li>
                                        <li class="active">
                                            <a href="draft.php" data-type="draft" data-title="Draft"> Draft
											<?php
							            $answer = mysqli_query( $con,"SELECT * FROM Account WHERE user_id='$session_id'")or die(mysqli_error());
								        $data=mysqli_fetch_array($answer);
									         $to =$data["e_mail"];
										 
    									 $stata="Draft";
                                          $Y = mysqli_num_rows(mysqli_query($con,"SELECT * FROM Mail WHERE send_from='$to' AND status_from='$stata'"));
											
							?>
											<?php
								if($Y==0){
											echo '<span class="badge badge-success">'.$Y.' </span>';	
											}
								else{
												echo '<span class="badge badge-danger">'.$Y.' </span>';
											}
								?>  
							
							
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                       
                                    </ul>
               
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="inbox-body">
                                    <div class="inbox-header">
                                        <h1 class="pull-left">Draft Message</h1>
                                        <form class="form-inline pull-right" method="post" >
                     <div class="mailbox-controls">
                     <div class="btn-group">
                      
                    </div><!-- /.btn-group -->
                    <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                    <div class="pull-right">
                      1-50/200
                      <div class="btn-group">
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                      </div><!-- /.btn-group -->
                    </div><!-- /.pull-right -->
                  </div>
                                        </form>
										<form action=" " method="post">
										<table class="table table-hover table-striped" style="border:2px solid #E1E5EC">
										<?php 
										 $query = "SELECT * FROM Account WHERE user_id='$session_id'";
								         $result = mysqli_query($con,$query)or die(mysqli_error());
								         $num_row = mysqli_num_rows($result);
									     $row=mysqli_fetch_array($result);
									         $e_mail =$row["e_mail"];
											 $stata="Draft";
                                          $querys = mysqli_query($con,"SELECT * FROM Mail WHERE send_from='$e_mail' AND status_from='$stata'"); 
								          $array = array();
										  $K=0;
										  $no_sent="No Draft Message......";
										  while($rows = mysqli_fetch_assoc($querys)){
								            $array[] = $rows; 
								          $sender=$rows["send_to"];
                                         $que=mysqli_query($con,"select * from account where e_mail='$sender'")or die(mysqli_error());
					                     $r=mysqli_fetch_array($que);
										 $string=$rows['content'];
										 $string = strip_tags($string);
                                               $K++;
                                          if (strlen($string) > 100) {
										    $stringCut = substr($string, 0, 100);
                                            $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
                                               }
										?>
                                              <tbody>
                                                  <tr>
                                                       <td><input type="checkbox"></td>
                                                       <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                                                       <td class="mailbox-name"><a href="readmail.php?ID=<?php echo $msg_id;?>"><?php echo $r['f_name']." ".$r['l_name']; ?></a></td>
                                                       <td class="mailbox-subject"><b></b><?php echo $string;?></td>
                                                       <td class="mailbox-attachment"></td>
                                                       <td class="mailbox-date"><?php echo $rows['date'];?></td>
													   
                                                   </tr><?php }?>
												 <h4 style="margin-top:70px; margin-left:50px;">  <?php if($Y==0){
														   echo $no_sent;
													   }
													   ?></h4>
											  </tbody>
                                            </table></form>
                                    </div>
                                    <div class="inbox-content"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
           <?php include('chat.php');?>
        </div>
     	<?php include('footer.php');?>  
		<?php include('coreplugin.php');?>  
</body>

<div id="long" class="modal fade modal-scroll" tabindex="-1" data-replace="true" style="margin-top:190px; margin-left:700px;">
                                        <div class="modal-dialog" style="width:800px; margin-left:-10px">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Compose Message</h4>
                                                </div>
                                                <div class="modal-body">
										<form action="#" class="form-horizontal" id="form_sample_1" method="GET" enctype="multipart/form-data" style="margin-left:-70px">		
										<?php
				$error = 0;
				if (isset($_POST['send'])){		
						
										$email=$_POST['email'];
										$subject = $_POST['subject'];
										$date = date("Y-m-d h:m:s");
										$message = $_POST['message'];
										$status_from="Sent";
										$status_to="New";
										
										$sel=mysqli_fetch_array(mysqli_query($con,"SELECT * from Account where user_id='$session_id'"));
										$email_come=$sel['e_mail'];
										$image = $_FILES['image']['tmp_name'];
										$image_name = $_FILES['image']['name'];
										$image_type = $_FILES['image']['type'];
										$image_error = $_FILES['image']['error'];
			                         
									    $selectt=mysqli_fetch_array(mysqli_query($con,"SELECT * from Account "));
										$email_verify=$selectt['e_mail'];
									 if($email==$email_verify){
										 mysqli_query($con,"insert into mail(date,send_from,send_to,subject,content,attachment,status_from,status_to) values('$date','$email_come','$email','$subject','$message','"."$image_name"."','$status_from','$status_to')")or die(mysqli_error());
										 move_uploaded_file($image,"../Uploads/".$image_name);
										 echo '<div class="alert alert-dismissable alert-success" style="margin-top:-20px;">';
										 echo '<strong>'.'<center>'."Your Message is sent successfully! ".'</center>'.'<strong>';
										 echo '</div>';
									 }
									 else{
										 echo '<div class="alert alert-dismissable alert-danger" style="margin-top:-20px;">';
										 echo '<strong>'.'<center>'."You canot send message to Un registered e_mail! ".'</center>'.'<strong>';
										 echo '</div>'; 
									 }
    									
										
										
				}
				if (isset($_POST['draft'])){		
						
										$email=$_POST['email'];
										$subject = $_POST['subject'];
										$date = date("Y-m-d h:m:s");
										$message = $_POST['message'];
										$status_from="Draft";
										$status_to=" ";
										
										$sel=mysqli_fetch_array(mysqli_query($con,"SELECT * from Account where user_id='$session_id'"));
										$email_come=$sel['e_mail'];
										$image = $_FILES['image']['tmp_name'];
										$image_name = $_FILES['image']['name'];
										$image_type = $_FILES['image']['type'];
										$image_error = $_FILES['image']['error'];
			                            
										mysqli_query($con,"insert into mail(date,send_from,send_to,subject,content,attachment,status_from,status_to) values('$date','$email_come','$email','$subject','$message','"."$image_name"."','$status_from','$status_to')")or die(mysqli_error());
											move_uploaded_file($image,"../Uploads/".$image_name);
											echo '<div class="alert alert-dismissable alert-success" style="margin-top:-20px;">';
												echo '<strong>'.'<center>'."Your Message is sent successfully! ".'</center>'.'<strong>';
												echo '</div>';
										
				}
										?>
									   <div class="form-body">
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">To: 
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="email" class="form-control" placeholder="" name="email" id="email" required>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">enter valid e_mail address</span>
                                                </div>
                                            </div>
											<div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Subject: 
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" placeholder="" name="subject" id="subject" >
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">enter suject of the message</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Message :
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <textarea class="wysihtml5 form-control" rows="6" name="message" id="message" data-error-container="#editor1_error" ></textarea>
                                                    <div class="form-control-focus"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Upload File
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="file" class="form-control" placeholder="" name="image" id="image" >
                                                    <div class="form-control-focus"> </div>
                                                </div>
                                            </div>
                                            
                                         </div>
                                        <div class="form-actions">
                                            <div class="row" style="margin-left:400px">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green" name="send" id="send" >Send Message</button>&nbsp;&nbsp;&nbsp;
													<button type="submit" class="btn green" name="draft" id="draft" >Draft</button>&nbsp;&nbsp;&nbsp;
                                                     <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
											   </div>
                                            </div>
                                        </div>
                                    </form>
                                                     </div>
                                            </div>
                                        </div>
                                    </div>

									
									
									
									
									
 <script src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="../assets/pages/scripts/form-validation-md.min.js" type="text/javascript"></script>									
									
									

<!-- Mirrored from www.keenthemes.com/preview/metronic/theme/admin_1/app_inbox.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2016 18:46:59 GMT -->
</html>