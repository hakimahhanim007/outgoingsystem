<!--sidebar-->

<div class="sidebar-fixed position-fixed">
<a class="logo-wrapper waves-effect" 
      </a> 
      <!--list sidebar-->
      <div class ="list-group list-group-flush">

        <a href="dash.php" class="list-group-item active waves-effect">
        <i class="fas fa-chart-pie"></i> &nbsp;Dashboard</a>

        <a href="#" class="list-group-item list-group-item-action waves-effect"  data-toggle="modal" data-target="#modalRegisterForm">
        <i class="fas fa-user"></i>&nbsp;Add Admin</a>
        <a href="view_admin.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-users"></i>&nbsp;View Admin</a>
        
        <a href="#" class="list-group-item list-group-item-action waves-effect"  data-toggle="modal" data-target="#modalRegisterForm2">
        <i class="fas fa-user"></i>&nbsp;Add User</a>

        
        
        <a href="view_user.php" class="list-group-item list-group-item-action waves-effect">
              &nbsp;View User</a>
            
         <a href="view_Memo.php" class="list-group-item list-group-item-action waves-effect">
              &nbsp;View Memo</a>

         <a href="view_Letter.php" class="list-group-item list-group-item-action waves-effect">
              &nbsp;View Letter</a>

         <a href="admin_log.php" class="list-group-item list-group-item-action waves-effect">
         <i class="fas fa-chalkboard-teacher"></i>&nbsp;Admin logged</a>
        <a href="user_log.php" class="list-group-item list-group-item-action waves-effect">
         <i class="fas fa-chalkboard-teacher"></i>&nbsp;User logged</a>
      
         <a href="logout.php" class="list-group-item list-group-item-action waves-effect">
              &nbsp;Sign Out</a>

              </div>
              </div>
            


        <!--add user form-->
        
  </header>

  <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <form action="create_Admin.php" method="POST">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold"><i class="fas fa-user-plus"></i> Add Admin</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
           <div class="md-form mb-5">
        </div>
        <div class="mb-3">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">Admin Name</label>
          <input type="text" name="name" class="form-control validate" required=""> 
        </div>
        <div class="mb-3">
          <i class="fas fa-envelope prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">Admin Email</label>
          <input type="email" name="admin_user" class="form-control validate" required="">
        </div>
        <div class="mb-3">
          <i class="fas fa-envelope prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">Position</label>
          <input type="text" name="admin_position" class="form-control validate" required="">
        </div>
        <div class="mb-3">
          <i class="fas fa-lock prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">Password</label>
          <input type="password" name="admin_password" class="form-control validate" required="">  
        </div>
        <div class="mb-3">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">User Status</label>
          <input type="text" name="admin_status" value = "Admin" class="form-control validate" readonly="">
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-info" name="reg">Add</button>
      </div>
    </div>
  </div>
</div>
</form>
<!--end modaladmin-->
     
       <!--Add user-->
  <div class="modal fade" id="modalRegisterForm2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <form action="create_user.php" method="POST">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold"><i class="fas fa-user-plus"></i>Add User Staff</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body mx-3">
           <div class="md-form mb-5">
        </div>
        <div class="mb-3">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label" >Name</label>
          <input type="text" name="name" class="form-control" required >
        </div>
        <div class="mb-3">
          <i class="fa fa-address-card prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">Staff ID</label>
          <input type="text" onkeyup="this.value = this.value.toUpperCase();" name="staffid" class="form-control" required >
        </div>
        <div class="mb-3">
          <i class="fa fa-id-badge prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">Position</label>
          <input type="text" name="position" class="form-control" required > 
        </div>
        <div class="mb-3">
          <i class="fa fa-id-badge prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">Department</label>
          <select class="form-select" name="department" required >
            <option value="">Please select department</option>
            <option value="Account">Account</option>
            <option value="Contract">Contract</option>
            <option value="Engineering">Engineering</option>
            <option value="HR">HR</option>
            <option value="MIS">MIS</option>
            <option value="Operation">Operation</option>
            <option value="SFU">SFU</option>
             <option value="QA">QA</option>
          </select>
        </div>
        <div class="mb-3">
          <i class="fas fa-envelope prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">Email</label>
          <input type="email" name="email_address" class="form-control validate" required>
        </div>
        <div class="mb-3">
          <i class="fas fa-lock prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">Password</label>
          <input type="password" id="orangeForm-pass" name="user_password" class="form-control" required>
        </div>
        <div class="mb-3">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">User Status</label>
          <input type="text" name="user_status" value ="Staff" class="form-control" readonly>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-info" name="reguser">Add</button>
      </div>
    </div>
  </div>
</div>
</form>
</header>


