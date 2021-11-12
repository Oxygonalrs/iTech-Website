<!-- Include Header -->
<?php
if(!isset($_SESSION))
{
    session_start();
}
    include('./admininclude/header.php');
    include('../dbconnection.php');
    if(isset($_SESSION['is_admin_login']))
{
    $adminEmail = $_SESSION['adminLogEmail'];
}
else{
echo "<script>location.href='../index.php';</script>";
}
    if(isset($_REQUEST['lessonsubmitbtn']))
    {
        if(($_REQUEST['lesson_name']=="")||($_REQUEST['lesson_desc']=="")||
        ($_REQUEST['course_name']=="")||($_REQUEST['course_id']==""))
        {
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields...</div>';
        }
        else
        {
            $course_name = $_REQUEST['course_name'];
            $lesson_name = $_REQUEST['lesson_name'];
            $course_id = $_REQUEST['course_id'];
            $lesson_desc = $_REQUEST['lesson_desc'];
            $lesson_link = $_FILES['lesson_link']['name'];
            $lesson_link_temp = $_FILES['lesson_link']['tmp_name'];
            $link_folder = '../video/lessonvid/'.$lesson_link;
            move_uploaded_file($lesson_link_temp, $link_folder);

            $sql = "INSERT INTO lesson (course_name,course_id,lesson_name,lesson_desc,lesson_link)
            VALUES ('$course_name','$course_id','$lesson_name','$lesson_desc','$link_folder')";
            $result = $conn->query($sql);
            if($result==TRUE)
            {
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Lesson Added Successfully</div>';
            }
            else{
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable To Add Lesson</div>';
            }
        }
    }
?>


<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Lessons</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id" 
            value="<?php if(isset($_SESSION['course_id'])){echo $_SESSION['course_id'];}?> " readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name" 
            value="<?php if(isset($_SESSION['course_name'])){echo $_SESSION['course_name'];}?> " readonly>
        </div>
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" class="form-control" id="lesson_name" name="lesson_name">
        </div>
        <div class="form-group">
            <label for="lesson_desc">Lesson Description</label>
            <textarea class="form-control" row=2 id="lesson_desc" name="lesson_desc"></textarea>
        </div>
        <div class="form-group">
            <label for="lesson_link">Lesson Video Link</label>
            <input type="file" class="form-control-file" id="lesson_link" name="lesson_link">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="lessonsubmitbtn" name="lessonsubmitbtn">Submit</button>
            <a href="lesson.php" class="btn btn-secondary">Close</a>
        </div>
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