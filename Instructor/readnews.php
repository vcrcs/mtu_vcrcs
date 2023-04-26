<html lang="en">
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
                                <a href="index.php">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Dashboard</span>
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
                    <h3 class="page-title"> Instructor Dashboard
                    </h3>
                    
                    <div class="clearfix"></div>
				   <div class="col-md-6" style="width:820px; ">
                            <div class="portlet light portlet-fit bg-inverse ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-microphone font-red"></i>
                                        <span class="caption-subject bold font-red uppercase"> Latest News</span>
                                        <span class="caption-helper">for Instructor</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="timeline  white-bg ">
									<?php
									
									$id=$_GET['ID'];?>
                               <?php
						          $type="Registrar"; 
                                  $querys = mysqli_query($con,"SELECT * FROM News WHERE news_id='$id' "); 
								  $rows = mysqli_fetch_array($querys);
								  $user_id=$rows["user_id"];
                                     $que=mysqli_query($con,"select * from account where user_id='$user_id'")or die(mysqli_error());
					                  $r=mysqli_fetch_array($que);
						                $pic=$r["pro_image"];
										 $string=$rows['content'];
										 
								  ?>
							   
                                        <div class="timeline-item">
                                            <div class="timeline-badge">
                                                <img class="timeline-badge-userpic" src="../Uploads/<?php echo $pic;?>"> </div>
                                            <div class="timeline-body">
                                                <div class="timeline-body-arrow"> </div>
                                                <div class="timeline-body-head">
                                                    <div class="timeline-body-head-caption">
                                                        <a href="javascript:;" class="timeline-body-title font-blue-madison"><?php echo $r['f_name']." ".$r['m_name']; ?></a>
                                                        <span style="align:right;;"class="timeline-body-time font-grey-cascade">Posted on <?php echo $rows['date']." From ".$rows['post_by']; ?></span>
                                                    </div>
                                                </div>
                                                <div class="timeline-body-content">
                                                    <span class="font-grey-cascade" ><?php echo $string;?></span>
                                                </div>
                                            </div>
                                        </div>
                                       </div>
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>
              
			  
			  <div class="col-md-6" style="width:400px; ">
                            <div class="portlet light portlet-fit bg-inverse ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-microphone font-red"></i>
                                        <span class="caption-subject bold font-red uppercase"> What is New </span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                  <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="width:300px; margin-left:30px;">
                            <div class="dashboard-stat blue">
                                <div class="visual">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <div class="details">
								<?php
							            $ans = mysqli_query($con, "SELECT * FROM Account WHERE user_id='$session_id'")or die(mysqli_error());
								        $da=mysqli_fetch_array($ans);
									         $to_email =$da["e_mail"];
											 $sta="New";
									$ab = mysqli_query($con,"SELECT * FROM Mail WHERE send_to='$to_email' AND status_to='$sta'"); 
										  $X=0;
										  while($na= mysqli_fetch_array($ab)){
											$X++;
											}
							?>
                                    <div class="number">
                                        <span data-counter="counterup" data-value="<?php echo $X;?>">0</span>
                                    </div>
                                    <div class="desc"> New Messagess </div>
                                </div>
                                <a class="more" href="mail.php"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div><br><br><br><br><br><br><br>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="width:300px; margin-left:30px;">
                            <div class="dashboard-stat red">
                                <div class="visual">
                                    <i class="fa fa-bar-chart-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
									<?php 
						              $aben = mysqli_query($con,"SELECT * FROM Submit where inst_id='$session_id'"); 
											  $Y=0;
										  while($nasa = mysqli_fetch_array($aben)){
											$status=$nasa['status'];
											if($status=="New"){
											$Y++;
											}
											else{
											$Y=0;
											}
											}
										?>
                                        <span data-counter="counterup" data-value="<?php echo $Y;?>">0</span></div>
                                    <div class="desc"> New Submitted Assignment </div>
                                </div>
                                <a class="more" href="downloadsubmitted.php"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div><br><br><br><br><br><br><br>
                        
                    </div>
										
			  
      
<?php include('chat.php');?>

            <!-- END QUICK SIDEBAR -->
        </div></div></div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
<?php include('footer.php');?>
<?php include('coreplugin.php');?>     
</body>
</html>