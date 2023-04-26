<?php include('../session.php'); ?>
<?php include('../dbcon.php'); ?>   
   <div class="page-header navbar avbar-fixed-top" style="height:0px;">
   	<?php error_reporting(0); ?> 
            <div class="page-header-inner ">
                <div class="page-logo">
                    <a href="index.php" style="margin-top:-7px; margin-left:15px;">
                        <img src="../assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" /> </a>
                    <div class="menu-toggler sidebar-toggler"> </div>
                </div>
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
						<?php 
						              $counta = "SELECT * FROM Student WHERE stud_id='$session_id'";
								         $answera = mysqli_query($con,$counta)or die(mysqli_error());
									     $dataa=mysqli_fetch_array($answera);
									         $year =$dataa["acadamic_year"];
											 $semester =$dataa["semester"];
									  $aben = mysqli_query($con,"SELECT * FROM Schedule where acadamic_year='$year' AND semester='$semester'"); 
											  $Y=0;
										  while($nasa = mysqli_fetch_array($aben)){
											$status=$nasa['status'];
											$date=$nasa['date'];
											$now=date('Y-m-d');
											if($status=="New" && $date>=$now){
											$comp=$date-$now;
											$Y++;
											}
											else{
											$Y=0;
											}
											}
										?>
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-calendar"></i>
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
                                    <h3>
                                        <span class="bold"><?php echo $Y;?> </span> Event are Waiting to happen</h3>
                                    <a href="schedule.php">view all</a>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                        <li>
										<?php 
						              $counta = "SELECT * FROM Student WHERE stud_id='$session_id'";
								         $answera = mysqli_query($con,$counta)or die(mysqli_error());
									     $dataa=mysqli_fetch_array($answera);
									         $year =$dataa["acadamic_year"];
											 $semester =$dataa["semester"];
									  $aben = mysqli_query($con,"SELECT * FROM Schedule where acadamic_year='$year' AND semester='$semester'"); 
											  $Y=0;
										  while($nasa = mysqli_fetch_array($aben)){
											$status=$nasa['status'];
											$date=$nasa['date'];
											$now=date('Y-m-d');
											if($status=="New" && $date >= $now){
												$comp=$date-$now;
												$content=$nasa['event'];
												?>
                                            <a href="schedule.php">
                                                <span class="time"><?php echo $comp;?> days Left</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-success">
                                                        <i class="fa fa-plus"></i>
                                                    </span> <?php echo $content;?></span>
										  </a><?php }}?>
                                        </li>
                                        
                                    </ul>
                                </li>
                            </ul>
                        </li>
                     
                        <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<?php
							$count = "SELECT * FROM Account WHERE user_id='$session_id'";
								         $answer = mysqli_query($con,$count)or die(mysqli_error());
								         $num = mysqli_num_rows($answer);
									     $data=mysqli_fetch_array($answer);
									         $to =$data["e_mail"];
									$aben = mysqli_query($con,"SELECT * FROM Mail WHERE send_to='$to'"); 
										  $X=0;
										  while($nasa = mysqli_fetch_array($aben)){
											$status=$nasa['status_to'];
											if($status=="New"){
											$X++;
											}
											else{
											$X=0;
											}
											}
							?>
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
                                        <span class="bold"><?php echo $X ?></span>New Messages</h3>
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
                                          $querys = mysqli_query($con,"SELECT * FROM Mail WHERE send_to='$e_mail'"); 
										  while($rows = mysqli_fetch_array($querys)){
								          $sender=$rows["send_from"];
										  $stat=$rows['status_to'];
											if($stat=="New"){
                                         $que=mysqli_query($con,"select * from Account where e_mail='$sender'")or die(mysqli_error());
					                     $r=mysqli_fetch_array($que);
						                 $pic=$r["pro_image"];
										?>
                                            <a href="mail.php?">
                                                <span class="photo">
                                                    <img style=" margin-left:-10px; width:40px;" src="../Uploads/<?php echo $pic;?>" class="img-circle"  alt=""> </span>
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
                        <!-- END INBOX DROPDOWN -->
                        <!-- BEGIN TODO DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
						<?php 
						              $coun = "SELECT * FROM Student WHERE stud_id='$session_id'";
								         $answe = mysqli_query($con,$coun)or die(mysqli_error());
									     $dat=mysqli_fetch_array($answe);
									         $year =$dat["acadamic_year"];
											 $semester =$dat["semester"];
									  $abena = mysqli_query($con,"SELECT * FROM Assignment"); 
											  $K=0;
										  while($nasaa = mysqli_fetch_array($abena)){
											$status=trim($nasaa['status']);
											$code=trim($nasaa['code']);
											$datea=$nasaa['dead_line'];
											$nowa=date('Y-m-d');
									  $zew= mysqli_query($con,"SELECT * FROM Course where course_code='$code'");
											$na= mysqli_fetch_array($zew);
												$year_come=trim($na['year']);
											    $semi_come=trim($na['semester']);
												if($year==$year_come && $semester==$semi_come){
													if($status=="New" ){
														$comp=$datea-$nowa;
														
														$K=1;
													}
													else{
														$K=0;
														}
												}
											}
											
										?>
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-bell"></i>
                                <?php
								if($K==0){
											
											}
								else{
												echo '<span class="badge badge-danger">'.$K.' </span>';
											}
								?>
                            </a>
							
							
							
							
                            <ul class="dropdown-menu extended tasks">
                                <li class="external">
                                    <h3>You have
                                        <span class="bold"><?php echo $K?> pending</span> Assignments</h3>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                        <li>
										<?php 
						              $coun = "SELECT * FROM Student WHERE stud_id='$session_id'";
								         $answe = mysqli_query($con,$coun)or die(mysqli_error());
									     $dat=mysqli_fetch_array($answe);
									         $year =$dat["acadamic_year"];
											 $semester =$dat["semester"];
									  $abena = mysqli_query($con,"SELECT * FROM Assignment"); 
											  $K=0;
										  while($nasaa = mysqli_fetch_array($abena)){
											$status=$nasaa['status'];
											$code=trim($nasaa['code']);
											$ass_id=trim($nasaa['ass_id']);
											$datea=$nasaa['dead_line'];
											$nowa=date('Y-m-d');
									  $zew= mysqli_query($con,"SELECT * FROM Course where course_code='$code'");
											$na= mysqli_fetch_array($zew);
												$year_come=trim($na['year']);
											    $semi_come=trim($na['semester']);
												if($year==$year_come && $semester==$semi_come){
													if($status=="New" ){
														$comp=$datea-$nowa;?>
                                            <a href="assignment.php?ID=<?php echo $code;?>">
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-success">
                                                        <i class="fa fa-plus"></i>
                                                    </span> <?php echo $ass_id;?></span> For  
													<?php echo '<span class="time">'.$datea.'</span> ';?>
													
										  </a><?php }}}?>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<?php 
						$query=mysqli_query($con,"select * from account where user_id='$session_id'")or die(mysqli_error());
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
                                    <a href="schedule.php">
                                        <i class="icon-calendar"></i> My Event
										<?php 
						              $counta = "SELECT * FROM Student WHERE stud_id='$session_id'";
								         $answera = mysqli_query($con,$counta)or die(mysqli_error());
									     $dataa=mysqli_fetch_array($answera);
									         $year =$dataa["acadamic_year"];
											 $semester =$dataa["semester"];
									  $aben = mysqli_query($con,"SELECT * FROM Schedule where acadamic_year='$year' AND semester='$semester'"); 
											  $Y=0;
										  while($nasa = mysqli_fetch_array($aben)){
											$status=$nasa['status'];
											$date=$nasa['date'];
											$now=date('Y-m-d');
											if($status=="New" && $date>=$now){
											$comp=$date-$now;
											$Y++;
											}
											else{
											$Y=0;
											}
											}
											
											if($Y==0){
											}
											else{
												echo '<span class="badge badge-danger">'.$Y.' </span>';
											}
										?>
										

										</a>
										
                                </li>
                                <li>
                                    <a href="mail.php">
                                        <i class="icon-envelope-open"></i> My Inbox
                                        <?php
							$count = "SELECT * FROM Account WHERE user_id='$session_id'";
								         $answer = mysqli_query($con,$count)or die(mysqli_error());
								         $num = mysqli_num_rows($answer);
									     $data=mysqli_fetch_array($answer);
									         $to =$data["e_mail"];
									$aben = mysqli_query($con,"SELECT * FROM Mail WHERE send_to='$to'"); 
										  $X=0;
										  while($nasa = mysqli_fetch_array($aben)){
											$status=$nasa['status_to'];
											if($status=="New"){
											$X++;
											}
											else{
											$X=0;
											}
											}
											if($X==0){
											}
											else{
												echo '<span class="badge badge-danger">'.$X.' </span>';
											}
							?>
                                    </a>
                                </li>
                                <li>
                                    <a >
                                        <i class="icon-bell"></i> My Assignment
										<?php 
						              $coun = "SELECT * FROM Student WHERE stud_id='$session_id'";
								         $answe = mysqli_query($con,$coun)or die(mysqli_error());
									     $dat=mysqli_fetch_array($answe);
									         $year =$dat["acadamic_year"];
											 $semester =$dat["semester"];
									  $abena = mysqli_query($con,"SELECT * FROM Assignment"); 
											  $K=0;
										  while($nasaa = mysqli_fetch_array($abena)){
											$status=$nasaa['status'];
											$code=trim($nasaa['code']);
											$datea=$nasaa['dead_line'];
											$nowa=date('Y-m-d');
									  $zew= mysqli_query($con,"SELECT * FROM Course where course_code='$code'");
											$na= mysqli_fetch_array($zew);
												$year_come=trim($na['year']);
											    $semi_come=trim($na['semester']);
												if($year==$year_come && $semester==$semi_come){
													if($status=="New" ){
														$comp=$datea-$nowa;
														$K++;
													}
													else{
														$K=0;
														}
												}
											}
											if($K==0){
												
											}
											else{
												echo '<span class="badge badge-danger">'.$K.' </span>';
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