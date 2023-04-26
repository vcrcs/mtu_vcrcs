<br>
<div class="navbar  navbar-inverse">
    <div class="navbar-inner">
        <div class="footerindex">
            <center><img width="25" height="25" src="admin/img/logomtu.png">&nbsp;MTU-VCRCS Developed by IS 4th Year Graduating Student</center>
        </div>
        <!-- modal -->
        <!-- mission -->
        <div id="mission" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <div class="alert alert-info"><strong>MTU-IS Mission</strong></div>
				<?php
		$status="On";
		$query = "SELECT * FROM Aboutus where status='$status'";
		$result = mysqli_query($con,$query)or die(mysqli_error());
		$row=mysqli_fetch_array($result);
		$ism=$row['is_mission'];
		$vcm=$row['vcrcs_mission'];
		$isv=$row['is_vission'];
		$vcv=$row['vcrcs_vission'];
				?>
                <p><?php echo $ism;?></p>

                <div class="alert alert-info"><strong>VCRCS Mission</strong></div>
                <p><?php echo $vcm;?></p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-sign icon-large"></i>&nbsp;Close</button>
            </div>
        </div>
        <!-- end mission -->
        <!-- vision -->
        <div id="vision" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <div class="alert alert-info"><strong>MTU-IS Vision</strong></div>

                <p><?php echo $isv;?></p>
                
                <div class="alert alert-info"><strong>VCRCS Vision</strong></div>
               <p><?php echo $vcv;?></p>
                
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove-sign icon-large"></i>&nbsp;Close</button>
            </div>
        </div>
        <!-- end vision -->
        <!--end modal -->

    </div>
</div>
</div>


