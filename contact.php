<?php
include('header.php');
//Start session
session_start();
//Unset the variables stored in session
unset($_SESSION['id']);
?>
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
                        <li ><a href="latestupdate.php"><i class="icon-home icon-large"></i>&nbsp;Latest Update
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a></li>
                        <li class="active"><a href="contact.php"><i class="icon-envelope-alt icon-large"></i>&nbsp;Contact Us
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
                    <strong><i class="icon-phone-sign icon-large"></i>&nbsp;Directories! and Give Feedbacks</strong>&nbsp;
                </div>
                <div class="hero-unit-3">

                    <div class="row-fluid">
                        <div class="span12">
                            <div ><center> <h3> Send Us Your Feedbacks</h3></center></div>
                        <div class="panel-body" style="margin-top:-15px">
                            <ul class="timeline">
                                <li>
                                    <div class="timeline-badge"><i class="fa fa-check"></i>
                                    </div>
                                    <div class="timeline-panel">
                                      
									  	<form id="contact" name="contact" action="#" method="post" >
								
	<div style="width:420px; margin-left:0px;">
	<?php
	if(isset($_POST['send'])){
								include('dbcon.php');
								if (isset($_POST['send'])){
								$name = $_POST['name'];
								$e_mail = $_POST['email'];
								$text = $_POST['msg'];	
								$query = "insert into feedback (name,email,content) values('$name','$e_mail','$text')";
								$result = mysqli_query($con,$query)or die(mysqli_error());
								if( $result==1){
								echo '<div class="alert alert-dismissable alert-success" style="width:770px; margin-left:-40px; height:20px;" >';
								echo '<center><strong>'." Your message has been successfully sent.".'</strong></center>';
								echo '</div>';
								}
								else{
								echo '<div class="alert alert-dismissable alert-success">';
								echo '<strong>'."Error in sending message.".'</strong>';
								echo '</div>';}
                                }}
								?>
		<label for="name">Your Name</label>
		<input style="height:20px; width:400px;" type="text"   id="name" placeholder=" please enter your name" name="name" class="txt" required>
		<br>
		<label for="email">Your E-mail</label>
		<input style="height:20px; width:400px;" type="email"  id="email" placeholder=" please enter your e-mail adress" name="email" class="txt" required>
		<br>
		<label for="msg">Enter a Message</label>
		<textarea id="msg" name="msg" style="width:500px; height:130px" placeholder="type your message here....." class="txtarea" required></textarea>
		<br>
		<button name="send" class="btn btn-success" style="float:right;" id="send">Send Message</button></div>
	</form>
									  
                                    </div>
                                </li>
								</ul>
								</div>
                        </div>
                    </div>

                </div>
				
				

                <!-- end slider -->
            </div>

        </div>
        <?php include('footer.php'); ?>
    </div>


</div>
</div>






</body>
</html>


