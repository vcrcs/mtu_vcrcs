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
                                <a href="index-2.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Withdraw Request</span>
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
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Withdrawal Request
                        <small>List of students request for withdraw</small>
                    </h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i>List of Accepted Wirhdrawal Request Report </div>
                                    <div class="tools" style="margin-left:-93px;">
                                        <a href="javascript:;" class="collapse"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body" style="width:1200px; margin-left:8px; margin-bottom:8px;">
								
								
								<table class="table table-striped table-bordered table-hover" id="sample_2">
									<thead>
                        <tr>
                            <th class="head0">Withdraw Id</th>
                            <th class="head1">Student Id</th>
                            <th class="head0">Full Name</th>
                            <th class="head0">Department</th>
							<th class="head0">Reason</th>
							<th class="head1">Request Date</th>
							<th class="head0">Status</th>
							<th class="head1">Approved On</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php
						           $request="Accept";
                                  $querys = mysqli_query($con,"SELECT * FROM Withdrawal WHERE status='$request' ");
								  $array = array();
								  while($rows = mysqli_fetch_assoc($querys)){
								  $array[] = $rows; 
								 $idnum = $rows['withdraw_id'];
								 ?>
                        <tr class="gradeX">
                            <td><?php echo $rows['withdraw_id'];?></td>
							<td><?php echo $rows['stud_id'];?></td>
                            <td><?php echo $rows['full_name'];?></td>
                            <td><?php echo $rows['department'];?></td>
                            <td><?php echo $rows['reason'];?></td>
							<td><?php echo $rows['date'];?></td>
							<td><?php echo $rows['status'];?></td>
							<td ><?php echo $rows['approval_date'];?></td>
                        </tr> <?php } ?>
                        
                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
					
					<div class="row">
                        <div class="col-md-12">
                            <div class="portlet box red">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i>List of Rejected Wirhdrawal Request Report </div>
                                    <div class="tools" style="margin-left:-93px;">
                                        <a href="javascript:;" class="collapse"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body" style="width:1200px; margin-left:8px; margin-bottom:8px;">
								
								
								<table class="table table-striped table-bordered table-hover" id="sample_1">
									<thead>
                        <tr>
                            <th class="head0">Withdraw Id</th>
                            <th class="head1">Student Id</th>
                            <th class="head0">Full Name</th>
                            <th class="head0">Department</th>
							<th class="head0">Reason</th>
							<th class="head1">Request Date</th>
							<th class="head0">Status</th>
							<th class="head1">Approved On</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php
						           $request="Reject";
                                  $querys = mysqli_query($con,"SELECT * FROM Withdrawal WHERE status='$request' ");
								  $array = array();
								  while($rows = mysqli_fetch_assoc($querys)){
								  $array[] = $rows; 
								 $idnum = $rows['withdraw_id'];
								 ?>
                        <tr class="gradeX">
                            <td><?php echo $rows['withdraw_id'];?></td>
							<td><?php echo $rows['stud_id'];?></td>
                            <td><?php echo $rows['full_name'];?></td>
                            <td><?php echo $rows['department'];?></td>
                            <td><?php echo $rows['reason'];?></td>
							<td><?php echo $rows['date'];?></td>
							<td><?php echo $rows['status'];?></td>
							<td ><?php echo $rows['approval_date'];?></td>
                        </tr> <?php } ?>
                        
                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
			
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