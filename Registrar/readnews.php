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
                    <h3 class="page-title"> Registrar Dashboard
                    </h3>
                    
                    <div class="clearfix"></div>
				   <div class="col-md-6" style="width:820px; ">
                            <div class="portlet light portlet-fit bg-inverse ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-microphone font-red"></i>
                                        <span class="caption-subject bold font-red uppercase"> Latest News</span>
                                        <span class="caption-helper">for Registrar</span>
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
              
			  
	
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
<?php include('footer.php');?>
<?php include('coreplugin.php');?>     
</body>
</html>