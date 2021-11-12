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
    $sql = "SELECT * FROM courses";
    $result = $conn->query($sql);
    $totalcourse = $result->num_rows;

    $sql = "SELECT * FROM student";
    $result = $conn->query($sql);
    $totalstu = $result->num_rows;

    $sql = "SELECT * FROM courseorder ORDER BY id DESC";
    $result = $conn->query($sql);
    $totalsold = $result->num_rows;
?>
            <div class="col-sm-9 mt-5">
                <div class="row mx-5 text-center">
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-header">Courses</div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <?php echo $totalcourse; ?>
                                </h4>
                                <a class="btn text-white" href="courses.php">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-header">Student</div>
                            <div class="card-body">
                                <h4 class="card-title">
                                <?php echo $totalstu; ?>
                                </h4>
                                <a class="btn text-white" href="student.php">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                            <div class="card-header">Sold</div>
                            <div class="card-body">
                                <h4 class="card-title">
                                <?php echo $totalsold; ?>
                                </h4>
                                <a class="btn text-white" href="sellreport.php">View</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Table-->

                <?php
                $sql = "SELECT * FROM courseorder";
                $result = $conn->query($sql);
                if($result->num_rows > 0)
                {
                    echo '
                        <p class="bg-dark text-white p-2 mt-4">Courses Ordered</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Course ID</th>
                                    <th scope="col">Student Email</th>
                                    <th scope="col">Order Date</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>';
                            while($row = $result->fetch_assoc())
                            {
                                echo '
                                    <tr>
                                    <th scope="row">'.$row['order_id'].'</th>
                                    <td>'.$row['course_id'].'</td>
                                    <td>'.$row['stu_email'].'</td>
                                    <td>'.$row['order_date'].'</td>
                                    <td>'.$row['amount'].'</td>
                                    <td><form action="" method="POST" class="d-inline>
                                        <input type="hidden" name="id" value='.$row['order_id'].'>
                                        <button type="submit" class="btn btn-secondary" name="delete"
                                        value="Delete"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                    </tr>';
                            }
                                    echo '
                                        <tr>
                                        <td><form class="d-print-none"><input class="btn btn-danger"
                                        type="submit" value="Print" onclick="window.print()"></form></td>
                                        </tr> 
                            </tbody> 
                        </table>';
                        }
                    ?>

            </div>
        </div>
    </div>
<!-- Delete Data -->
<?php
    if(isset($_REQUEST['delete']))
    {
        $sql = "DELETE FROM courseorder WHERE co_id={$_REQUEST['id']}";
        if($conn->query($sql) == TRUE){
            echo'<meta http-equiv = "refresh" content="0;URL=?deleted"/>';
        }
        else{
            echo 'Unable to Delete Data';
        }
    }
?>

<!-- Include Footer -->

   <?php
        include('./admininclude/footer.php');
   ?>