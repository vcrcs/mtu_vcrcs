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
						<?php
    $year = trim($_GET['Y']);
	$semi = trim($_GET['S']);
	$wh_year =trim($_GET['WY']);
    $qs = mysqli_query($con,"SELECT * FROM Evaluation where year='$year' AND semester='$semi' AND acc_year='$wh_year'")or die(mysqli_error());
	$ro = mysqli_num_rows($qs);
	if($ro>=1){
    echo' <hr>';
	echo '<ul class="nav nav-tabs">';
	$qss = mysqli_query($con,"SELECT * FROM Course where year='$year' AND semester='$semi'")or die(mysqli_error());
	$rows = mysqli_fetch_array($qss);

	$al = $rows['course_name'];
	$id = $rows['course_code'];
	$abn = mysqli_query($con,"SELECT * FROM Course where course_code='$id'")or die(mysqli_error());
$ll=mysqli_fetch_array($abn);
$ye=$ll['year'];
$se=$ll['semester'];
echo'<br>';
    echo' <table class="table table-striped table-bordered table-hover" id="sample_2">';
	echo' <thead>';
    echo' <tr>';
						echo' <th class="head0">Student Id</th>';
                        echo' <th class="head1">Full Name</th>';
						$qss = mysqli_query($con,"SELECT * FROM Course where year='$ye' AND semester='$se'")or die(mysqli_error());
                        $array = array();
						while($ya=mysqli_fetch_assoc($qss)){
						$ev_1=$ya['course_code'];
						echo' <th class="head1">'.$ev_1.'</th>';
						}
						echo' <th class="head1">Action</th>';
						echo' <th class="head1">Action</th>';
                        echo'   </tr>';
                        echo'  </thead>';
                        echo'   <tbody>';
						$qsss = mysqli_query($con,"SELECT * FROM Evaluation where year='$ye' AND semester='$se' AND course_code='$id'")or die(mysqli_error());
						$array = array();
						while($rowss = mysqli_fetch_assoc($qsss)){
						$array[] = $rowss; 
						$status = $rowss['status'];
						$z= $rowss['stud_id'];
						$q = mysqli_query($con,"SELECT * FROM Account where user_id='$z'")or die(mysqli_error());
						$rr= mysqli_fetch_array($q);
						if($status=="Approve" || $status=="Print" ){
						echo'  <tr class="gradeX">';
                        echo'  <td>'; echo $rowss['stud_id']; echo' </td>';
						echo'  <td>'; echo $rr['f_name']; echo $rr['m_name']; echo $rr['l_name']; echo'</td>';
						$qss = mysqli_query($con,"SELECT * FROM Course where year='$ye' AND semester='$se'")or die(mysqli_error());
                        $array = array();
						while($ya=mysqli_fetch_assoc($qss)){
						$ev_1=$ya['course_code'];
						$qa = mysqli_query($con,"SELECT * FROM Evaluation where course_code='$ev_1'")or die(mysqli_error());
						$av=mysqli_fetch_array($qa);
						echo'  <td>'; echo $av['grade']; echo'</td>';
						}
						echo'  <td> <a href="viewgrade.php?ID='.$z.'&YE='.$ye.'&SE='.$se.'">View Report</a></td>';
						if($status=="Approve"){
						echo'  <td><a href="generategrade.php?ID='.$z.' &AY='.$wh_year.'"><button name="print" style="float:right;"class="btn btn-success" >Approve Grade Report</button></a></td>';
						}else if ($status=="Print"){
						echo'  <td> <a ><button name="print" style="float:right;"class="btn btn-danger" >Already Approved</button></a></td>';  	
						}
                        echo'  </tr> '; }} 
    echo'    </tbody>';
    echo'    </table></div>';

		echo '';	

	} 
else{
	echo '<div class="alert alert-dismissable alert-danger" style="margin-top:10px;">';
	echo '<strong>'.'<center>'."No Grade Report Has Been Generated ! ".'</center>'.'<strong>';
	echo '</div>';
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

