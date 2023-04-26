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
						          $type="Instructor"; 
                                  $querys = mysqli_query($con,"SELECT * FROM News ORDER BY date DESC") or die(mysqli_error()); 
								  $array = array();
								  while($rows = mysqli_fetch_assoc($querys)){
								  $array[] = $rows;
								  $news_for=$rows['news_for']; 
								  if($news_for==$type){
								  $user_id=$rows["user_id"];
                                     $que=mysqli_query($con,"select * from account where user_id='$user_id'")or die(mysqli_error());
					                  $r=mysqli_fetch_array($que);
						                $pic=$r["pro_image"];
										 $string=$rows['content'];
										 $news_id=$rows['news_id'];
										 $string = strip_tags($string);

                                          if (strlen($string) > 250) {
										    $stringCut = substr($string, 0, 250);
                                            $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
                                               }
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
                                                    <span class="font-grey-cascade" ><?php echo $string;?>...<a href="readnews.php?ID=<?php echo $news_id;?>">Read More</a> </span>
                                                </div>
                                            </div>
								  </div><?php }} ?>
                                       </div>
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>
              
			  
			  <div class="col-md-6" style="width:400px; ">
                           </div></div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
<center><?php include('footer.php');?></center>
<?php include('coreplugin.php');?>     
</body>
            <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/table-datatables-editable.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
</html>