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
    <h3 class="text-center">Update Student Detail</h3>

    <?php
        if(isset($_REQUEST['view']))
        {
            $sql = "SELECT * FROM student WHERE stu_id ={$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stu_id">Student ID</label>
            <input type="text" class="form-control" id="stu_id" name="stu_id" readonly value="<?php if(isset($row['stu_id'])){echo $row['stu_id'];} ?>">
        </div>
        <div class="form-group">
            <label for="stu_name">Student Name</label>
            <input type="text" class="form-control" id="stu_name" name="stu_name" value="<?php if(isset($row['stu_name'])){echo $row['stu_name'];} ?>">
        </div>
        <div class="form-group">
            <label for="stu_email">Student Email</label>
            <input type="text" class="form-control" id="stu_email" name="stu_email" value="<?php if(isset($row['stu_email'])){echo $row['stu_email'];} ?>">
        </div>
        <div class="form-group">
            <label for="stu_pass">Student Password</label>
            <input type="password" class="form-control" id="stu_pass" name="stu_pass" value="<?php if(isset($row['stu_pass'])){echo $row['stu_pass'];} ?>">
        </div>
        <div class="form-group">
            <label for="stu_occ">Occupation</label>
            <input type="text" class="form-control" id="stu_occ" name="stu_occ" value="<?php if(isset($row['stu_occ'])){echo $row['stu_occ'];} ?>">
        </div> 
        <div class="text-center">
            <button type="submit" class="btn btn-primary" id="studentupdatebtn" name="studentupdatebtn">Update</button>
            <a href="student.php" class="btn btn-secondary">Close</a>
        </div>
        <?php
            if(isset($_REQUEST['studentupdatebtn']))
            {
                if(($_REQUEST['stu_name']=="")||($_REQUEST['stu_email']=="")||($_REQUEST['stu_pass']=="")||($_REQUEST['stu_occ']==""))
                {
                    $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields...</div>';
                }
                else
                {
                    $cid = $_REQUEST['stu_id'];
                    $cname = $_REQUEST['stu_name'];
                    $cemail = $_REQUEST['stu_email'];
                    $cpass = $_REQUEST['stu_pass'];
                    $cocc = $_REQUEST['stu_occ'];
        
                    $sql = "UPDATE student SET stu_id = '$cid', stu_name = '$cname', stu_email='$cemail', stu_pass='$cpass',
                    stu_occ='$cocc' WHERE stu_id = '$cid'";
                    
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