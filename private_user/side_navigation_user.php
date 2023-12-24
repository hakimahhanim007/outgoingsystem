<!-- Sidebar -->
    <div class="sidebar-fixed position-fixed">

      <a class="logo-wrapper waves-effect">
        <img src="img/e-archive3.png" width="auto" height="auto" class="img-fluid" alt="">
      </a> 

      <div class="list-group list-group-flush">
        <a href="dashboard.php" class="list-group-item active waves-effect">
          <i class="fas fa-chart-pie"></i> &nbsp;Dashboard</a>
        <!--<a href="#" class="list-group-item list-group-item-action waves-effect"  data-toggle="modal" data-target="#modalRegisterForm">
          <i class="fas fa-user"></i>&nbsp;Add Admin</a>
        <a href="view_admin.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-users"></i>&nbsp;View Admin</a>
        <a href="#" class="list-group-item list-group-item-action waves-effect" data-toggle="modal" data-target="#modalRegisterForm2">
          <i class="fas fa-user"></i>&nbsp;Add User</a>
        <a href="view_user.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-users"></i>&nbsp;View User</a>-->
        <a href="#" class="list-group-item list-group-item-action waves-effect" data-toggle="modal" data-target="#modalRegisterForm3">
          <i class="fas fa-map-marker"></i>&nbsp;Add Location</a>
        <a href="add_document.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-file-medical"></i>&nbsp;Add Document</a>
        <a href="view_userfile.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-folder-open"></i>&nbsp;View File</a>
        <!--<a href="admin_log.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-chalkboard-teacher"></i>&nbsp;Admin logged</a>
        <a href="user_log.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-chalkboard-teacher"></i>&nbsp;User logged</a>-->
    <!--     <a href="#" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-money-bill-alt mr-3"></i>Orders</a> -->
      </div>

    </div>
    <!-- Sidebar -->

  </header>
  <!--Add admin-->
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
        <h4 class="modal-title w-100 font-weight-bold"><i class="fas fa-user-plus"></i> Add User Employee</h4>
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
          <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
          <i class="fa fa-address-card prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">Staff ID</label>
          <input type="text" name="staffid" class="form-control">
        </div>
        <div class="mb-3">
          <i class="fa fa-id-badge prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">Position</label>
          <input type="text" name="position" class="form-control">
         
        </div>
        <div class="mb-3">
          <!--<i class="fa fa-id-badge prefix grey-text"></i>-->
          <i class="fa fa-id-badge prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">Department</label>
          <select class="form-select" name="department">
            <option value="">Please select department</option>
            <option value="Account">Account</option>
            <option value="Contract">Contract</option>
            <option value="Engineering">Engineering</option>
            <option value="HR">HR</option>
            <option value="MIS">MIS</option>
            <option value="Operation">Operation</option>
            <option value="SFU">SFU</option>
          </select>
        </div>
        <div class="mb-3">
          <i class="fas fa-envelope prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">Email</label>
          <input type="email" name="email_address" class="form-control validate" required="">
        </div>
        <div class="mb-3">
          <i class="fas fa-lock prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">Password</label>
          <input type="password" id="orangeForm-pass" name="user_password" class="form-control" required="">
        </div>
         <div class="mb-3">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">User Status</label>
          <input type="text" name="user_status" value ="Employee" class="form-control" readonly="">
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-info" name="reguser">Add</button>
      </div>
    </div>
  </div>
</div>
</form>
<!--end modaluser-->

<!--Add Location-->
  <div class="modal fade" id="modalRegisterForm3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <form action="create_location.php" method="POST">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold"><i class="fas fa-map-marker"></i> Add File Location</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body mx-3">
           <div class="md-form mb-5"></div>
            <div class="md-form mb-5">
              <i class="fas fa-map-marker prefix grey-text"></i>
              <input type="text" id="orangeForm-name" name="location_name" class="form-control validate">
              <label data-error="wrong" data-success="right" for="orangeForm-name">Location Name</label>
            </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button class="btn btn-info" name="reglocation">Add</button>
        </div>
    </div>
  </div>
</div>
  </form>
<!--end modal location-->
</header>