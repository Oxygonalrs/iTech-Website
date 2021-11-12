<!--Start Navigation-->
<?php
        include('./mainInclude/header.php');
        include('./dbconnection.php');

    ?>
<!-- End Navigation -->

<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./image/book.jpg" alt="courses" style="height:500px; width:100%; object-fit:cover; box-shadow:10px ">
    </div>
</div>

<!-- Start Main COntent -->
<div class="container mt-5">
    <div class="row">
        <?php
            if(isset($_GET['course_id']))
            {
                $course_id = $_GET['course_id'];
                $_SESSION['course_id'] = $course_id;
                $sql = "SELECT * FROM courses WHERE course_id = '$course_id'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
            }
        ?>
        <div class="col-md-4">
            <img src="<?php echo str_replace('..','.',$row['course_image']);?>" class="card-img-top" alt="HTML5">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <H5 class="card-title">Course Name: <?php echo $row['course_name']; ?></H5>
                <p class="card-text">Description: <?php echo $row['course_desc']; ?>
                </p>
                <p class="card-text">Duration: <?php echo $row['course_duration']; ?></p>
                <form action="checkout.php" method="POST">
                    <p class="card-text d-inline">Price: <small><del>&#8377 <?php echo $row['course_original_price']; ?></del></small>
                        <span class="font-weight-bolder">&#8377 <?php echo $row['course_price']; ?></span></p>
                        <input type="hidden" name="id" value="<?php echo $row['course_price']; ?>">
                        <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
                        <button type="submit" class="btn btn-primary text-white font-weight-bolder float-right"
                        name="buy">Buy Now</button>
                </form>
            </div>
        </div>
    </div>
<br>
<br>
    <div class="container">
        <div class="row">
        <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">Serial No.</th>
                        <!-- <th scope="col">Lesson No.</th> -->
                        <th scope="col">Lesson Name.</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                $sql = "SELECT * FROM lesson";
                $result = $conn->query($sql);
                if($result->num_rows > 0)
                {
                    $i=1;
                    while($row = $result->fetch_assoc())
                    {
                       if($course_id == $row['course_id']){
                        echo ' <tr>
                        <th scope="row">'.$i.'</th>
                        
                        <td scope="col">'.$row['lesson_name'].'</td>
                        </tr>';
                        // <th scope="row">'.$row['lesson_id'].'</th>
                        $i = $i +1;
                       }
                    }
                }
            ?>  
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Footer-->
<?php
    include('./mainInclude/footer.php');
?>