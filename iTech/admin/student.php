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
?>

    <div class="col-sm-9 mt-5">
    <!--Table-->
        <p class="bg-dark text-white text-center p-2" style="font-size:20px;">List of Student</p>
        <?php
            $sql = "SELECT * FROM student";
            $result = $conn->query($sql);
            if($result->num_rows > 0)
            {
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Student ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = $result->fetch_assoc()){
                
                    echo '<tr>';
                    echo '<th scope="row">'.$row['stu_id'].'</th>';
                    echo '<td>'.$row['stu_name'].'</td>';
                    echo '<td>'.$row['stu_email'].'</td>';
                    echo '<td>
                        <form method="POST" action="editstudent.php"class="d-inline">
                            <input type="hidden" name="id" value="'.$row['stu_id'].'">
                            <button type="submit" class="btn btn-info mr-3" name="view" value="View">
                            <i class="fas fa-pen"></i>
                            </button>
                        </form>

                        <form method="POST" class="d-inline">
                            <input type="hidden" name="id" value="'.$row['stu_id'].'">
                            <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
                            <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>';
                    echo '</tr>';
                     }?>
            </tbody>
        </table>
            <?php } 
                else{
                    echo "No Student Found";
                }
            ?>
    </div>
</div>

<div>
    <a class="btn btn-danger box" href="./studentadd.php"><i class="fas fa-plus fa-2x"></i></a>
</div>
</div>

<!-- Delete Data -->
<?php
    if(isset($_REQUEST['delete']))
    {
        $sql = "DELETE FROM student WHERE stu_id={$_REQUEST['id']}";
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