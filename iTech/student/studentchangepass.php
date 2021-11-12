<!-- Include Header -->
<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
        include('./stuinclude/header.php');
        include('../dbconnection.php');
        if(isset($_SESSION['is_login']))
    {
        $stuEmail = $_SESSION['stuLogEmail'];
    }
    else{
    echo "<script>location.href='../index.php';</script>";
    }
    $stuEmail = $_SESSION['stuLogEmail'];

    if(isset($_REQUEST['stupassupdatebtn']))
    {
        if($_REQUEST['stupass'] == "")
        {
            $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Please Fill New Password...</div>';

        }
        else{
            $sql = "SELECT * FROM student WHERE stu_email = '$stuEmail'";
            $result = $conn->query($sql);
            if($result->num_rows == 1)
            {
                $stupass = $_REQUEST['stupass'];
                $sql = "UPDATE student SET stu_pass = '$stupass' WHERE stu_email = '$stuEmail'";
                if($conn->query($sql) == TRUE)
                {
                    $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Password Change Successfully</div>';
                }
                else{
                     $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Error</div>';
                }
            }
        }
    }
?>

<div class="col-sm-9 mt-5">
    <div class="row">
        <div class="col-sm-6">
            <form class="mt-5 mx-5">
                <div class="form-group">
                    <label for="inputemail">Email</label>
                    <input type="email" class="form-control" id="inputemail" name="inputemail"
                    value="<?php echo $stuEmail ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="inputnewpassword">New Password</label>
                    <input type="text" class="form-control" id="inputnewpassword" name="stupass"
                    placeholder="New Password">
                </div>
                <button type="submit" class="btn btn-danger mr-4 mt-4" name="stupassupdatebtn">Update</button>
                <button type="reset" class="btn btn-secondary mr-4 mt-4" >Reset</button>
            </form>
        </div>
        <?php if(isset($passmsg)){echo $passmsg;} ?>
    </div>
</div>
</div>
</div>

<!-- Include Footer -->
<?php
        include('./stuinclude/footer.php');
?>