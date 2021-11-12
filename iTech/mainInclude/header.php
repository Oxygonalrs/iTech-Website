<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iTech</title>

    <!-- BootStrap Css-->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome Js -->
    <link rel="stylesheet" href="css/all.min.css">

    <!-- Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@300;700&display=swap" rel="stylesheet">
    
    <!-- Custom Css-->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-sm navbar-light bg-light  fixed-top">
        <a class="navbar-brand pl-5" href="index.php">iTech</a><span class="navbar-text"><small> Learn For Earn</small></span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav custom-nav ml-5">
            <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link ">Home</a></li>
            <li class="nav-item custom-nav-item"><a href="courses.php" class="nav-link">Courses</a></li>
            <li class="nav-item custom-nav-item"><a href="paymentstatus.php" class="nav-link">Payment Status</a></li>

            <?php
              session_start();
              if(isset($_SESSION['is_login'])){
                echo '<li class="nav-item custom-nav-item"><a href="student/studentprofile.php" class="nav-link">My Profile</a></li>
                <li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
              }
              else{
                echo '<li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#stuLogin">Login</a></li>
                <li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#stuRegistration">Sign Up</a></li>';
              }
            ?>

            <!-- <li class="nav-item custom-nav-item"><a href="#feeback" class="nav-link">FeedBack</a></li> -->
            <!-- <li class="nav-item custom-nav-item"><a href="#contact" class="nav-link">contact</a></li> -->
          </ul>
        </div>
    </nav>