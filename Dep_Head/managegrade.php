<?php include('head.php');?>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<?php include('header.php');?>
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
                        <li class="nav-item ">
                            <a href="index.php" class="nav-link " >
                                <i class="icon-home"></i>
                                <span  class="title">Home</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li class="nav-item  ">
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
						<li class="nav-item start active open ">
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
                                <span>Manage Grade Report</span>
                            </li>
                        </ul>
                        
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                  <center>  <h3 class="page-title"> List of Student Grade</center>
                        
                    </h3>
                    
                    <div class="row">
                        <div class="col-md-12">
                 <table border="0" width="100%" >
	<form action="" method="POST" >		
		<tr>
			<td><label class="col-md-3 control-label" style="margin-top:5px; " for="form_control_1">Year </label>
			<div class="col-md-4" style="width:200px; margin-left:-40px; ">
            <select class="form-control" name="year" id="year" required>
			<option value=" ">--Select Year--</option>
			<option value="First Year">First Year</option>
            <option value="Second Year">Second Year</option>
            <option value="Third Year">Third Year</option>
			<option value="Fourth Year">Fourth Year</option></select></div></td>
			
			<td><label class="col-md-3 control-label" style="margin-top:5px; margin-left:-80px; " for="form_control_1">Semester</label>
			<div class="col-md-4" style="width:200px; ">
            <select class="form-control" name="semi" id="semi" required>
			<option value=" ">--Select Semester--</option>
			<option value="1st">1st Semester</option>
			<option value="2nd">2nd Semester</option></select></div></td>
		
			<td><label  for="form_control_1" style="margin-top:5px; margin-left:-100px; ">Which Year</label>
			 <input type="text" class="form-control" style="width:200px; margin-top:-20px;" placeholder="2016" name="wh_year" id="wh_year" required></td>
		
			<td>	
				<input type="submit"  name="save" class="btn btn-info" value="Search Grade Report">
			</td>
		</tr>
	 </form>
</table><?php
if (isset($_POST['save'])){
	$year = $_POST['year'];
	$semi = $_POST['semi'];
	$wh_year = $_POST['wh_year'];
    $qs = mysqli_query($con,"SELECT * FROM Evaluation where year='$year' AND semester='$semi' AND acc_year='$wh_year'")or die(mysqli_error());
	$ro = mysqli_num_rows($qs);
	if($ro>=1){
    echo' <hr>';
	echo '<ul class="nav nav-tabs">';
	$qss = mysqli_query($con,"SELECT * FROM Course where year='$year' AND semester='$semi'")or die(mysqli_error());
    $array = array();
	while($rows = mysqli_fetch_assoc($qss)){
	$array[] = $rows;
	$al = $rows['course_name'];
	$id = $rows['course_code'];
	echo'<li>';
    echo' <a href="managegrade.php?I='.$id.'&WY='.$wh_year.'" > '; echo $al; echo' </a>';
	echo' </li>';}
	echo' </ul>';	}
else{
	echo '<div class="alert alert-dismissable alert-danger" style="margin-top:10px;">';
	echo '<strong>'.'<center>'."No Grade Report Has Been Generated ! ".'</center>'.'<strong>';
	echo '</div>';
}
}
 if(isset($_GET["I"])) {
include('../dbcon.php');
$ab=trim($_GET['I']);
$wh_year=trim($_GET['WY']);
$A=0;
echo' <hr>';
$abn = mysqli_query($con,"SELECT * FROM Course where course_code='$ab'")or die(mysqli_error());
$ll=mysqli_fetch_array($abn);
$ye=$ll['year'];
$se=$ll['semester'];
	echo '<ul class="nav nav-tabs">';
	$qss = mysqli_query($con,"SELECT * FROM Course where year='$ye' AND semester='$se'")or die(mysqli_error());
    $array = array();
	while($rows = mysqli_fetch_assoc($qss)){
	$array[] = $rows;
	$al = $rows['course_name'];
	$id = $rows['course_code'];
	echo'<li>';
    echo' <a href="managegrade.php?I='.$id.'&WY='.$wh_year.'" > '; echo $al; echo' </a>';
	echo' </li>';}
	echo' </ul>';	
$array = array();
$abenn=mysqli_query($con,"Select * from Caricullum ")or die(mysqli_error());

while($ro = mysqli_fetch_array($abenn)){
$array[] = $ro;
$code=trim($ro['code']);	
if($code==$ab){
	$A++;
$ev_1=ucfirst($ro['eval_1']);
$ev_2=ucfirst($ro['eval_2']);
$ev_3=ucfirst($ro['eval_3']);
$ev_4=ucfirst($ro['eval_4']);
$ev_5=ucfirst($ro['eval_5']);
$a=mysqli_query($con,"Select * from Course where course_code='$ab'")or die(mysqli_error());
$r = mysqli_fetch_array($a);	
$year=$r['year'];
$semi=$r['semester'];	
	}}
	
	
if($A>0){
	$C=0;
	$AP=0;
	$qsss = mysqli_query($con,"SELECT * FROM Evaluation where year='$year' AND semester='$semi' AND course_code='$ab'")or die(mysqli_error());
	$approve=mysqli_num_rows($qsss);
	$array = array();
	while($rowss = mysqli_fetch_assoc($qsss)){
	$array[] = $rowss; 
	$Statt= $rowss['status'];
	if($Statt=='Complete'){
		    echo' <table class="table table-striped table-bordered table-hover" id="sample_2">';
	echo' <thead>';
    echo' <tr>';
						echo' <th class="head0">Student Id</th>';
                        echo' <th class="head1">Full Name</th>';
						echo' <th class="head0">Course </th>';
						echo' <th class="head1">'.$ev_1.'</th>';
                        echo' <th class="head0">'.$ev_2.'</th>';
						echo' <th class="head1">'.$ev_3.'</th>';
						echo' <th class="head0">'.$ev_4.'</th>';
						echo' <th class="head1">'.$ev_5.'</th>';
						echo' <th class="head1">Result</th>';
						echo' <th class="head0">Grade</th>';
                        echo'   </tr>';
                        echo'  </thead>';
                        echo'   <tbody>';
						$qsss = mysqli_query($con,"SELECT * FROM Evaluation where year='$year' AND semester='$semi' AND course_code='$ab'")or die(mysqli_error());
						$array = array();
						while($rowss = mysqli_fetch_assoc($qsss)){
						$array[] = $rowss; 
						$status = $rowss['status'];
						$z= $rowss['stud_id'];
						$q = mysqli_query($con,"SELECT * FROM Account where user_id='$z'")or die(mysqli_error());
						$rr= mysqli_fetch_array($q);
						if($status=="Complete"){
							$C++;
						echo'  <tr class="gradeX">';
                        echo'  <td>'; echo $rowss['stud_id']; echo' </td>';
						echo'  <td>'; echo $rr['f_name'];  echo $rr['m_name']; echo'</td>';
						echo'  <td>'; echo $r['course_name']; echo'</td>';
                        echo'  <td>'; echo $rowss['eval_1']; echo'</td>';
						echo'  <td>'; echo $rowss['eval_2']; echo'</td>';
						echo'  <td>'; echo $rowss['eval_3']; echo'</td>';
                        echo'  <td>'; echo $rowss['eval_4']; echo'</td>';
						echo'  <td>'; echo $rowss['eval_5']; echo'</td>';
						echo'  <td>'; echo $rowss['result']; echo'</td>';
						echo'  <td>'; echo $rowss['grade']; echo'</td>';
                        echo'  </tr> '; }
						
						} 
    echo'    </tbody>';
    echo'    </table></div>';
	if($approve==$C){
	echo '<a href="approvegrade.php?ID='.$ab.' &AY='.$wh_year.'"><button name="print" style="float:right;"class="btn btn-success" >Approve Grade Report</button></a>';	
	}
	else{
	echo '<input readonly name="print" style="float:right;"class="btn btn-danger" value=" All Student donot Complete" >';	
	}
    }
	else if($Statt=='Approve'){
							$AP++;
							$C=1;
											    echo' <table class="table table-striped table-bordered table-hover" id="sample_2">';
	echo' <thead>';
    echo' <tr>';
						echo' <th class="head0">Student Id</th>';
                        echo' <th class="head1">Full Name</th>';
						echo' <th class="head0">Course </th>';
						echo' <th class="head1">'.$ev_1.'</th>';
                        echo' <th class="head0">'.$ev_2.'</th>';
						echo' <th class="head1">'.$ev_3.'</th>';
						echo' <th class="head0">'.$ev_4.'</th>';
						echo' <th class="head1">'.$ev_5.'</th>';
						echo' <th class="head1">Result</th>';
						echo' <th class="head0">Grade</th>';
                        echo'   </tr>';
                        echo'  </thead>';
                        echo'   <tbody>';
						$qsss = mysqli_query($con,"SELECT * FROM Evaluation where year='$year' AND semester='$semi' AND course_code='$ab'")or die(mysqli_error());
						$array = array();
						while($rowss = mysqli_fetch_assoc($qsss)){
						$array[] = $rowss; 
						$status = $rowss['status'];
						$z= $rowss['stud_id'];
						$q = mysqli_query($con,"SELECT * FROM Account where user_id='$z'")or die(mysqli_error());
						$rr= mysqli_fetch_array($q);
						if($status=="Approve"){
							$C++;
						echo'  <tr class="gradeX">';
                        echo'  <td>'; echo $rowss['stud_id']; echo' </td>';
						echo'  <td>'; echo $rr['f_name'];  echo $rr['m_name']; echo'</td>';
						echo'  <td>'; echo $r['course_name']; echo'</td>';
                        echo'  <td>'; echo $rowss['eval_1']; echo'</td>';
						echo'  <td>'; echo $rowss['eval_2']; echo'</td>';
						echo'  <td>'; echo $rowss['eval_3']; echo'</td>';
                        echo'  <td>'; echo $rowss['eval_4']; echo'</td>';
						echo'  <td>'; echo $rowss['eval_5']; echo'</td>';
						echo'  <td>'; echo $rowss['result']; echo'</td>';
						echo'  <td>'; echo $rowss['grade']; echo'</td>';
                        echo'  </tr> '; }
						
						} 
    echo'    </tbody>';
    echo'    </table>';
						}
	else if($Statt=='Print'){
							$AP++;
							$C=1;
									    echo' <table class="table table-striped table-bordered table-hover" id="sample_2">';
	echo' <thead>';
    echo' <tr>';
						echo' <th class="head0">Student Id</th>';
                        echo' <th class="head1">Full Name</th>';
						echo' <th class="head0">Course </th>';
						echo' <th class="head1">'.$ev_1.'</th>';
                        echo' <th class="head0">'.$ev_2.'</th>';
						echo' <th class="head1">'.$ev_3.'</th>';
						echo' <th class="head0">'.$ev_4.'</th>';
						echo' <th class="head1">'.$ev_5.'</th>';
						echo' <th class="head1">Result</th>';
						echo' <th class="head0">Grade</th>';
                        echo'   </tr>';
                        echo'  </thead>';
                        echo'   <tbody>';
						$qsss = mysqli_query($con,"SELECT * FROM Evaluation where year='$year' AND semester='$semi' AND course_code='$ab'")or die(mysqli_error());
						$array = array();
						while($rowss = mysqli_fetch_assoc($qsss)){
						$array[] = $rowss; 
						$status = $rowss['status'];
						$z= $rowss['stud_id'];
						$q = mysqli_query($con,"SELECT * FROM Account where user_id='$z'")or die(mysqli_error());
						$rr= mysqli_fetch_array($q);
						if($status=="Print"){
							$C++;
						echo'  <tr class="gradeX">';
                        echo'  <td>'; echo $rowss['stud_id']; echo' </td>';
						echo'  <td>'; echo $rr['f_name'];  echo $rr['m_name']; echo'</td>';
						echo'  <td>'; echo $r['course_name']; echo'</td>';
                        echo'  <td>'; echo $rowss['eval_1']; echo'</td>';
						echo'  <td>'; echo $rowss['eval_2']; echo'</td>';
						echo'  <td>'; echo $rowss['eval_3']; echo'</td>';
                        echo'  <td>'; echo $rowss['eval_4']; echo'</td>';
						echo'  <td>'; echo $rowss['eval_5']; echo'</td>';
						echo'  <td>'; echo $rowss['result']; echo'</td>';
						echo'  <td>'; echo $rowss['grade']; echo'</td>';
                        echo'  </tr> '; }
						
						} 
    echo'    </tbody>';
    echo'    </table>';
						}
	}
	
	if($AP>0){
	echo '<div class="alert alert-dismissable alert-Success" >';
	echo '<strong>'.'<center>'."Course Approved !".'</center>'.'<strong>';
	echo '</div>';	
	}
	if($C==0){
		echo '<div class="alert alert-dismissable alert-danger" >';
								echo '<strong>'.'<center>'."Assesment Donot Complete! $C".'</center>'.'<strong>';
								echo '</div>';	
	}
}
else{
	echo '<div class="alert alert-dismissable alert-danger" >';
	echo '<strong>'.'<center>'."Assesment Donot Began in this Course Yet!".'</center>'.'<strong>';
	echo '</div>';	
}
				 }

?>
                        </div>
                    </div>

                </div>
                <!-- END CONTENT BODY -->
            </div>
			<?php include('chat.php');?>
        </div>
<?php include('footer.php');?>


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
        <script src="../assets/pages/scripts/table-datatables-colreorder.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../../../../www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-37564768-1', 'keenthemes.com');
  ga('send', 'pageview');
</script> 
</body>

