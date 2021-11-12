<footer class="container-fluid bg-dark text-center p-2">
        <small class="text-white">Copyright &copy; 2021 || Designed By iTech and Mayur Bansod and Team ||<a href="#" data-toggle="modal" data-target="#adminLogin"> Admin Login</a></small>
    </footer>

    <!-- Start Registration Form-->
    <?php
        include('./studentreg.php');
    ?>
    <!-- End Registration Form-->

    <!-- Start sTudent Login Form-->
    <div class="modal fade" id="stuLogin" tabnindex="-1" aria-labelledby="stuLoginLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="stuLoginLabel">Student Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form id="stuLoginForm">
                    <div class="form-group">
                        <i class="fas fa-envelope"></i><label for="stuLogemail" class="pl-2 font-weight-bold">Email</label>
                        <input type="email" class="form-control" id="stuLogemail" name="stuLogemail" placeholder="Email Address">
                      </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i><label for="stuLogpass" class="pl-2 font-weight-bold">Password</label>
                      <input type="password" class="form-control" id="stuLogpass" name="stuLogpass" placeholder="Password">
                    </div>
                  </form>
            </div>
            <div class="modal-footer">
            <small id="statusLogMsg"></small>
            <button type="button" class="btn btn-primary" onclick="checkStuLogin()" id="stuLoginBtn">Login</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
    <!-- End Login Form-->

    <!-- Admin Login Form-->
    <div class="modal fade" id="adminLogin" tabnindex="-1" aria-labelledby="adminLoginLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="adminLoginLabel">Admin Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form id="adminLoginForm">
                    <div class="form-group">
                        <i class="fas fa-envelope"></i><label for="adminLogemail" class="pl-2 font-weight-bold">Email</label>
                        <input type="email" class="form-control" id="adminLogemail" name="adminLogemail" placeholder="Email Address">
                      </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i><label for="adminLogpass" class="pl-2 font-weight-bold">Password</label>
                      <input type="password" class="form-control" id="adminLogpass" name="adminLogpass" placeholder="Password">
                    </div>
                  </form>
            </div>
            <div class="modal-footer">
            <span id="statusAdminLogMsg"></span>
            <button type="button" class="btn btn-primary" onclick="checkAdminLogin()" id="adminLoginBtn">Admin Login</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
    <!-- End Admin Login Form-->

     <!-- JQuery and Bootstart JS -->
     <script src="js/jquery.min.js"></script> 
     <script src="js/pooper.min.js"></script> 
     <script src="js/bootstrap.min.js"></script> 

     <!--Font awesome JS-->
     <script src="js/all.min.js"></script> 

     <!--Student Ajax Call JS -->
     <script type="text/javascript" src="js/ajaxrequest.js"></script>

     <!--Admin Ajax Call JS -->
     <script type="text/javascript" src="js/adminajaxrequest.js"></script>
</body>
</html>