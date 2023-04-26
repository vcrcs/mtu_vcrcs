            <a href="index.php" class="page-quick-sidebar-toggler">
                <i class="icon-login"></i>
            </a>
			<section id="main" role="main">
			<section id="content" class="container">
            <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
                <div class="page-quick-sidebar">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
							<?php 
							include('../dbcon.php');
										 $query = "SELECT * FROM Account";
								         $result = mysqli_query($con,$query)or die(mysqli_error());
										 $X=0;
								         while($row = mysqli_fetch_array($result)){
											 
											 $X++;
										 }
							?>
                                <span class="badge badge-danger" ><?php echo $X;?></span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                            <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
                                <h3 class="list-heading">Friends</h3>
								<?php 
										 $query = "SELECT * FROM Account ";
								         $result = mysqli_query($con,$query)or die(mysqli_error());
								         while($row = mysqli_fetch_array($result)){
						                 $pic=$row["pro_image"];
										 $email=$row['e_mail'];
										?>
                            <div class="profile-sidebar">
                                
                                <div class="portlet light profile-sidebar-portlet ">
								
                                  <div class="profile-userpic">
                                         <a  href="chatmodal.php?ID=<?php echo $email;?>" data-toggle="modal" data-target="#chat"> <img  style="width:60px;" src="../Uploads/<?php echo $pic;?>" class="img-circle" alt=""></a> <p style="margin-top:-50px;margin-left:80px;"><?php echo $row['f_name']." ".$row['m_name']; ?> <br><i><?php echo $email;?></i></p> 
                                        </div>
                                </div>
                            </div><?php }?>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
			
			
			
			
			<div id="chat" class="modal fade modal-scroll" tabindex="-1" role="dialog" data-replace="true" style="margin-top:280px; margin-left:800px;">
                                        <div class="modal-dialog" style="width:400px;  max-height:400px;  margin-left:-10px">
                                            <div class="modal-content" >
                                               
                                               
                                            </div>
                                        </div>
                                    </div>
									</section></section>