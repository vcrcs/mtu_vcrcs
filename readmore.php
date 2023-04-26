<?php include('header.php');?>
<body>

    <?php include('navhead.php'); 
	$id=$_GET['ID'];
	?>

    <div class="container">
        <div class="row-fluid">
            <div class="span3">
<br>
                <div class="hero-unit-3">
                    <div class="alert-index alert-success">
                        <i class="icon-calendar icon-large"></i>
                        <?php
                        $Today = date('y:m:d');
                        $new = date('l, F d, Y', strtotime($Today));
                        echo $new;
                        ?>
                    </div>
                </div>

                <?php include('sidebar.php');?>
                <br>


            </div>
            <div class="span9">
                <section class="main">
                    <div class="custom-calendar-wrap">
                        <div id="custom-inner" class="custom-inner">
                            <div class="custom-header clearfix">
                                <nav>
                                    <span id="custom-prev" class="custom-prev"></span>
                                    <span id="custom-next" class="custom-next"></span>
                                </nav>
                                <h2 id="custom-month" class="custom-month"></h2>
                                <h3 id="custom-year" class="custom-year"></h3>
                            </div>
                            <div id="calendar" class="fc-calendar-container"></div>
                        </div>
                    </div>
                </section>
<br>

                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Head Up!</strong>&nbsp;Welcome to MTU Information Systems Students Virtual Class Room & Chatting System.
                </div>
                <div class="slider-wrapper theme-default">
				<?php
                                  $querys = mysqli_query($con,"SELECT * FROM News WHERE news_id='$id' "); 
								  $rows=mysqli_fetch_array($querys);
								   $user_id=$rows["user_id"];
                                     $que=mysqli_query($con,"select * from account where user_id='$user_id'")or die(mysql_error());
					                  $r=mysqli_fetch_array($que);
						                $pic=$r["pro_image"];
										$string=$rows['content'];
										 
									   ?>
                      
                        <div class="timeline-panel">
                                        <div class="timeline-heading">
										<hr>
                                            <h4 class="timeline-title" style=" "><?php echo $rows['title'];?> </h4>
                                            <p style="float:right; color:red;"><small class="text-muted"><i class="icon-clock"></i>Posted on <?php echo $rows['date']." by ".$rows['post_by']; ?></small>
                                            </p>
                                        </div>
										<div style="float:left; "><img class="img-circle" style="width:80px; margin-top:50px;"src="Uploads/<?php echo $pic;?>" alt="User profile picture">
                                           </div>
                                        <div class="timeline-body" style="float:right; margin-left:85px; margin-top:-80px;">
										    <p > <?php echo $string;?>  </p>
                                        </div>
                                    </div>
									<br><br><br><br><br>
									
                   
					<div class="timeline-badge" style="margin-top:20px">
								<p style="color:white;"> .</p>
                                    </div><hr>

				
					
					
                </div>
                <!-- end slider -->
            </div>

        </div>

   
    <!---------------->
   


</div>
 <?php include('footer.php');?>
</div>






</body>
</html>


