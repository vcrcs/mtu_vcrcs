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
                                <span>Update Mission & Vission</span>
                            </li>
                        </ul>
                        
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                   <h4 class="page-title"> Manage MIssion & Vission </h4>
                    
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-globe"></i>List of All Mission & Vission Collections</div>
                                    
                                </div>
                                <div class="portlet-body">
								 <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="sample_2">
									<thead>
                        <tr>
                            <th class="head0">HU-IS MIssion</th>
                            <th class="head1">VCRCS Mission</th>
                            <th class="head0">HU-IS Vision</th>
                            <th class="head0">VCRCS Vision</th>
							<th class="head1">Action</th>
							
                        </tr>
                    </thead>
                    <tbody>
					<?php 
								  $sta="Off";
							      $querys = mysqli_query($con,"SELECT * FROM Aboutus ");
								  $array = array();
								  while($rows = mysqli_fetch_assoc($querys)){
								  $array[] = $rows; 
								  $idnum = $rows['id'];
								  $status=$rows['status'];
								  $pic1=$rows['is_mission'];
								  $pic2=$rows['vcrcs_mission'];
								  $pic3=$rows['is_vission'];
								  $pic4=$rows['vcrcs_vission'];
					?>
                        <tr class="gradeX">
                            <td><?php echo $pic1;?></td>
							<td><?php echo $pic2;?></td>
                            <td><?php echo $pic3;?></td>
                            <td><?php echo $pic4;?></td>
							<td class="center">
							<?php 
							if($status==$sta){
							echo '<a  href=" updatemission.php?ID='.$idnum.'" data-toggle="modal" style="font-size:14px;">Activate</a>&nbsp;&nbsp;&nbsp;&nbsp;	';
							}
							?>
							<a  href=" deleteslide.php?ID=<?php echo $idnum;?> " data-toggle="modal" style="font-size:14px;">Delete</a></td>
                        </tr> <?php } ?>
                        
                    </tbody>
                                    </table></div>
									
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
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

