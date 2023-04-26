        <div id="slider" class="nivoSlider">
		<?php
		include('dbcon.php');
		$status="On";
		$query = "SELECT * FROM Slide where status='$status'";
		$result = mysqli_query($con,$query)or die(mysqli_error());
		$row=mysqli_fetch_array($result);
		$pic1=$row['slide_1'];
		$pic2=$row['slide_2'];
		$pic3=$row['slide_3'];
		$pic4=$row['slide_4'];
		?>
                        <img src="Uploads/<?php echo $pic1;?>" data-thumb="entry1.jfif" alt="" />
                        <img src="Uploads/<?php echo $pic2;?>" data-thumb="entry2.jfif" alt="" />
                        <img src="Uploads/<?php echo $pic3;?>" data-thumb="entry1.jfif" alt="" t />
                        <img src="Uploads/<?php echo $pic4;?>"  alt="" data-transition="slideInLeft" />
                   
                    </div>
