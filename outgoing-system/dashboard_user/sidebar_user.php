<!--sidebar-->

<div class="sidebar-fixed position-fixed">
<a class="logo-wrapper waves-effect" style="font-family: 'Roboto', sans-serif;font-weight: bold; font-size: 35px; text-align: left;">
        OUTGOING SYSTEM
      </a> 
      <!--list sidebar-->
      <div class ="list-group list-group-flush">

        <a href="dash.php" class="list-group-item active waves-effect">
        <i class="fas fa-chart-pie"></i> &nbsp;Dashboard</a>
        
        <a href="#" class="list-group-item list-group-item-action waves-effect"  data-toggle="modal" data-target="#modalRegisterForm">
        <i class="fas fa-user"></i>&nbsp;Add User</a>
        
        <a href="view_user.php" class="list-group-item list-group-item-action waves-effect">
              &nbsp;Create Memo</a>
            
         <a href="view_Memo.php" class="list-group-item list-group-item-action waves-effect">
              &nbsp;Create Letter</a>

         <a href="logout.php" class="list-group-item list-group-item-action waves-effect">
              &nbsp;Sign Out</a>

            


        <!--add user form-->
        
  </header>
      <!--Add admin-->
      <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <form action="create_Admin.php" method="POST">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold"><i class="fas fa-user-plus"></i> Add User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body mx-3">
               <div class="md-form mb-5">
            </div>
            <div class="mb-3">
              <i class="fas fa-user prefix grey-text"></i>
              <label data-error="wrong" data-success="right" class="form-label">Name</label>
              <input type="text" name="name" class="form-control validate" required=""> 
            </div>
            <div class="mb-3">
              <i class="fas fa-envelope prefix grey-text"></i>
              <label data-error="wrong" data-success="right" class="form-label">User Email</label>
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
</header>


