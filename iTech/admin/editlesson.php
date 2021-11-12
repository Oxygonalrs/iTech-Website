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
    <h3 class="text-center">Update Lesson Detail</h3>

    <?php
        if(isset($_REQUEST['view']))
        {
            $sql = "SELECT * FROM lesson WHERE lesson_id ={$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="lesson_id">Lesson ID</label>
            <input type="text" class="form-control" id="lesson_id" name="lesson_id" readonly value="<?php if(isset($row['lesson_id'])){echo $row['lesson_id'];} ?>">
        </div>
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" class="form-control" id="lesson_name" name="lesson_name" value="<?php if(isset($row['lesson_name'])){echo $row['lesson_name'];} ?>">
        </div>
        <div class="form-group">
            <label for="lesson_desc">Lesson Description</label>
            <textarea class="form-control" row=2 id="lesson_desc" name="lesson_desc" ><?php if(isset($row['lesson_desc'])){echo $row['lesson_desc'];} ?></textarea>
        </div>
        <div class="form-group">
            <label for="Course_id">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id" readonly value="<?php if(isset($row['course_id'])){echo $row['course_id'];} ?>">
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" onkeypress="isInputNumber(event)" value="<?php if(isset($row['course_name'])){echo $row['course_name'];} ?>">
        </div>
        <div class="form-group">
            <label for="lesson_link">Lesson Link</label>
            <div class="embed-responsive embed-responsive-16by9">   
                <iframe class="embed-responsive-item" src="<?php if(isset($row['lesson_link'])){echo $row['lesson_link']; }?>"
                    allowfullscreen>
                </iframe>
            </div><br/>
            <!-- Check on it -->
            <input type="file" class="form-control-file" id="lesson_link" name="lesson_link" value="<?php if(isset($row['lesson_link'])){echo $row['lesson_link'];} ?>">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" id="lessonupdatebtn" name="lessonupdatebtn">Update</button>
            <a href="lesson.php" class="btn btn-secondary">Close</a>
        </div>
        <?php
            if(isset($_REQUEST['lessonupdatebtn']))
            {
                if(($_REQUEST['course_name']=="")||($_REQUEST['course_id']=="")||
                ($_REQUEST['lesson_name']=="")||($_REQUEST['lesson_id']=="")||($_REQUEST['lesson_desc']==""))
                {
                    $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields...</div>';
                }
                else
                {
                    $cid = $_REQUEST['course_id'];
                    $lid = $_REQUEST['lesson_id'];
                    $cname = $_REQUEST['course_name'];
                    $lname = $_REQUEST['lesson_name'];
                    $ldesc = $_REQUEST['lesson_desc'];
                    $llink = '../video/lessonvid/'.$_FILES['lesson_link']['name'];
        
                    $sql = "UPDATE lesson SET course_id = '$cid', course_name = '$cname',
                    course_id = '$cid', course_name = '$cname', lesson_desc='$ldesc',  
                    lesson_link='$llink' WHERE lesson_id = '$lid'";
                    
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