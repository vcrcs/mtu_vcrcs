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
                                                <li class="active">
                                                    <a  href="profileimage.php">
                                                        <i class="fa fa-picture-o"></i>Profile Picture </a>
                                                </li>
                                                <li>
                                                    <a href="changepassword.php">
                                                        <i class="fa fa-lock"></i> Change Password</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="tab-content">
                                              <div id="tab_2-2"  class="tab-pane active">
												<div class="clearfix margin-top-10">
                                                                <span class="label label-danger"> NOTICE! </span><br><br>
                                                                <span> The profile you have to use must be your own because it is used for many purpose in this site. Make sure your image is only 3 month old this is for your own sake </span>
                                                            </div>
                                                    <p> </p>
                                                    <form action="#" role="form" method="post" enctype="multipart/form-data">
													
													<?php
													$error=0;
						if (isset($_POST['profile'])){
						
						                $image = $_FILES['image']['tmp_name'];
										$image_name = $_FILES['image']['name'];
										$image_size = getimagesize($_FILES['image']['tmp_name']);
										$image_type = $_FILES['image']['type'];
										$image_error = $_FILES['image']['error'];
			
										if($image_size==FALSE && $error ==0 ){
											echo '<div class="alert alert-dismissable alert-danger error" style="margin-top:-20px;">';
												echo '<strong>'.'<center>'."That is not an image!".'</center>'.'<strong>';
											echo '</div>';
											$error = 1;
										}
										else if($image_error > 0 && $error == 0){
											echo '<div class="alert alert-dismissable alert-danger" style="margin-top:-20px;">';
												echo '<strong>'.'<center>'."There is error in uploading an image".'</center>'.'<strong>';
											echo '</div>';
											$error = 1;
										}
						else if($error == 0){
						                    mysql_query("update Account set pro_image='"."$image_name"."' where user_id = '$session_id'")or die(mysql_error());
											move_uploaded_file($image,"../Uploads/".$image_name);
											echo '<div class="alert alert-dismissable alert-success" style="margin-top:-20px;">';
												echo '<strong>'.'<center>'."Your withdrawal request is sent successfully! ".'</center>'.'<strong>';
												echo'</div>';
						                   }}?>
													
                                                        <div class="form-group">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail" name="" id="" style="width: 200px; height: 150px;">
                                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 400px; max-height: 200px;"> </div>
																&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																<div class="fileinput-new thumbnail" name="" id="" style="width: 200px; height: 200px;">
																<?php 
																$query=mysql_query("select * from account where user_id='$session_id'")or die(mysql_error());
																 $row=mysql_fetch_array($query);
																  $pic=$row["pro_image"];
																?><p>The Current Profile Image</p>
                                                                    <img src="../Uploads/<?php echo $pic;?>" alt="" /> 
																	</div>
                                                                <div>
                                                                    <span class="btn default btn-file">
                                                                        <span class="fileinput-new"> Select image </span>
                                                                        <span class="fileinput-exists"> Change </span>
                                                                        <input type="file" name="image"> </span>
                                                                    <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                </div>
																
                                                            </div>
                                                           </div>
                                                        <div class="margin-top-10">
                                                           <button type="submit" class="btn green" name="profile" id="profile" >Change Profile</button>&nbsp;&nbsp;&nbsp;
                                                           <button type="reset" href="editprofile.php" class="btn default">Cancel</button>
                                                </div>
                                                    </form>
                                                </div>
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