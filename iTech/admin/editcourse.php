<!-- Include Header -->
<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    include('../dbconnection.php');
    include('./admininclude/header.php');
    if(isset($_SESSION['is_admin_login']))
    {
        $adminEmail = $_SESSION['adminLogEmail'];
    }
    else{
    echo "<script>location.href='../index.php';</script>";
    }
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Course Detail</h3>

    <?php
        if(isset($_REQUEST['view']))
        {
            $sql = "SELECT * FROM courses WHERE course_id ={$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id" readonly value="<?php if(isset($row['course_id'])){echo $row['course_id'];} ?>">
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($row['course_name'])){echo $row['course_name'];} ?>">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <textarea class="form-control" row=2 id="course_desc" name="course_desc" ><?php if(isset($row['course_desc'])){echo $row['course_desc'];} ?></textarea>
        </div>
        <div class="form-group">
            <label for="course_author">Author</label>
            <input type="text" class="form-control" id="course_author" name="course_author" value="<?php if(isset($row['course_author'])){echo $row['course_author'];} ?>">
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" class="form-control" id="course_duration" name="course_duration" value="<?php if(isset($row['course_duration'])){echo $row['course_duration'];} ?>">
        </div>
        <div class="form-group">
            <label for="course_original_price">Course Original Price</label>
            <input type="text" class="form-control" id="course_original_price" name="course_original_price" value="<?php if(isset($row['course_original_price'])){echo $row['course_original_price'];} ?>">
        </div> 
        <div class="form-group">
            <label for="course_price">Course Price</label>
            <input type="text" class="form-control" id="course_price" name="course_price" value="<?php if(isset($row['course_price'])){echo $row['course_price'];} ?>">
        </div> 
        <div class="form-group">
            <label for="course_img">Course Image</label>
            <img src="<?php if(isset($row['course_image'])){echo $row['course_image'];} ?>" alt="image" class="img-thumbnail">
            <input type="file" class="form-control-file" id="course_img" name="course_img">
        </div> 
        <div class="text-center">
            <button type="submit" class="btn btn-primary" id="courseupdatebtn" name="courseupdatebtn">Update</button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
        </div>
        <?php
            if(isset($_REQUEST['courseupdatebtn']))
            {
                if(($_REQUEST['course_name']=="")||($_REQUEST['course_desc']=="")||($_REQUEST['course_author']=="")||
                ($_REQUEST['course_duration']=="")||($_REQUEST['course_original_price']=="")||($_REQUEST['course_price']==""))
                {
                    $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields...</div>';
                }
                else
                {
                    $cid = $_REQUEST['course_id'];
                    $cname = $_REQUEST['course_name'];
                    $cdesc = $_REQUEST['course_desc'];
                    $cauthor = $_REQUEST['course_author'];
                    $cduration = $_REQUEST['course_duration'];
                    $coriginal_price = $_REQUEST['course_original_price'];
                    $cprice = $_REQUEST['course_price'];
                    //$course_image = $_FILES['course_img']['name'];
                    //$course_image_temp = $_FILES['course_img']['tmp_name'];
                    $cimg = '../image/courseimg/'.$_FILES['course_img']['name'];
                    //move_uploaded_file($course_image_temp, $img_folder);
        
                    $sql = "UPDATE courses SET course_id = '$cid', course_name = '$cname', course_desc='$cdesc', course_author='$cauthor',
                    course_image='$cimg', course_duration='$cduration', course_price='$cprice', course_original_price='$coriginal_price' 
                    WHERE course_id = '$cid'";
                    
                    $result = $conn->query($sql);
                    if($result==TRUE)
                    {
                        $msg = '<div class="alert alert-success">Update Successfully</div>';
                    }
                    else{
                       $msg = '<div class="alert alert-danger">Unable to Upadate</div>';
                    }
                }
            }
        ?>
            <?php
            if(isset($msg)){
                echo $msg;
            }
            ?>
    </form>
</div>

</div>
</div>
<!-- Include Footer -->
<?php
        include('./admininclude/footer.php');
?>