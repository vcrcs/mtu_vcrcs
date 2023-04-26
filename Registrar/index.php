
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    
<!-- Mirrored from www.keenthemes.com/preview/metronic/theme/admin_1/page_general_search.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2016 19:01:59 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<?php include('head.php');?>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="../assets/pages/css/search.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="../assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="../assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white">
        <!-- BEGIN HEADER -->
   <?php include('header.php');?>   
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <?php include('sidebar.php');?>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                    
                    <!-- END THEME PANEL -->
                    <!-- BEGIN PAGE BAR -->
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
						          $type="Registrar"; 
                                 $querys = mysqli_query($con,"SELECT * FROM News ORDER BY date DESC") or die(mysqli_error()); 
								  $qu= mysqli_query($con,"SELECT * FROM News WHERE news_for='$type'");
								  $ab=mysqli_num_rows($qu);
								  $array = array();
								  $K=0;
								  while($rows = mysqli_fetch_assoc($querys)){
								  $array[] = $rows;
								  $news_for=$rows['news_for'];
								  if($type==$news_for){
									  $K++;
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
											   if($K<=5){
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
								  </li><?php }} }?>
										
									
                                        
                                    </ul>
                                    <div class="search-pagination">
                                        <ul class="pagination">
										<li class="page-active">
                                                <a href="index.php">1</a>
										</li>
										<?php
										$A=1;
										while($ab>5){
										if($ab>5){
											$B=++$A;
											$abc=$ab-5;
											$ab=$abc;
										?>
                                            <li >
                                                <a href="indexpag.php?ID=<?php echo $B;?>"> <?php echo $B;?></a>
										</li><?php
										
										}}?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        
    
                             
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

        <script src="../assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
        <script src="../assets/pages/scripts/components-editors.min.js" type="text/javascript"></script>
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