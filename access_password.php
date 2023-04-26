<?php
include('header.php');
//Start session
session_start();
//Unset the variables stored in session
unset($_SESSION['id']);
?>
<body>

    <?php include('navhead.php'); ?>

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
                        <li ><a href="latestupdate.php"><i class="icon-home icon-large"></i>&nbsp;Latest Update
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a></li>
                        <li><a href="sitemap.php"><i class="icon-sitemap icon-large"></i>&nbsp;Site Map
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


                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Head Up!</strong>&nbsp;Welcome to MTU Information Systems Students Virtual Class Room & Chatting System.
                </div>
				<br>
                <div class="slider-wrapper theme-default">
											<?php 
											echo '<div class="alert alert-dismissable alert-danger error"><strong>';
											echo "<center>E-mail Inserted is not Registered !</center>";
											echo '</strong></div>';
											?>
                   <form class="form-horizontal" method="post" action=" ">
				
				<div class="control-group">
				<div style="">
				<?php
	if(isset($_POST['submit'])){
								include('dbcon.php');
								if (isset($_POST['submit'])){
								$e_mail = $_POST['email'];
								$subject="Password Recovery";	
								$query = "SELECT * FROM Account WHERE e_mail='$e_mail' ";
								$result = mysql_query($query)or die(mysql_error());
								$num_row = mysql_num_rows($result);
									$row=mysql_fetch_array($result);
									$fname =$row["f_name"];
									$mname =$row["m_name"];
									$pass =base64_decode($row["password"]);
									if( $num_row > 0 ) {
									
										$message = "Dear $fname $mname  your recovery password is $pass. You can login now ...!";

											 // Send mail by PHP Mail Function
											mail($e_mail, $subject, $message, "From: "."dereseamanuel8@gmail.com");
											echo '<div class="alert alert-dismissable alert-success" style="margin-top:-58px"><strong>';
											echo "<center> Password recovery sent to your e-mail</center>";
											echo '</strong></div>';
									}
									else{ 
									
								}}
								}
								?></div>
				<center>	<label class="control-label" style="margin-left:150px;" for="inputEmail">E-mail address</label>
					<div class="controls">
					<input type="email" style="height:20px; width:250px; margin-left:-170px;" id="inputEmail" name="email" placeholder="e-mail address" required>
					<button type="submit" name="submit" class="btn btn-success"><i class="icon-signin icon-large"></i>&nbsp;Submit</button></center>
					</div>
				</div>
			</form>
                </div>
                <!-- end slider -->
            </div>

        </div>

    </div>
    <!---------------->
    <?php include('footer.php');?>


</div>
</div>






</body>
</html>


