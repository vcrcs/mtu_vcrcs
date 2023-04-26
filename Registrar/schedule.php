
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
                                <span>Schedule Adjustment</span>
								<i class="fa fa-circle"></i>
                            </li>
							<li>
                                <span>Adjust</span>
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

                    <h3 class="page-title"> Adjust Schedule </h3>

                  <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered">
							<?php
				             $error = 0;
				            if (isset($_POST['schedule'])){		
						
										$occure_on=$_POST['occure_on'];
										$event = $_POST['content'];
										$date = date("Y-m-d");
										$month = date("M"); # not this date change it to the correct one
										$year = date("Y");
										$to_day = date("d");
										$select = $_POST['select'];
                                        $post_by="Registrar";
										$status="New";
										$querys = "SELECT * FROM Schedule WHERE user_id='$session_id' ";
								         $results = mysqli_query($con,$querys)or die(mysqli_error());
								         $num_rows = mysqli_num_rows($results);
									     $rows=mysqli_fetch_array($results);
									         $date_come =$rows["date"];
											 $forevent=$rows["event"];
											 
							if($occure_on<$date){
							   echo '<div class="alert alert-dismissable alert-danger" style="margin-top:-20px;">';
												echo '<strong>'.'<center>'."The Date you use is Passed ! ".'</center>'.'<strong>';
												echo '</div>';
							}	
                           else{
						    if($date_come==$occure_on && $forevent==$event){
							   echo '<div class="alert alert-dismissable alert-danger" style="margin-top:-20px;">';
												echo '<strong>'.'<center>'." You have already post this Schedule !".'</center>'.'<strong>';
												echo '</div>';
							   }
							   else{
							   
							   if($select=="Instructor"||$select=="Department"||$select=="Registrar"){
							                $semester=" ";
											$acadamic_year=" ";
											mysqli_query($con,"insert into Schedule( date,user_id,occurance_day,month,year,event,post_for,post_by,acadamic_year,semester,status) values('$occure_on','$session_id','$to_day','$month','$year','$event','$select','$post_by','$acadamic_year','$semester','$status')")or die(mysqli_error());
											
											echo '<div class="alert alert-dismissable alert-success" style="margin-top:-20px;">';
												echo '<strong>'.'<center>'."You have Adjust New Schedule for $select ! ".'</center>'.'<strong>';
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
											mysqli_query($con,"insert into Schedule( date,user_id,occurance_day,month,year,event,post_for,post_by,acadamic_year,semester,status) values('$occure_on','$session_id','$to_day','$month','$year','$event','$for','$post_by','$select','$semester','$status')")or die(mysqli_error());
											
											echo '<div class="alert alert-dismissable alert-success" style="margin-top:-20px;">';
												echo '<strong>'.'<center>'."You have Adjust New Schedule for $select $semester Students ! ".'</center>'.'<strong>';
												echo '</div>';
							    }
							   }
						   
						   }							
                              }?>
							
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">Fill Schedule Information Below</span>
                                    </div>
                                </div>
                                <div class="portlet-body" style="margin-left:0px; width:1100px;">
                                    <!-- BEGIN FORM-->
                                    <form action="#" class="form-horizontal" id="form_sample_1" method="post" enctype="multipart/form-data">
	
									
									
                                        <div class="form-body">
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Occurance Date
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="date" class="form-control" placeholder="" name="occure_on" id="occure_on" required>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Enter the title for this News</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Schedule Event 
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
														<option value="Registrar">Registrar</option>
														<option value="Department">Department Head</option>
                                                        <option value="Instructor">Instructor</option> 
                                                    </select>
                                                </div>
                                            </div>
                                            
                                         </div>
                                        <div class="form-actions">
                                            <div class="row" style="margin-left:700px">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green" name="schedule" id="schedule" >Adjust Schedule</button>&nbsp;&nbsp;&nbsp;
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
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
<?php include('footer.php');?>
<?php include('coreplugin.php');?>
</body>


 <script src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="../assets/pages/scripts/form-validation-md.min.js" type="text/javascript"></script>


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