<?php include('head.php');?>
<?php include('../session.php');?>
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
                                <span>Manage Profile </span>
                            </li>
                        </ul>
                    </div>
					<h3 class="page-title"> User Profile
                        <small>manage your own account</small>
                    </h3>
                    <div class="profile">
                        <div class="tabbable-line tabbable-full-width">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="profile.php"> Overview </a>
                                </li>
                                <li>
                                    <a href="account.php" > Account </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1_1" style="width:1600px">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <ul class="list-unstyled profile-nav">
                                                <li>
												<?php
							$result = mysqli_query($con,"SELECT * FROM account where user_id='$session_id'") or die(mysqli_error());	
							$data = mysqli_fetch_array($result);
							 $pic=$data["pro_image"];
							 ?>
							 <img src="../Uploads/<?php echo $pic;?>" class="img-responsive pic-bordered" alt="" />
                                                </li> <li>
                                            </ul>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-8 profile-info">
												<?php 
						$query=mysqli_query($con,"select * from account where user_id='$session_id'")or die(mysqli_error());
					     $row=mysqli_fetch_array($query);
						?>
												<br>
                                                    <h1 class="font-green sbold uppercase"><?php echo $row['f_name']." ".$row['m_name']." ".$row['l_name']; ?> </h1>
                                                    <p> <?php echo $row['about_me']; ?></p>
                                                    <ul class="list-block" style="list-style-type: none; ">
                                                        <li>
                                                            <i style="color :black">User ID:-</i> <?php echo $row['user_id']; ?> </li>
                                                        <li>
														<li>
                                                            <i style="color :black">User Type:-</i> <?php echo $row['user_type']; ?> </li>
                                                        <li>
                                                            <i style="color :black">E-mail:- </i><?php echo $row['e_mail']; ?></li>
                                                        <li>
                                                            <i style="color :black">Phone No:- </i><?php echo $row['phone_no']; ?></li>
                                                        <li>
                                                            <i style="color :black">Account Status:-</i> <?php echo $row['status']; ?> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--end row-->
                                        </div>
                                    </div>
                                </div>
                                <!--tab_1_2-->
                                <div class="tab-pane" id="tab_1_3">
                                    <div class="row profile-account">
                                        <div class="col-md-3">
                                            <ul class="ver-inline-menu tabbable margin-bottom-10">
                                                <li >
                                                    <a href="uploadassignment.php?ID=<?php echo $id;?>">
                                                        <i class="fa fa-cog"></i> Upload Assignment </a>
                                                    <span class="after"> </span>
                                                </li>
                                                <li >
                                                    <a  href="downloadsubmitted.php?ID=<?php echo $id;?>">
                                                        <i class="fa fa-picture-o"></i> Download Submitted</a>
                                                </li>
                                                <li >
                                                    <a href="recordresult.php?ID=<?php echo $id;?>">
                                                        <i class="fa fa-lock"></i> Record Result </a>
                                                </li>
                                            </ul>
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