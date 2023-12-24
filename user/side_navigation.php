<!-- Sidebar -->
    <div class="sidebar-fixed position-fixed">

      <a class="logo-wrapper waves-effect">
        <img src="img/e-archive3.png" width="auto" height="auto" class="img-fluid" alt="">
      </a> 

      <div class="list-group list-group-flush">
        <a href="dashboard.php" class="list-group-item active waves-effect">
          <i class="fas fa-chart-pie"></i> &nbsp; Dashboard</a>

        <a href="user_update.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-user"></i>&nbsp; Edit Profile</a>
       <!--  <a href="#" class="list-group-item list-group-item-action waves-effect" data-toggle="modal" data-target="#modalRegisterForm3">
          <i class="fas fa-plus-circle"></i>&nbsp;Add Location</a> -->
        <a href="view_location.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-map-marker"></i>&nbsp; View Location</a>
       <!--  <a href="add_file.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-file-medical"></i>&nbsp;Add Document</a> -->
        <a href="view_userfile.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-file-medical"></i>&nbsp; View File</a>

        <a href="report.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-file-alt"></i>&nbsp; Report</a>


          
        <!--<button class="list-group-item list-group-item-action waves-effect dropdown-btn"><i class="fas fa-folder-open"></i>&nbsp;View File <i class="fa fa-caret-down"></i></button>
        <div class="dropdown-container">
          <ul>
            <a href="view_file_account.php" class="list-group-item">Account</a>
            <a href="view_file_contract.php" class="list-group-item">Contract</a>
            <a href="view_file_engineering.php" class="list-group-item">Engineering</a>
            <a href="view_file_HR.php" class="list-group-item">HR</a>
            <a href="view_file_MIS.php" class="list-group-item">MIS</a>
            <a href="view_file_operation.php" class="list-group-item">Operation</a>
            <a href="view_file_SFU.php" class="list-group-item">SFU</a>
          </ul>
        </div>-->
      </div>

    </div>
    <!-- Sidebar -->

  </header>
 
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
            <div class="mb-5">
              <i class="fas fa-map-marker prefix grey-text"></i>
              <label data-error="wrong" data-success="right">Location Address</label>
              <input required type="text" id="location_address" name="location_address" class="form-control">  
            </div>
            <div class="mb-3">
                <i class="fa fa-id-badge prefix grey-text"></i>
                <label data-error="wrong" data-success="right" class="form-label">Branch</label>
                <select  required class="form-select" name="branch">
                  <option value="">Please select branch</option>
                  <option value="THBM HQ">THBM HQ</option>
                  <option value="THBM Alor Setar">THBM Alor Setar</option>
                  <option value="THBM Tandop">THBM Tandop</option>
                  <option value="THBM Sungai Petani">THBM Sungai Petani</option>
                  <option value="THBM Langkawi">THBM Langkawi</option>
                  <option value="THBM Kangar">THBM Kangar</option>
                  <option value="THBM Kulim">THBM Kulim</option>
                  <option value="THBM Balik Pulau">THBM Balik Pulau</option>
                </select>
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

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>