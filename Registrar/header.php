<?php include('../session.php'); ?>
<?php include('../dbcon.php'); ?>   
   <div class="page-header navbar navbar-fixed-top" style="height:0px;">
            <div class="page-header-inner ">
                <div class="page-logo">
                    <a href="index.php">
                        <img src="../assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" /> </a>
                    <div class="menu-toggler sidebar-toggler"> </div>
                </div>
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                         <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
						<?php
									$sta="Approve";
									$ab = mysqli_query($con,"SELECT * FROM Evaluation WHERE status='$sta'"); 
										  $Y=0;
										  while($na= mysqli_fetch_array($ab)){
											$Y++;
											}
							?>
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							
                                <i class="icon-bell"></i>
                                <?php
								if($Y==0){
											}
											else{
												echo '<span class="badge badge-danger">'.$Y.' </span>';
											}
								?>  
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
								<h3>You have
                                        <span class="bold"><?php echo $Y ?></span> Approved Grade</h3>
                                    <a href="mail.php">view all</a>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                        <li>
										<?php 
                                         $querys = mysqli_query($con,"SELECT * FROM Evaluation WHERE status='Approve'"); 
										  while($rows = mysqli_fetch_array($querys)){
								         $stud_id=$rows["stud_id"];
										 $code=$rows["course_code"];
										 $year=$rows["acc_year"];
										 $semi=$rows["semester"];
										 $year_c=$rows["year"];
                                         $que=mysqli_query($con,"select * from account where user_id='$stud_id'")or die(mysqli_error());
					                     $r=mysqli_fetch_array($que);
						                 $pic=$r["pro_image"];
										?>
                                            <a href="grade.php?Y=<?php echo $year_c; ?>&WY=<?php echo $year; ?>&S=<?php echo $semi; ?>">
                                                <span class="photo">
                                                    <img style="width:45px;" src="../Uploads/<?php echo $pic;?>" class="img-circle"  alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"><?php echo $r['f_name']." ".$r['m_name']; ?> </span>
                                                   </span>
                                               <span class="message">User Id = <?php echo $r['user_id']; ?> </span>
                                            </a><?php } ?>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
						<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
						<?php 
						              $stat="Request";
						              $aben = mysqli_query($con,"SELECT * FROM Withdrawal where status='$stat'"); 
									  $nasaa = mysqli_num_rows($aben);
                         ?>
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-bell"></i>
                                <?php
								if($nasaa==0){
												
											}
								else{
												echo '<span class="badge badge-danger">'.$nasaa.' </span>';
											}
								?>  
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3>
                                        <span class="bold"><?php echo $nasaa;?> Request of</span> Withdrawal</h3>
                                    <a href="withdrawal.php">view all</a>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                        <li>
										<?php 
										  $query = "SELECT * FROM Withdrawal ";
								         $result = mysqli_query($con,$query)or die(mysqli_error());
									       while($row = mysqli_fetch_assoc($result)){
											    $with_id =$row["withdraw_id"];
											    $f_name =$row["full_name"];
											    $stat=$row['status'];
												if($stat=="Request"){
											 ?>
                                            <a href="aprovewithdraw.php?ID=<?php echo $with_id;?>">
                                                <span class="time">View </span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-success">
                                                        <i class="fa fa-plus"></i>
                                                    </span> <?php echo $f_name;?> </span>
                                            </a><?php }} ?>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
						<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
						<?php 
						              $aben = mysqli_query($con,"SELECT * FROM Leave_request"); 
											  $Z=0;
										  while($nasa = mysqli_fetch_array($aben)){
											$status=$nasa['status'];
											if($status=="Request"){
											$Z++;
											}
											else{
											$Z=0;
											}
											}
										?>
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-bell"></i><?php
								if($Z==0){
												
											}
											else{
												echo '<span class="badge badge-danger">'.$Z.' </span>';
											}
								?>  
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3>
                                        <span class="bold"><?php echo $Z;?> Request of</span> Leave Clerance</h3>
                                    <a href="leave.php">view all</a>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                        <li>
										<?php 
										  $query = "SELECT * FROM Leave_request ";
								         $result = mysqli_query($con,$query)or die(mysqli_error());
									       while($row = mysqli_fetch_assoc($result)){
											    $with_id =$row["leave_id"];
											    $f_name =$row["full_name"];
											    $stat=$row['status'];
												if($stat=="Request"){
											 ?>
                                            <a href="aproveleave.php?ID=<?php echo $with_id;?>">
                                                <span class="time">View </span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-success">
                                                        <i class="fa fa-plus"></i>
                                                    </span> <?php echo $f_name;?> </span>
                                            </a><?php }} ?>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                     
                        <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
						<?php
							            $ans = mysqli_query( $con,"SELECT * FROM Account WHERE user_id='$session_id'")or die(mysqli_error());
								        $da=mysqli_fetch_array($ans);
									         $to_email =$da["e_mail"];
											 $sta="New";
									$ab = mysqli_query($con,"SELECT * FROM Mail WHERE send_to='$to_email' AND status_to='$sta'"); 
										  $X=0;
										  while($na= mysqli_fetch_array($ab)){
											$X++;
											}
							?>
							
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							
                                <i class="icon-envelope-open"></i>
                                <?php
								if($X==0){
												
											}
											else{
												echo '<span class="badge badge-danger">'.$X.' </span>';
											}
								?>  
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3>You have
                                        <span class="bold"><?php echo $X ?></span> Messages</h3>
                                    <a href="mail.php">view all</a>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                        <li>
										<?php 
										  $query = "SELECT * FROM Account WHERE user_id='$session_id'";
								         $result = mysqli_query($con,$query)or die(mysqli_error());
									     $row=mysqli_fetch_array($result);
									         $e_mail =$row["e_mail"];
											
                                          $querys = mysqli_query($con,"SELECT * FROM Mail WHERE Send_to='$e_mail'"); 
										  while($rows = mysqli_fetch_array($querys)){
								         $sender=$rows["send_from"];
								         $stat=$rows['status_to'];
										 $msg_id=$rows['id'];
											if($stat=="New"){
                                         $que=mysqli_query($con,"select * from account where e_mail='$sender'")or die(mysqli_error());
					                     $r=mysqli_fetch_array($que);
						                 $pic=$r["pro_image"];
										?>
                                            <a href="readmail.php?ID=<?php echo $msg_id;?>">
                                                <span class="photo">
                                                    <img style="width:45px;" src="../Uploads/<?php echo $pic;?>" class="img-circle"  alt=""> </span>
                                                <span class="subject">
                                                    <span class="from"><?php echo $r['f_name']." ".$r['m_name']; ?> </span>
                                                    <span class="time"><?php echo $rows['date']; ?></span>
                                                </span>
                                                <span class="message"><?php echo $rows['subject']; ?>... </span>
                                            </a><?php }} ?>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<?php 
						$query=mysqli_query($con,"select * from account where user_id='$session_id'")or die(mysql_error());
					     $row=mysqli_fetch_array($query);
						  $pic=$row["pro_image"];
						?>
                                <img alt="" class="img-circle" src="../Uploads/<?php echo $pic;?>" />
                                <span class="username username-hide-on-mobile"> <?php echo $row['f_name']." ".$row['m_name']; ?></span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="profile.php">
                                        <i class="icon-user"></i> My Profile </a>
                                </li>
                                <li>
                                    <a href="mail.php">
                                        <i class="icon-envelope-open"></i> My Inbox<?php
								if($X==0){
												
											}
											else{
												echo '<span class="badge badge-danger">'.$X.' </span>';
											}
								?>  
                                    </a>
                                </li>
                                <li>
                                    <a href="withdrawal.php">
                                        <i class="icon-bell"></i> Withdrawal<?php
								if($nasaa==0){
									
											}
											else{
												echo '<span class="badge badge-danger">'.$nasaa.' </span>';
											}
								?>  
                                    </a>
                                </li>
								<li>
                                    <a href="leave.php">
                                        <i class="icon-bell"></i> Leave<?php
								if($Z==0){
												
											}
											else{
												echo '<span class="badge badge-danger">'.$Z.' </span>';
											}
								?>  
                                    </a>
                                </li>
                                <li class="divider"> </li>
								<li>
                                    <a href="logout.php">
                                        <i class="icon-key"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-quick-sidebar-toggler">
                            <a href="javascript:;" class="dropdown-toggle">
                                <i class="icon-logout"></i>
                            </a>
                        </li>
                        <!-- END QUICK SIDEBAR TOGGLER -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>