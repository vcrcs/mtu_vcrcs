<?php include('head.php');?>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<?php include('header.php');?>
        <div class="clearfix"> </div>
        <div class="page-container">
<?php include('sidebar.php');?>
<?php
$id = $_GET["ID"];
?>
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.php">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Manage Resource</span>
                            </li>
                        </ul>
                    </div>
                    <div class="profile">
                        <div class="tabbable-line tabbable-full-width">
                            <ul class="nav nav-tabs">
                                <li >
                                    <a href="profile.php" > Overview </a>
                                </li>
                                <li class="active">
                                    <a href="account.php" > Account </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div  class="tab-pane active"  id="tab_1_3">
                                    <div class="row profile-account">
                                       <div class="col-md-3">
                                            <ul class="ver-inline-menu tabbable margin-bottom-10">
                                                <li >
                                                    <a href="account.php">
                                                        <i class="fa fa-cog"></i> Update Information </a>
                                                    <span class="after"> </span>
                                                </li>
                                                <li >
                                                    <a  href="profileimage.php">
                                                        <i class="fa fa-picture-o"></i>Profile Picture </a>
                                                </li>
                                                <li class="active">
                                                    <a href="changepassword.php">
                                                        <i class="fa fa-lock"></i> Change Password</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="tab-content">
                                              <div class="tab-pane Active">
                                                    <form action=" " method="post">
				<?php
						if (isset($_POST['update'])){
				    $query=mysqli_query($con,"select * from account where user_id='$session_id'")or die(mysqli_error());
					$row=mysqli_fetch_array($query);
					$pass=$row['password'];
						$np = $_POST['np'];
						$op = $_POST['op'];
						$e_op=base64_encode($op);
						$rp = $_POST['rp'];	
						if($np!=$rp){
						?>
						<div style="margin-top:-15px;" class="alert alert-danger"><center>Password Don't Match</center></div>
						<?php
						}else{
						if($e_op==$pass){
							$n_np=base64_encode($np);
						mysqli_query($con,"update account set password = '$n_np' where user_id = '$session_id' ")or die(mysqli_error); 
						?>
						<div style="margin-top:-15px;" class="alert alert-success"><center>Password has Successfully Change</center></div>
						<?php }else{?>
						<div style="margin-top:-15px;" class="alert alert-danger"><center>Your old Password is not Correct</center></div>
						<?php }}}?>
													
                                                        <div class="form-group">
                                                            <label class="control-label">Current Password</label>
                                                            <input type="password" class="form-control" name="op" id="op" required/> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">New Password</label>
                                                            <input type="password" class="form-control" name="np" id="np" required/> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Re-type New Password</label>
                                                            <input type="password" class="form-control" name="rp" id="rp" required /> </div>
                                                        <div class="margin-top-10" >
                                                            <button type="submit" class="btn green" name="update" id="update" >Change Password</button>&nbsp;
                                                    <button type="reset" href="editprofile.php" class="btn default">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                        </div>
                                        <!--end col-md-9-->
                                    </div>
                                </div>
                                <!--end tab-pane-->
                                <!--end tab-pane-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
        </div>
<?php include('footer.php');?>
<?php include('coreplugin.php');?>
</body>
</html>