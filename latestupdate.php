<?php include('header.php');?>
<body>

    <?php include('navhead.php'); ?>
	
	   <?php include('dbcon.php'); ?>

    <div class="container">
        <div class="row-fluid">
            <div class="span3">
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

                <div class="hero-unit-1">
                    <ul class="nav  nav-pills nav-stacked">


                        <li class="nav-header">Links</li>
                        <li ><a href="index.php"><i class="icon-home icon-large"></i>&nbsp;Home
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a></li>
                        <li class="active"><a href="latestupdate.php"><i class="icon-home icon-large"></i>&nbsp;Latest Update
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a></li>
                        <li><a href="contact.php"><i class="icon-envelope-alt icon-large"></i>&nbsp;Contact Us
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a>                
                        </li>
                        <li class="nav-header">About US</li>
                        <li><a  href="#mission" role="button" data-toggle="modal"><i class="icon-book icon-large"></i>&nbsp;Mission
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a></li>
                        <li><a href="#vision" role="button" data-toggle="modal"><i class="icon-book icon-large"></i>&nbsp;Vision
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a></li>
                        <li><a href="history.php"><i class="icon-list-alt icon-large"></i>&nbsp;History
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a></li>

                    </ul>
                </div>
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
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Head Up!</strong>&nbsp;Welcome to MTU Information Systems Students Virtual Class Room & Chatting System.
                </div>
                <div class="slider-wrapper theme-default">
				<?php
                                  $querys = mysqli_query($con,"SELECT * FROM News WHERE year='All' "); 
								  $array = array();
								  while($rows = mysqli_fetch_assoc($querys)){
								  $array[] = $rows;  
						               $user_id=$rows["user_id"];
                                     $que=mysqli_query($con,"select * from account where user_id='$user_id'")or die(mysqli_error());
					                  $r=mysqli_fetch_array($que);
						                $pic=$r["pro_image"];
										$string=$rows['content'];
										 $string = strip_tags($string);

                                          if (strlen($string) > 50) {
										    $stringCut = substr($string, 0, 500);
                                            $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... '; 
                                               }
									   ?>
                      
                        <div class="timeline-panel">
                                        <div class="timeline-heading">
										
                                            <h4 class="timeline-title" style=" "><?php echo $rows['title'];?> </h4>
                                            <p style="float:right; color:red;"><small class="text-muted"><i class="icon-clock"></i>Posted on <?php echo $rows['date']." by ".$rows['post_by']; ?></small>
                                            </p>
                                        </div>
										<div style="float:left; "><img class="img-circle" style="width:80px; margin-top:50px;"src="Uploads/<?php echo $pic;?>" alt="User profile picture">
                                           </div>
                                        <div class="timeline-body" style="float:right; margin-left:85px; margin-top:-80px;">
										    <p > <?php echo $string;?><a href="readmore.php?ID=<?php echo $rows['news_id'];?>">Read More</a>  </p>
                                        </div>
                                    </div>
									<br><br><br><br><br>
									
                   
					<div class="timeline-badge" style="margin-top:20px">
								<p style="color:white;"> .</p>
                                    </div><hr>

					<?php } ?>
					
					
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


