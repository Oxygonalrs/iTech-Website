    <!--Start Navigation-->
    <?php
        include('./mainInclude/header.php');
        include('./dbconnection.php');
    ?>
    <!-- End Navigation -->

    <!--Start Video Background-->
    <div class="container-fluid remove-vid-marg">
        <div class="vid-parent">
            <video class="" autoplay muted loop playsinline style="width:100%;">
                <source src="video/THE SEED __ Inspirational Short Film.mp4">
            </video>
            <div class="vid-overlay"></div>
            <div class="vid-content">
                <h1 class="my-content">Welcome To iTech</h1>
                <small class="my-content">Learn For Earn</small><br>

                <?php
                    if(!isset($_SESSION['is_login'])){
                       echo'<a href="index.php" class="btn btn-danger mt-2" data-toggle="modal" data-target="#stuRegistration">Get Started</a>';
                    }
                    else
                    {
                        echo '<a href="student/studentprofile.php" class="btn btn-success mt-2">My Profile</a>';
                    }
                ?>
               
            </div>
        </div>
    </div>
    <!--End Video Background-->

    <!--Start Text Banner-->
    <div class="container-fluid bg-danger txt-banner">
        <div class="row bottom-banner ">
            <div class="col-sm p-1 ml-5">
                <h5><i class="fas fa-book-open mr-3"></i>100+ Online Courses</h5>
            </div>
            <div class="col-sm p-1">
                <h5><i class="fas fa-users mr-3"></i>Expert Instructors</h5>
            </div>
            <div class="col-sm p-1">
                <h5><i class="fas fa-keyboard mr-3"></i>LifeTime Access</h5>
            </div>
            <div class="col-sm p-1">
                <h5><i class="fas fa-rupee-sign mr-3"></i>Money Back Guarantee</h5>
            </div>
        </div>
    </div>
    <!--End Text Banner-->

    <!--Start Popular Courses-->
    <div class="container mt-5 ">
        <h1 class="text-center">Popular Course</h1>
            <!-- Start Most Popular Courses 1st Card Deck -->
                <div class="card-deck mt-4">
                    <?php
                        $sql = "SELECT * FROM courses LIMIT 3";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0 )
                        {
                            while($row = $result->fetch_assoc())
                            {
                                $course_id = $row['course_id'];
                                echo '<a href="coursedetail.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding: 0px; margin: 0px;">
                                <div class="card">
                                    <img src="'.str_replace('..','.',$row['course_image']).'" class="card-img-top" alt="HTML 5">
                                    <div class="card-body">
                                        <h5 class="card-title">'.$row['course_name'].'</h5>
                                        <p class="card-text">'.$row['course_desc'].'</p>
                                    </div>
                                    <div class="card-footer">
                                        <p class="card-text d-inline">Price: <small><del>&#8377 '.$row['course_original_price'].'</del></small>
                                        <span class="font-weight-bolder">&#8377 '.$row['course_price'].'</span>
                                        </p>
                                        <a class="btn btn-primary text-white font-weight-bolder float-right" href="coursedetail.php?course_id='.$course_id.'">Enroll</a>
                                    </div>
                                </div>
                            </a>';
                            }
                        }
                    ?>
                    
                </div>
            <!-- Second DEsck -->
                <div class="card-deck mt-4">
                    <?php
                        $sql = "SELECT * FROM courses LIMIT 3,3";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0 )
                        {
                            while($row = $result->fetch_assoc())
                            {
                                $course_id = $row['course_id'];
                                echo '<a href="#" class="btn" style="text-align: left; padding: 0px; margin: 0px;">
                                <div class="card">
                                    <img src="'.str_replace('..','.',$row['course_image']).'" class="card-img-top" alt="HTML 5">
                                    <div class="card-body">
                                        <h5 class="card-title">'.$row['course_name'].'</h5>
                                        <p class="card-text">'.$row['course_desc'].'</p>
                                    </div>
                                    <div class="card-footer">
                                        <p class="card-text d-inline">Price: <small><del>&#8377 '.$row['course_original_price'].'</del></small>
                                        <span class="font-weight-bolder">&#8377 '.$row['course_price'].'</span>
                                        </p>
                                        <a class="btn btn-primary text-white font-weight-bolder float-right" href="coursedetail.php?course_id='.$course_id.'">Enroll</a>
                                    </div>
                                </div>
                            </a>';
                            }
                        }
                    ?>
            
                </div>
            
        <!-- End Most Popular Courses 3st Card Deck -->
        <div class="text-center m-2"><br>
            <a class="btn btn-danger btn-sm" href="courses.php">View All Courses</a>
        </div>
    </div><br><hr>
    <!--End Popular Courses-->

    <!-- Start Contact us -->
    <?php
        include('./contact.php');
    ?>
    <!-- End Contact Form -->

    <!-- start student testimonial -->
    <!-- <div class="container-fluid mt-5" style="background-color: #4B7289;" id="FeedBack">
        <h1 class="text-center testyheading p-4">Student's FeedBack</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel" id="testimonial-slider">
                <?php 
                    $sql = "SELECT s.stu_name, s.stu_occ, s.stu_image, f.f_content FROM 
                    student AS s JOIN feedback AS f ON s.stu_id = f.stu_id";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0)
                    {
                        while($row = $result->fetch_assoc())
                        {
                            $s_img = str_replace('..','.',$row['stu_image']);
                ?>
                    <div class="testimonial">
                        <p class="description"><?php echo $row['f_content'];?></p>
                        <div class="pic">
                            <img src="<?php echo $s_img;?>" alt="">
                        </div>
                        <div class="testimonial-prof">
                            <h4><?php echo $row['stu_name'];?></h4>
                            <small><?php echo $row['stu_occ'];?></small>
                        </div>
                    </div>
                        <?php }}?>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End student testimonial -->

    <!-- Social Follow-->
    <div class="container-fluid bg-light">
        <div class="row test-white text-center p-1">
            <div class="col-sm">
                <a class="test-white social-hover" href="#"><i class="fab fa-facebook-f"></i> FaceBook</a>
            </div>
            <div class="col-sm">
                <a class="test-white social-hover" href="#"><i class="fab fa-twitter"></i> Twitter</a>
            </div>
            <div class="col-sm">
                <a class="test-white social-hover" href="#"><i class="fab fa-whatsapp"></i> Whatsapp</a>
            </div>
            <div class="col-sm">
                <a class="test-white social-hover" href="#"><i class="fab fa-instagram"></i> Instagram</a>
            </div>
        </div>
    </div>

    <!-- Start About Section-->
    <div class="container-fluid p-4" style="background-color: #E9ECEF;">
        <div class="container" style="background-color: #E9ECEF;">
            <div class="row text-center">
                <div class="col-sm">
                    <h5>About Us</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis cum ipsam vel,
                         deleniti reprehenderit, incidunt voluptatum, omnis deserunt soluta distinctio 
                         nam harum ipsa. Facilis fuga dolorum beatae hic perferendis eaque
                    </p>
                </div>
                <div class="col-sm">
                    <h5>Category</h5>
                    <a class="text-dark" href="#">Web Development</a><br>
                    <a class="text-dark" href="#">Web Desinging</a><br>
                    <a class="text-dark" href="#">Android App Dev</a><br>
                    <a class="text-dark" href="#">iOS Development</a><br>
                    <a class="text-dark" href="#">Data Science</a><br>
                </div> 
                <div class="col-sm">
                    <h5>Contact Us</h5>
                    <p>iTech Pvt Ltd<br>Helge-Nagar, Nandura<br>Maharastra - 443404<br>Ph. 000000</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer-->
    <?php
        include('./mainInclude/footer.php');
    ?>