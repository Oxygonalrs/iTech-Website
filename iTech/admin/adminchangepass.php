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
    $adminEmail = $_SESSION['adminLogEmail'];

    if(isset($_REQUEST['adminpassupdatebtn']))
    {
        if($_REQUEST['adminpass'] == "")
        {
            $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields...</div>';

        }
        else{
            $sql = "SELECT * FROM admin_log WHERE admin_email = '$adminEmail'";
            $result = $conn->query($sql);
            if($result->num_rows == 1)
            {
                $adminpass = $_REQUEST['adminpass'];
                $sql = "UPDATE admin_log SET admin_pass = '$adminpass' WHERE admin_email = '$adminEmail'";
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
                    value="<?php echo $adminEmail ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="inputnewpassword">New Password</label>
                    <input type="text" class="form-control" id="inputnewpassword" name="adminpass"
                    placeholder="New Password">
                </div>
                <button type="submit" class="btn btn-danger mr-4 mt-4" name="adminpassupdatebtn">Update</button>
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
        include('./admininclude/footer.php');
?>