<?php

    if(!isset($_SESSION)){
        session_start();
    }
    include('./stuinclude/header.php');
    include_once('../dbconnection.php');

    if(isset($_SESSION['is_login']))
    {
        $stuEmail = $_SESSION['stuLogEmail'];
    }
    else 
    {
        echo "<script> location.href='../index.php'; </script>";
    }

    $sql= "SELECT * FROM student WHERE stu_email = '$stuEmail'";
    $result = $conn->query($sql);
    if($result->num_rows == 1)
    {
        $row = $result->fetch_assoc();
        $stuid = $row['stu_id'];
        $stuName = $row['stu_name'];
        $stuOcc = $row['stu_occ'];
        $stuImg = $row['stu_img'];
    }

    if(isset($_REQUEST['updatestunamebtn']))
    {
        if($_REQUEST['stuName'] == "")
        {
            $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Field..</div>';
        }
        else
        {
            $stuName = $_REQUEST['stuName'];
            $stuOcc = $_REQUEST['stuOcc'];
            //$stu_image = $_FILES['stuImg']['name'];
            $stu_image_temp = $_FILES['stuImg']['tmp_name'];
            $img_folder = '../image/stu/'.$_FILES['stuImg']['name'];
            move_uploaded_file($stu_image_temp,$img_folder);
            $sql = "UPDATE student SET stu_name = '$stuName', stu_occ = '$stuOcc',
            stu_img = '$img_folder' WHERE stu_email = '$stuEmail'";
            if($conn->query($sql)==TRUE)
            {
                $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Profile Update Successfully</div>';
            }
            else
            {
                $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Error</div>';
            }
        }
    }

?>

<div class="col-sm-6 mt-5">
    <form class="mx-5" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stuid">Student ID</label>
            <input type="text" class="form-control" id="stuid" name="stuid" value="<?php if(isset($stuid)){echo $stuid;}?>" readonly>
        </div>
        <div class="form-group">
            <label for="stuEmail">Student Email</label>
            <input type="email" class="form-control" id="stuEmail" name="stuEmail" value="<?php if(isset($stuEmail)){echo $stuEmail;}?>" readonly>
        </div>
        <div class="form-group">
            <label for="stuName">Student Name</label>
            <input type="text" class="form-control" id="stuName" name="stuName" value="<?php if(isset($stuName)){echo $stuName;}?>">
        </div>
        <div class="form-group">
            <label for="stuOcc">Student Occupation</label>
            <input type="text" class="form-control" id="stuOcc" name="stuOcc" value="<?php if(isset($stuOcc)){echo $stuOcc;}?>">
        </div>
        <div class="form-group">
            <label for="stuImg">Upload Image</label>
            <input type="file" class="form-control-file" id="stuImg" name="stuImg">
        </div>
        <button type="submit" class="btn btn-primary" name="updatestunamebtn">Update</button>
        <?php if(isset($passmsg)){echo $passmsg;} ?>
    </form>
</div>


<?php
    include('./stuinclude/footer.php');
?>