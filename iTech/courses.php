<!--Start Navigation-->
    <?php
        include('./mainInclude/header.php');
        include('./dbconnection.php');
    ?>
<!-- End Navigation -->

<!--Start Course Page Banner -->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./image/book.jpg" alt="courses" style="height:500px; width:100%; object-fit:cover; box-shadow:10px ">
    </div>
</div>
 <!--Start Popular Courses-->
 <div class="container mt-5 ">
    <h1 class="text-center">All Course</h1>
    <div class="row mt-4">
        <?php 
            $sql = "SELECT * FROM courses";
            $result = $conn->query($sql);
            if($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    $course_id = $row['course_id'];
                    echo '
                    <div class="col-sm-4 mb-4">
                    <a href="coursedetail.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding: 0px; margin: 0px;">
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
                    </a>
                    </div>';
                }
            }
        ?>
    </div>        
</div>
    <!--End Popular Courses-->


 <!-- Footer-->
 <?php
    include('./mainInclude/footer.php');
?>