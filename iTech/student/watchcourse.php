<?php

    if(!isset($_SESSION)){
        session_start();
    }
    //include('./stuinclude/header.php');
    include_once('../dbconnection.php');

    if(isset($_SESSION['is_login']))
    {
        $stuEmail = $_SESSION['stuLogEmail'];
    }
    else 
    {
        echo "<script> location.href='../index.php'; </script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>iTech</title>

    <!-- BootStrap Css-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Font Awesome Js -->
    <link rel="stylesheet" href="../css/all.min.css">

    <!-- Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@300;700&display=swap" rel="stylesheet">
    
    <!-- Custom Css-->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container-fluid bg-success p-2">
        <h3>Welcome To iTech</h3>
        <a href="./mycourse.php" class="btn btn-danger">My Courses</a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 border-right">
                <h4 class="text-center">Lessons</h4>
                <ul id="playlist" class="nav flex-column">
                    <?php
                        if(isset($_GET['course_id']))
                        {
                            $course_id = $_GET['course_id'];
                            $sql = "SELECT * FROM lesson WHERE course_id ='$course_id'";
                            $result = $conn->query($sql);
                            if($result->num_rows > 0)
                            {
                                while($row = $result->fetch_assoc())
                                {
                                    echo '<li class="nav-item border-bottom py-2" movieurl="'.$row['lesson_link'].'"
                                    style="cursor:pointer;">'.$row['lesson_name'].'</li>';
                                }
                            }
                        }
                    ?>
                </ul>
            </div>
            <div class="col-sm-8">
                <video id="videoarea" src="" class="mt-5 w-75 ml-2" controls></video>
            </div>
        </div>
    </div>
<!-- JQuery and Bootstart JS -->
<script src="../js/jquery.min.js"></script> 
     <script src="../js/pooper.min.js"></script> 
     <script src="../js/bootstrap.min.js"></script> 

     <!--Font awesome JS-->
     <script src="../js/all.min.js"></script> 

     <!--Student Ajax Call JS -->
     <script type="text/javascript" src="../js/ajaxrequest.js"></script>

     <!--Admin Ajax Call JS -->
     <script type="text/javascript" src="../js/adminajaxrequest.js"></script>
     <script type="text/javascript" src="../js/custom.js"></script>
</body>
</html>