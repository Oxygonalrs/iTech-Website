<?php
    include('./dbconnection.php');
    session_start();
    if(!isset($_SESSION['stuLogEmail']))
    {
        echo "<script>location.href = 'loginsignup.php'</script>";
    }
    else
    {
        header("Pragma: no-cache");
        header("Cache-Control: no-cache");
        header("Expires: 0");
        $stuEmail = $_SESSION['stuLogEmail']
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="GENERATOR" content="Evrsoft First Page">

    <!-- BootStrap Css-->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome Js -->
    <link rel="stylesheet" href="css/all.min.css">

    <!-- Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@300;700&display=swap" rel="stylesheet">

    <!-- Custom Css-->
    <link rel="stylesheet" href="css/style.css">
    <title>CheckOut</title>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-6 offset-sm-3 jumbotron">
                <h3 class="mb-5 text-center">Welcome To iTech Payment Page</h3>
                <form action="./PaytmKit/pgRedirect.php" method="POST">
                    <div class="form-group row">
                        <label for="ORDER_ID" class="col-sm-4 col-form-label">ORDER ID</label>
                        <div class="col-sm-8">
                            <input type="text" id="ORDER_ID" class="form-control" 
                            tabindex="1" maxlength="20" size="20" name="ORDER_ID" readonly
                            autocomplete="off" value="<?php echo  "ORDS" . rand(10000,99999999)?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="CUST_ID" class="col-sm-4 col-form-label">Student</label>
                        <div class="col-sm-8">
                            <input type="text" id="CUST_ID" class="form-control" 
                            tabindex="2" maxlength="12" size="12" name="CUST_ID" readonly
                            autocomplete="off" value="<?php if(isset($stuEmail)){echo $stuEmail;}?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="TXN_AMOUNT" class="col-sm-4 col-form-label">AMOUNT</label>
                        <div class="col-sm-8">
                            <input type="text" id="TXN_AMOUNT" class="form-control" 
                            tabindex="10" name="TXN_AMOUNT" readonly
                            autocomplete="off" value="<?php  if(isset($_POST['id'])){echo $_POST['id'];}?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <!--<label for="INDUSTRY_TYPE_ID" class="col-sm-4 col-form-label">INDUSTRY TYPE ID</label>-->
                        <div class="col-sm-8">
                            <input type="hidden" id="INDUSTRY_TYPE_ID" class="form-control" 
                            tabindex="4" name="INDUSTRY_TYPE_ID" readonly maxlength="12" size="12" 
                            autocomplete="off" value="Retail">
                        </div>
                    </div>
                    <div class="form-group row">
                        <!--<label for="INDUSTRY_TYPE_ID" class="col-sm-4 col-form-label">INDUSTRY TYPE ID</label>-->
                        <div class="col-sm-8">
                            <input type="hidden" id="course_id" class="form-control" 
                            tabindex="4" name="course_id" 
                            autocomplete="off" value="<?php  if(isset($_POST['course_id'])){echo $_POST['course_id'];}?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <!--<label for="CHANNEL_ID" class="col-sm-4 col-form-label">CHANNEL ID</label>-->
                        <div class="col-sm-8">
                            <input type="hidden" id="CHANNEL_ID" class="form-control" 
                            tabindex="4" name="CHANNEL_ID" readonly maxlength="12" size="12" 
                            autocomplete="off" value="WEB">
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" onclick="" class="btn btn-primary" value="CheckOut">
                        <a href="./courses.php" class="btn btn-secondary">Cancel</a>
                    </div><br>
                    <small class="form-text text-muted">Note: Complete Payment by Clicking CheckOut Button</small>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>
<?php
    }
?>