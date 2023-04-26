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
                        <li class="active"><a href="history.php"><i class="icon-list-alt icon-large"></i>&nbsp;History
                                <div class="pull-right">
                                    <i class="icon-double-angle-right icon-large"></i>
                                </div> 
                            </a></li>

                    </ul>
                </div>

            </div>
            <div class="span9">


                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>MTU Information Systems History</strong>
                </div>


                <p>
                <div class="hero-unit-1">
<h3 style="padding:0 20px;">History</h3>
  <p font="" style="font-size:15px;  text-align:justify; padding:0 20px;">&nbsp;&nbsp; &nbsp; Because of the wide range of choices, there is a need of information system specialists which focus on integrating computing technologies and business processes to meet organizational needs. These specialists need to be mainly engaged in solving the problems associated with the organization issue and information systems. The discipline focuses on uses of the technology as a tool for processing, storing and distributing information. Graduates from the Information Systems (IS) department must understand both technical and organizational factors. They must be able to help organizations to use technology to achieve their goals efficiently and effectively. 
<br><br>
Despite the fact that Information Systems as a profession was given in some countries since decades ago, the field is too young in our country. The government of Ethiopia is now aggressively embarking on the introduction and expansion of the ICT sector as a tool for the country's development. Therefore, to get what is expected from the sector, having well trained Information Systems professional on the Information Systems discipline is believed as a core activity. 
<br><br>
Until recent years, there were no institutions that train Information Systems professionals except Addis Ababa University, which had launched the Information Systems program in 2002 at B.Sc. level. Currently, the program is being offered by some private institutions in addition to the government owned universities. 
<br><br>
IS professionals help organization in identifying information system requirements and actively involve in the specification, design and development. They must have good knowledge of the organizations principles and practices in order to bridge the technical and the management community. 
<br><br>
Organizations in Ethiopia are becoming larger and larger and are in a position to need IS professionals to help the management of information to promote their products and services. In line with the Ministry of Educationâ€™s mission, vision and values, universities need to work on a nationally harmonized curriculum of Information Systems to address the requirements of organizations.</div>
                </p>


            </div>

        </div>
        <?php include('footer.php'); ?>
    </div>
</div>
</div>






</body>
</html>


