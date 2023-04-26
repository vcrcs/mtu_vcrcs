<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>


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
                                <a href="index-2.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Leave Request</span>
                            </li>
                        </ul> 
                    </div>

              <div class="maincontent">       
            <form method="POST" onclick="" enctype="multipart/form-data">
							<?php
							$id = $_GET["ID"];
							$dt = date("Y-M-d");
							$result = mysqli_query($con,"SELECT * FROM leave_request where leave_id='$id'") or die(mysqli_error());	
							$data = mysqli_fetch_array($result);
							 
							 ?>		<br>
								<center>
								<div class="modal-content" style="margin-top : 5px; width : 750px; height: 729px; align :center;">
										<div class="modal-header">
											<div class="modal-title"><h3>Staff Leave Request</h3></div>
										</div>
										<div class="modal-body">
											
												
											<?php
											    $studid=$data["inst_id"];
                                                $run = mysqli_query($con,"select * from account where user_id = '$studid'" ) or die(mysqli_error());
												$row = mysqli_fetch_array($run);		
												$type=$row['user_type'];
											echo '<div style="text-align: left; font-size:15px; background-color:#f6f6f6">';
											
												$pic=$data["document"];
												$name = ucfirst($data["full_name"]);
												
												echo "Name: ".'<strong>'.$name.'</strong>'.'<br>';
												echo "Department: ".'<strong>'.$data["department"].'</strong>'.'<br>';
												echo "ID Number: ".'<strong>'.$studid.'</strong>'.'<br>';
												echo "User Type: ".'<strong>'.$type.'</strong>'.'<br>';
												echo "Reason For Leave Request: ".'<strong>'.$data["reason"].'</strong>'.'<br>';
												echo "Request Date: ".'<strong>'.$data["date"].'</strong>'.'<br>';
												echo '<br>';
												
											?><div id="" style="overflow:scroll; height:400px;">
												<img src="../Uploads/<?php echo $pic;?>" style="width:690px; height: 700px;" /></div>
											<?php echo '</div>';?>
											<?php 
												$mail=$row['e_mail'];
												$subject="Haramaya Registrar Office";	
											?>
										</div>
										
										
										<div class="modal-footer">
												<input type="submit" name="approve" value="Approve" class="btn btn-success">
												<input type="submit" name="reject" value="Reject" class="btn btn-danger">
												<input type="submit" name="cancel" value="Cancel" class="btn default">	
										</div>
										</form>
									</div>
									
								</center>
<?php 
						if(isset($_POST['reject'])){
									
									
									mysqli_query($con,"update leave_request set status = 'Reject' where leave_id = '$id'") ;
								    mysqli_query($con,"update leave_request set approval_date = '$dt'  where leave_id = '$id'")or die(mysqli_error());
									$message = "Dear $name your leave request is Rejected. Please don't replay!!!!!";
									mail($mail, $subject, $message, "From: "."hu_vcrcs@haramaya.com");
									echo"<script>alert('Request for leave is rejected and email notification is sent')</script>";
									echo "<script>windows: location='leave.php'</script>";
							}
						else if(isset($_POST['approve'])){
									mysqli_query($con,"update leave_request set approval_date = '$dt'  where leave_id = '$id'");
									mysqli_query($con,"update leave_request set status = 'Accept' where leave_id = '$id'");
									mysqli_query($con,"update Account set status = 'De-Active' where user_id = '$studid'") or die(mysqli_error());		
									$message = "Dear $name your leave request is accepted. Please don't replay!!!!!";
									mail($mail, $subject, $message, "From: "."hu_vcrcs@haramaya.com");
									echo"<script>alert('Request for leave is accepted and email notification is sent')</script>";
									echo "<script>windows: location='leave.php'</script>";
							}
						else if(isset($_POST['cancel'])){
											
									echo "<script>windows: location='leave.php'</script>";
							}		
							?>								
		</div>
   </div>
               
            </div>
        </div>
         
<script>
	
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
</script>


         <?php include('footer.php');?>
<?php include('coreplugin.php');?>  

</body>
</html>