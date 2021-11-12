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
<!-- <div class="container-fluid bg-dark mt-5">
    <div class="row">
        <img src="image/book.jpg" alt="courses" style="height: 300px; width: 100%;
         object-fit: cover; box-shadow: 10px;">
    </div>
</div> -->
<div class="container jumbotron my-5">
    <div class="row">
        <div class="col-md-4">
            <h5 class="mb-3">If Already Registered !! Login</h5>
            <form role="form" id="stuLoginForm">
                <div class="form-group">
                    <i class="fas fa-envelope"></i>
                    <label for="stuLogEmail" class="pl-2 font-weight-bold">Email</label>
                    <small id="statusLogMsg1"></small>
                    <input type="email" class="form-control" placeholder="Email" name="stuLogEmail" id="stuLogEmail">
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i>
                    <label for="stuLogPass" class="pl-2 font-weight-bold">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="stuLogPass" id="stuLogPass">
                </div>
                <button type="submit" class="btn btn-primary" id="stuLoginBtn" onclick="checkStuLogin()">Login</button>
            </form>
            <br>
            <small id="statusLogMsg"></small>
        </div>
        <div class="col-md-6 offset-md-1">
            <h5 class="mb-3">New User !! SignUp</h5>
                <form role="form" id="stuRegForm">
                    <div class="form-group">
                        <i class="fas fa-user"></i>
                        <label for="stuRegEmail" class="pl-2 font-weight-bold">User Name</label>
                        <input type="text" class="form-control" placeholder="User Name" name="stuRegEmail" id="stuRegEmail">
                    </div>
                    <div class="form-group">
                        <i class="fas fa-envelope"></i>
                        <label for="stuRefEmail" class="pl-2 font-weight-bold">Email</label>
                        <small id="statusLogMsg1"></small>
                        <input type="email" class="form-control" placeholder="Email" name="stuRegEmail" id="stuRefEmail">
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i>
                        <label for="stuRegPass" class="pl-2 font-weight-bold">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="stuRegPass" id="stuRegPass">
                    </div>
                    <button type="submit" class="btn btn-primary" id="signup" onclick="addstu()">Sign Up</button>
                </form>
                <br>
            <small id="successMsg"></small>
        </div>
    </div>
</div>

<?php
    include('./contact.php');
?>

<!-- Footer-->
<?php
    include('./mainInclude/footer.php');
?>