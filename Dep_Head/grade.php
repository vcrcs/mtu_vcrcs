<?php
include('../dbcon.php');
$ab=trim($_GET['ID']);
$array = array();
$abenn=mysqli_query($con,"Select * from Caricullum ")or die(mysqli_error());
while($ro = mysqli_fetch_array($abenn)){
$array[] = $ro;
$code=trim($ro['code']);	
if($code==$ab){
$ev_1=ucfirst($ro['eval_1']);
$ev_2=ucfirst($ro['eval_2']);
$ev_3=ucfirst($ro['eval_3']);
$ev_4=ucfirst($ro['eval_4']);
$ev_5=ucfirst($ro['eval_5']);
$a=mysqli_query($con,"Select * from Course where course_code='$ab'")or die(mysqli_error());
$r = mysqli_fetch_array($a);	
$year=$r['year'];
$semi=$r['semester'];	
	}}

    echo' <table class="table table-striped table-bordered table-hover" id="sample_2">';
	echo' <thead>';
    echo' <tr>';
						echo' <th class="head0">Student Id'.$ev_1.'</th>';
                        echo' <th class="head1">Full Name</th>';
						echo' <th class="head0">Course </th>';
						echo' <th class="head1">'.$ev_1.'</th>';
                        echo' <th class="head0">'.$ev_2.'</th>';
						echo' <th class="head1">'.$ev_3.'</th>';
						echo' <th class="head0">'.$ev_4.'</th>';
						echo' <th class="head1">'.$ev_5.'</th>';
						echo' <th class="head1">Result</th>';
						echo' <th class="head0">Grade</th>';
                        echo'   </tr>';
                        echo'  </thead>';
                        echo'   <tbody>';
						$qsss = mysqli_query($con,"SELECT * FROM Evaluation where year='$year' AND semester='$semi' AND course_code='$ab'")or die(mysqli_error());
						$array = array();
						while($rowss = mysqli_fetch_assoc($qsss)){
						$array[] = $rowss; 
						$status = $rowss['status'];
						$z= $rowss['stud_id'];
						$q = mysqli_query($con,"SELECT * FROM Account where user_id='$z'")or die(mysqli_error());
						$rr= mysqli_fetch_array($q);
						if($status=="Complete"){
						echo'  <tr class="gradeX">';
                        echo'  <td>'; echo $rowss['stud_id']; echo' </td>';
						echo'  <td>'; echo $rr['f_name'];  echo $rr['m_name']; echo'</td>';
						echo'  <td>'; echo $r['course_name']; echo'</td>';
                        echo'  <td>'; echo $rowss['eval_1']; echo'</td>';
						echo'  <td>'; echo $rowss['eval_2']; echo'</td>';
						echo'  <td>'; echo $rowss['eval_3']; echo'</td>';
                        echo'  <td>'; echo $rowss['eval_4']; echo'</td>';
						echo'  <td>'; echo $rowss['eval_5']; echo'</td>';
						echo'  <td>'; echo $rowss['result']; echo'</td>';
						echo'  <td>'; echo $rowss['grade']; echo'</td>';
                        echo'  </tr> '; }} 
    echo'    </tbody>';
    echo'    </table></div>';

?>


