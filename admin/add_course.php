<?php include('header.php'); ?>
<?php include('session.php'); ?>
<body>

    <div class="row-fluid">
        <div class="span12">

            <?php include('navbar.php'); ?>
				<?php include('dbcon.php'); ?>

            <div class="container">

                <div class="row-fluid">
                    <div class="span2">
                        <!-- left nav -->
                        <ul class="nav nav-tabs nav-stacked">

                            <li class="active">
                                <a href="add_course.php"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add Course</a>
                                <a href="course.php"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
                            </li>


                        </ul>
                        <!-- right nav -->
                    </div>
                    <div class="span10">
                        <div class="hero-unit-3">
                            <ul class="thumbnails">
                                <li class="span7">
                                    <div class="thumbnail">
                                        <div class="alert alert-info"><i class="icon-plus-sign-alt icon-large"></i>&nbsp;Add Course Entry</div>

                                        <form class="form-horizontal" method="POST">

                                            <div class="control-group">
                                                <label class="control-label" for="inputPassword">Course Year And Section:</label>
                                                <div class="controls">
                                                    <input type="text" name="cc" id="inputPassword" placeholder="Course Year And Section" required>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="inputPassword">Department:</label>
                                                <div class="controls">
            
                                                    <select name="cd" required>
                                                        <option></option>
                                                        <?php 
                                                        $query=mysqli_query($con,"select * from department");
                                                        while($row=mysqli_fetch_array($query)){
                                                            ?>
                                                        <option><?php echo $row['department']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="inputPassword">Major:</label>
                                                <div class="controls">
                                                    <input type="text" name="major" id="inputPassword" placeholder="Major">
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <div class="controls">

                                                    <button type="submit" name="save" class="btn btn-info"><i class="icon-save icon-large"></i>&nbsp;Save Course</button>
                                                </div>
                                            </div>
                                        </form>

                                        <?php
                                        if (isset($_POST['save'])) {


                                            $cc = $_POST['cc'];
                                            $cd = $_POST['cd'];
                                            $major = $_POST['major'];



                                            mysqli_query($con,"insert into course (cys,department,major) values ('$cc','$cd','$major')") or die(mysqli_error());
                                            header('location:course.php');
                                        }
                                        ?>

                                    </div>
                                </li>

                            </ul>

                        </div>

                    </div>
                </div>

                <?php include('footer.php'); ?>
            </div>
        </div>
    </div>




</body>
</html>


