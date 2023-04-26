
<html lang="en">
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
                        </li><br>
						<li class="heading">
                            <h3 class="uppercase">Features</h3>
                        </li>
                        <li class="nav-item">
                            <a href="index.php" class="nav-link " >
                                <i class="icon-home"></i>
                                <span  class="title">Home</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li class="nav-item start active open ">
                            <a href="postnews.php" class="nav-link nav-toggle">
                                <i class="fa fa-file-text"></i>
                                <span class="title">Post News</span>
                            </a>
                        </li>
						<li class="nav-item  ">
                            <a href="listofinstructors.php" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title">Manage Instructor</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title">Manage Course </span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="addcourse.php" class="nav-link ">
                                        <span class="title">Add Course</span>
                                    </a>
                                </li>
								<li class="nav-item  ">
                                    <a href="updatecourse.php" class="nav-link ">
                                        <span class="title">Update Course </span>
                                    </a>
                                </li>
								<li class="nav-item  ">
                                    <a href="deletecourse.php" class="nav-link ">
                                        <span class="title">Delete Course </span>
                                    </a>
                                </li>
								<li class="nav-item  ">
                                    <a href="listofcourse.php" class="nav-link ">
                                        <span class="title">List of Course</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
						<li class="nav-item  ">
                            <a href="managegrade.php" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title">Manage Grade Report</span>
                            </a>
                        </li>
			
                    </ul>
                </div>
            </div>
            <!-- END SIDEBAR -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.php">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Post News</span>
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

                    <h3 class="page-title"> Blog Latest News </h3>

                  <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered">
							
							
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">Fill News Information Below</span>
                                    </div>
                                </div>
                                <div class="portlet-body" style="margin-left:0px; width:1100px;">
                                    <!-- BEGIN FORM-->
                                    <form action="#" class="form-horizontal" id="form_sample_1" method="post" enctype="multipart/form-data">
	
									             <?php
				             $error = 0;
				            if (isset($_POST['post_news'])){		
						
										$title=$_POST['title'];
										$content = $_POST['content'];
										$date = date("Y-m-d");
										$month = date("M");
										$select = $_POST['select'];
                                        $post_by="Dep_Head";
										
										$querys = "SELECT * FROM News WHERE user_id='$session_id' ";
								         $results = mysqli_query($con,$querys)or die(mysqli_error());
								         $num_rows = mysqli_num_rows($results);
									     $rows=mysqli_fetch_array($results);
									         $fortitle =$rows["title"];
											 $forcontent=$rows["content"];
                               if($fortitle==$title && $forcontent==$content){
							   echo '<div class="alert alert-dismissable alert-danger" style="margin-top:-20px;">';
												echo '<strong>'.'<center>'."You have already post this News ! ".'</center>'.'<strong>';
												echo '</div>';
							   }
							   else{
							   
							   if($select=="Instructor"||$select=="Dep_Head"){
							                $semester=" ";
											$year=" ";
											mysqli_query($con,"insert into news( date,post_by,user_id,title,content,year,semester,news_for) values('$date','$post_by','$session_id','$title','$content','$year','$semester','$select')")or die(mysqli_error());
											
											echo '<div class="alert alert-dismissable alert-success" style="margin-top:-20px;">';
												echo '<strong>'.'<center>'."Your News to the Users has been post! ".'</center>'.'<strong>';
												echo '</div>';
							    }else{
							       if($month=="Feb"||$month=="Mar"||$month=="Apr"||$month=="May"||$month=="Jun")
											{
											$semester="2nd";
											}
											else{
											$semester="1st";
											}
											$for="Student";
											mysqli_query($con,"insert into news( date,post_by, user_id,title,content,year,semester,news_for) values('$date','$post_by','$session_id','$title','$content','$select','$semester','$for')")or die(mysqli_error());
											
											echo '<div class="alert alert-dismissable alert-success" style="margin-top:-20px;">';
												echo '<strong>'.'<center>'."Your News to the Students has been post! ".'</center>'.'<strong>';
												echo '</div>';
							    }
							   }}?>
									
									
                                        <div class="form-body">
                                           <div class="form-group form-md-line-input">
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">News Title
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" placeholder="" name="title" id="title" required>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Enter the title for this News</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">News Body
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <textarea class="wysihtml5 form-control" rows="6" name="content" id="content" data-error-container="#editor1_error" required></textarea>
                                                    <div class="form-control-focus"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="control-label col-md-3">Select User
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="select" id="select" required>
                                                        <option value="">---- Select to whom to be post ----</option>
														<option value="All">All Student</option>
                                                        <option value="First Year">First Year Student</option>
                                                        <option value="Second Year">Second Year Student</option>
                                                        <option value="Third Year">Third Year Student</option>
                                                        <option value="Fourth Year">Fourth Year Student</option>
														<option value="Instructor">Instructor</option> 
                                                    </select>
                                                </div>
                                            </div>
                                            
                                         </div>
                                        <div class="form-actions">
                                            <div class="row" style="margin-left:700px">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green" name="post_news" id="post_news" >Post News</button>&nbsp;&nbsp;&nbsp;
                                                    <button type="reset"  class="btn default">Clear Data</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
							
							
                            </div>
                            <!-- END VALIDATION STATES-->
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
         <?php include('chat.php');?>
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
<?php include('footer.php');?>
<?php include('coreplugin.php');?>
</body>

<script src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="../assets/pages/scripts/form-validation-md.min.js" type="text/javascript"></script>

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