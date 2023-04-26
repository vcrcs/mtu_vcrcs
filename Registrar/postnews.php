
<html lang="en">
<?php include('head.php');?>

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
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
							<?php
				             $error = 0;
				            if (isset($_POST['post_news'])){		
						
										$title=$_POST['title'];
										$content = $_POST['content'];
										$date = date("Y-m-d");
										$month = date("M");
										$select = $_POST['select'];
                                        $post_by="Registrar";
										
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
							   
							   if($select=="Instructor"||$select=="Dep_Head"||$select=="Registrar"){
							                $semester=" ";
											$year=" ";
											mysqli_query($con,"insert into news( date,post_by, user_id,title,content,year,semester,news_for) values('$date','$post_by','$session_id','$title','$content','$year','$semester','$select')")or die(mysqli_error());
											
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
							
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">Fill News Information Below</span>
                                    </div>
                                </div>
                                <div class="portlet-body" style="margin-left:0px; width:1100px;">
                                    <!-- BEGIN FORM-->
                                    <form action="#" class="form-horizontal" id="form_sample_1" method="post" enctype="multipart/form-data">
	
									
									
                                        <div class="form-body">
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> Your form validation is successful! </div>
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
                                                    <textarea class="wysihtml5 form-control" rows="10" name="content" id="content" data-error-container="#editor1_error" required></textarea>
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
														<option value="Registrar">Registrar</option>
														<option value="Dep_Head">Department Head</option>
                                                        <option value="Instructor">Instructor</option> 
                                                    </select>
                                                </div>
                                            </div>
                                            
                                         </div>
                                        <div class="form-actions">
                                            <div class="row" style="margin-left:700px">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green" name="post_news" id="post_news" >Post News</button>&nbsp;&nbsp;&nbsp;
                                                    <button type="reset" class="btn default">Clear Data</button>
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


        <script src="../assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
        <script src="../assets/pages/scripts/components-editors.min.js" type="text/javascript"></script>

<!-- Mirrored from www.keenthemes.com/preview/metronic/theme/admin_1/form_validation_md.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Feb 2016 18:49:56 GMT -->
</html>