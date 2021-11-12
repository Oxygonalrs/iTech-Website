<!-- Start Registration Form-->
<div class="modal fade" id="stuRegistration" tabindex="-1" aria-labelledby="stuRegistrationLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="stuRegistrationLabel">Student Registration</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form id="stuRegForm">
                    <div class="form-group">
                        <i class="fas fa-user"></i><label for="stuname" class="pl-2 font-weight-bold">User Name</label>
                      <input type="text" class="form-control" id="stuname" name="stuname" placeholder="User Name">
                      <small id="statusMsg1" style="color:red;"></small>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-envelope"></i><label for="stuemail" class="pl-2 font-weight-bold">Email</label>
                        <input type="email" class="form-control" id="stuemail" name="stuemail" placeholder="Email Address">
                        <small id="statusMsg2" style="color:red;"></small>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                      </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i><label for="stupass" class="pl-2 font-weight-bold">New Password</label>
                      <input type="password" class="form-control" id="stupass" name="stupass" placeholder="Password">
                      <small id="statusMsg3" style="color:red;"></small>
                    </div>
                  </form>
            </div>
            <div class="modal-footer">
            <span id="successMsg"></span>
            <button type="button" class="btn btn-primary" id="signup" onclick="addstu()">Sign Up</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
    <!-- End Registration Form-->
    <!-- 2,892 Line code -->