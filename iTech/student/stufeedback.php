<?php
  
    if(!isset($_SESSION)){
        session_start();
    }
    include_once('../dbconnection.php');
    include('././stuinclude/header.php');

    if(isset($_SESSION['is_login']))
    {
        $stuEmail = $_SESSION['stuLogEmail'];
    }
    else 
    {
        echo "<script> location.href='../index.php'; </script>";
    }
    if(isset($stuLogEmail))
    {
        $sql = "SELECT * FROM student WHERE stu_email = '$stuEmail'";
        $result = $conn->query($sql);
        if($result->num_rows == 1)
        {
            $row = $result->fetch_assoc();
            $stuId = $row['stu_id'];
        }
        if(isset($_REQUEST['submitfeedbackbtn']))
        {
            if($_REQUEST['f_content'] == "")
            {
                $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Field..</div>';
            }
            else{
                $fcontent = $_REQUEST['f_content'];
                $sql = "INSERT INTO feedback (f_content, stu_id) VALUES ('$fcontent','$stuId')";
                if($conn->query($sql) == TRUE)
                {
                $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Submitted</div>';
                }
                else{
                $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Error</div>';
                }
            }
        }
    }
?>

<div class="col-sm-6 mt-5">
    <form class="mx-5" method="POST" enctype="multipart/form-data">
        <!-- <div class="form-group">
            <label for="stuId">Student Id</label>
            <input type="text" class="form-control" id="stuId" name="stuId" value="<?php if(isset($stuId)){echo $stuId;} ?>">
        </div> -->
        <div class="form-group">
            <label for="f_content">Write Feedback</label>
            <textarea type="text" class="form-control" id="f_content" name="f_content" row=2></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="submitfeedbackbtn">Submit</button>
        <?php if(isset($passmsg)){echo  $passmsg;}?>
    </form>
</div>


<?php
    include('./stuinclude/footer.php');

?>