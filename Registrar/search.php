<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<?php include('head.php');?>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/pages/css/search.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="../assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white">
   <?php include('header.php');?>   
        <div class="clearfix"> </div>
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
                    <h3 class="page-title"> Registrar Dashboard
                    </h3>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <div class="search-page search-content-1">
					<form action="search.php" class="form-horizontal" id="form_sample_1" method="post" enctype="multipart/form-data" >
                        <div class="search-bar ">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="input-group">
                                        <input type="text" style="height:40px" class="form-control" name="search_for" placeholder="Search for...">
                                        <span class="input-group-btn">
                                            <button  style="height:40px"  class="btn blue uppercase bold" type="submit">Search</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <p class="search-desc clearfix"> Search for NEWS using News Title that you can remeber </p>
                                </div>
                            </div>
                        </div>
						</form>
                        <div class="row">
                            <div class="col-md-7" style="width:820px;  ">
                                <div class="search-container ">
                                    <ul>
									<?php
								  $search=$_POST['search_for'];
						          $type="Registrar"; 
                                  $querys = mysqli_query($con,"SELECT * FROM News ORDER BY date DESC") or die(mysqli_error()); 
								  $array = array();
								  $A=0;
								  while($rows = mysqli_fetch_assoc($querys)){
								  $array[] = $rows;
								  $news_for=$rows['news_for']; 
								  $title=$rows['title']; 
								  $date_come=$rows['date']; 
								  if($news_for==$type && $title==$search){
									  $A++;
									$user_id=$rows["user_id"];
                                     $que=mysqli_query($con,"select * from account where user_id='$user_id'")or die(mysqli_error());
					                  $r=mysqli_fetch_array($que);
						                $pic=$r["pro_image"];
										 $string=$rows['content'];
										 $news_id=$rows['news_id'];
										  $title=$rows['title'];
										 $string = strip_tags($string);

                                          if (strlen($string) > 250) {
										    $stringCut = substr($string, 0, 250);
                                            $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
                                               }
								  ?>
							   
                                        <li class="search-item clearfix">
                                            <a href="javascriptt:;">
                                                <img style="margin-top:20px" src="../Uploads/<?php echo $pic;?>" />
                                            </a>
                                            <div class="search-content">
											<div class="timeline-body-head">
                                                    <div class="timeline-body-head-caption" style="float:right; ">
                                                        <span style="align:right; color:red;"class="timeline-body-time font-red-cascade">Posted by </span>
                                                        <a href="javascript:;" class="timeline-body-title font-blue-madison"><?php echo $r['f_name']." ".$r['m_name']; ?></a>
                                                        <span style="align:right; color:red;"class="timeline-body-time font-red-cascade">on <?php echo $rows['date']." From ".$rows['post_by']; ?></span>
                                                    </div>
                                                </div>
												<br>
                                                <h2 class="search-title">
                                                    <a href="javascript:;"><?php echo $title;?></a>
                                                </h2>
                                                <p class="search-desc"> <?php echo $string;?>...<a href="readnews.php?ID=<?php echo $news_id;?>">Read More</a>  </p>
                                            </div>
                                        </li><?php }
								
								else if($news_for==$type && $date_come==$search){
									$user_id=$rows["user_id"];
                                     $que=mysqli_query($con,"select * from account where user_id='$user_id'")or die(mysqli_error());
					                  $r=mysqli_fetch_array($que);
									  $pic=$r["pro_image"];
										 $string=$rows['content'];
										 $news_id=$rows['news_id'];
										  $title=$rows['title'];
										 $string = strip_tags($string);

                                          if (strlen($string) > 250) {
										    $stringCut = substr($string, 0, 250);
                                            $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
                                               }
								  ?>
							   
                                        <li class="search-item clearfix">
                                            <a href="javascriptt:;">
                                                <img style="margin-top:20px" src="../Uploads/<?php echo $pic;?>" />
                                            </a>
                                            <div class="search-content">
											<div class="timeline-body-head">
                                                    <div class="timeline-body-head-caption" style="float:right; ">
                                                        <span style="align:right; color:red;"class="timeline-body-time font-red-cascade">Posted by </span>
                                                        <a href="javascript:;" class="timeline-body-title font-blue-madison"><?php echo $r['f_name']." ".$r['m_name']; ?></a>
                                                        <span style="align:right; color:red;"class="timeline-body-time font-red-cascade">on <?php echo $rows['date']." From ".$rows['post_by']; ?></span>
                                                    </div>
                                                </div>
												<br>
                                                <h2 class="search-title">
                                                    <a href="javascript:;"><?php echo $title;?></a>
                                                </h2>
                                                <p class="search-desc"> <?php echo $string;?>...<a href="readnews.php?ID=<?php echo $news_id;?>">Read More</a>  </p>
                                            </div>
                                        </li><?php }
								} 
								?>
										 
                                    </ul><?php
									if($A==0){
									echo '<div class="alert alert-dismissable alert-danger error" style="margin-top:20px;">';
												echo '<strong>'.'<center>'."No Data Avaliable with Your Key Word".'</center>'.'<strong>';
											echo '</div>';
								}?>
                                </div>
                            </div>
                        
                                
								  <div class="col-md-6" style="width:400px;  ">
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
							            $ans = mysqli_query($con,"SELECT * FROM Account WHERE user_id='$session_id'")or die(mysqli_error());
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
                                <a class="more" href="mail.php;"> View more
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
						              $aben = mysqli_query($con,"SELECT * FROM Withdrawal"); 
											  $Y=0;
										  while($nasa = mysqli_fetch_array($aben)){
											$status=$nasa['status'];
											if($status=="Request"){
											$Y++;
											}
											else{
											$Y=0;
											}
											}
										?>
                                        <span data-counter="counterup" data-value="<?php echo $Y;?>">0</span></div>
                                    <div class="desc"> New Withdrawal Request </div>
                                </div>
                                <a class="more" href="withdrawal.php;"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div><br><br><br><br><br><br><br>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="width:300px; margin-left:30px;">
                            <div class="dashboard-stat green">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
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
                                    <div class="number">
                                        <span data-counter="counterup" data-value="<?php echo $Z;?>">0</span>
                                    </div>
                                    <div class="desc"> New Leave Request </div>
                                </div>
                                <a class="more" href="leave.php;"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div><br><br><br><br><br><br><br>
                        
                    </div>
										
			  
      
<?php include('chat.php');?>
<?php if(isset($_GET['I'])){
	include('chatmessage.php');
	}?>

            <!-- END QUICK SIDEBAR -->
        </div></div></div>
                             
                                <!-- END PORTLET-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>

        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
<?php include('footer.php');?>
<?php include('coreplugin.php');?>
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
    
</body>



<!-- Mirrored from www.keenthemes.com/preview/metronic/theme/admin_1/page_general_search.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2016 19:02:15 GMT -->
</html>