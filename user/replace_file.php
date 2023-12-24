<!DOCTYPE html>
<html lang="en">
<?php
    // Inialize session
    session_start();

    if (!isset($_SESSION['email_address'])) {
         header('Location: index.html');
    }
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>e-archive</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
  <script src="js/jquery-1.8.3.min.js"></script>
  <link rel="stylesheet" type="text/css" href="medias/css/dataTable.css" />
  <script src="medias/js/jquery.dataTables.js" type="text/javascript"></script>
    <!-- end table-->
  <script type="text/javascript" charset="utf-8">
      $(document).ready(function(){
          $('#dtable').dataTable({
                    "aLengthMenu": [[5, 10, 15, 25, 50, 100 , -1], [5, 10, 15, 25, 50, 100, "All"]],
                    "iDisplayLength": 10
                });
      })
  </script>

  <style>
    form i {
    margin-left: -30px;
    cursor: pointer;
    }
    select[multiple], select[size] {
    height: auto;
    width: 30px;
    }
    .pull-right {
    float: right;
    margin: 3px !important;
    }
    .map-container{
    overflow:hidden;
    padding-bottom:56.25%;
    position:relative;
    height:0;
    }
    .map-container iframe{
    left:0;
    top:0;
    height:100%;
    width:100%;
    position:absolute;
    }
    input[type=file] {
    border: 2px dotted #999;
    border-radius: 10px;
    margin-left: 9px;
    width: 231px!important;
    }
    #loader{
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('img/lg.flip-book-loader.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: 1;
    }
    .dropdown {
    width: 30rem;
    }
    .dropdown-select {
    padding: 1.5rem;
    border-radius: 4px;
    background-color: white;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 1.0rem;
    }

}
  </style>
    <script src="jquery.min.js"></script>
    <script type="text/javascript">
      $(window).on('load', function(){
        //you remove this timeout
        setTimeout(function(){
              $('#loader').fadeOut('slow');  
          });
          //remove the timeout
          //$('#loader').fadeOut('slow'); 
      });
    </script>
</head>

<body class="grey lighten-3">
  <!--Main Navigation-->
  <header>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="#">
          <strong class="blue-text"></strong>
        </a>
        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
          </ul>
              <?php 
                  require_once("include/connection.php");
                  $id = mysqli_real_escape_string($conn,$_SESSION['email_address']);
                  $r = mysqli_query($conn,"SELECT * FROM login_user where id = '$id'") or die (mysqli_error($con));
                  $row = mysqli_fetch_array($r);
                  $id=$row['email_address'];
                  $user_status=$row['user_status'];
                  $name_update=$row['name'];
              ?>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
            <li style="margin-top: 10px;"><strong>Welcome</strong></font> <?php echo lcfirst(htmlentities($id));?>&nbsp;</li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link border border-light rounded waves-effect"><i class="far fa-user-circle"></i>Sign out</a>
            </li>
          </ul>

        </div>

      </div>
    </nav>
    <!-- Navbar -->
    <?php include 'side_navigation.php' ?>

  </header>
  <!--Main Navigation-->
 <div id="loader"></div>
  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">
        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">
          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="view_userfile.php">View File</a>
            <span>/</span>
            <span>Replace File</span>
          </h4>
        </div>

      <hr>
    <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Replace File Form</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body mx-2"></div>
        </div>
      </div>
    </div>

<center>
<div class="text-center col-md-8">
<div class="card">
<h5 class="card-header info-color white-text text-center py-4"><strong>Replace File</strong></h5>
  <div class="card-body px-lg-5 pt-0">
    <?php 
        include 'include/connection.php';
        $query = 'SELECT upload_files.id, upload_files.name, upload_files.size, upload_files.month, upload_files.email, upload_files.admin_status, upload_files.timers, upload_files.download, upload_files.fileno, upload_files.location_address, upload_files.branch, upload_files.file_department, location.id_location, location.location_address, location.branch FROM upload_files JOIN location ON upload_files.location_address = location.id_location WHERE id ='.$_GET['id'];
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        while($file = mysqli_fetch_array($result)){
            $id =  $file['id'];
            $name =  $file['name']; // nama file
            $size =  $file['size']; // size file
            $month = $file['month'];
            $email =  $file['email']; // nama yg upload file
            $uploads =  $file['admin_status']; // siapa yang upload file admin/employee
            $timers =  $file['timers']; //masa file diupload
            $fileno = $file['fileno']; // nombor file
            $location_address = $file['location_address'];
            $id_location = $file['id_location'];
            $file_department = $file['file_department'];
        }

        $id = $_GET['id'];
    ?>
    <div class="container">
      <div class="row"><br><br>
        <form action="replace_file1.php" method="post" enctype="multipart/form-data" >
          <div class="col-md-11">
            <div class="form-floating mb-3">
              <input type="hidden" name= "email" value="<?php echo ucwords(htmlentities($name_update));?>" class="form-control" readonly>
              <input type="hidden" name="id" value="<?php echo $id;?>">
            </div>
            <div class="form-floating mb-3">
              <!--<input type="hidden" name="email" value="<?php echo $email;?>">-->
            </div>

            <!-- file date-->
            <div class="form-floating mb-3">
              <input readonly type="hidden" name="month" class="form-control" value="<?php echo $month;?>">
              <label for="month">File Date</label>
            </div>
            <!-- display file location-->
            <div class="form-floating mb-3">
              <input readonly type="hidden" name="location_address" class="form-control" value="<?php echo $id_location;?>"></input>
              <label for="location_address">Location</label>
            </div>
            <!-- display file department-->
            <div class="form-floating mb-3">
              <input readonly type="hidden" name="file_department" class="form-control" value="<?php echo $file_department;?>"></input>
              <label for="file_department">File Department</label>
            </div>
             <!-- display file no-->
            <div class="form-floating mb-3">
              <input readonly type="text" name="fileno" class="form-control" value="<?php echo $fileno;?>">
              <label for="fileno">File No</label>
            </div>

            <!-- display file name-->
            <div class="form-floating mb-3">
              <input readonly type="hidden" name="name" class="form-control" value="<?php echo $name;?>">
              <!--<label for="fileno">File Name</label>-->
            </div>

            <!-- view file name -->
            <div class="form-floating mb-3">
              <!--<label for="name">View File:</label>-->
                <a href="../uploads/<?php echo $name;?> " target="_blank" title="View" >View: <?php echo $name;?>
                </a> 
            </div>

            <!-- untuk update file -->
            <label for="name" style="text-align: left;">Replace File:</label> 
            <div class="form-floating mb-3"> 
              <input type="file" name="myfile" value="<?php echo $fileno;?>">
            </div>

            <div class="form-floating mb-3">
              <input type="hidden" name="admin_status" value="<?php echo $uploads; ?>">
            </div>

            <div class="mb-3">      
              <button name="update" type="submit" class="btn btn-primary d-grid gap-2 d-md-flex justify-content-md-end">Update</button>
            </div>            
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Material form login -->
   <Br><br>
</div></div>
</center>
        
    <!--Copyright-->
    <hr></div>
    <div class="footer-copyright py-3">
       <p>&copy; Copyright <?php echo date('Y');?> e-archive THB Maintenance Sdn. Bhd.</p>
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

<!-- Card -->
  <!-- /Start your project here-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css"/>   
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/1.0.3/css/dataTables.responsive.css">
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/1.0.3/js/dataTables.responsive.js"></script>

</body>

</html>
<script type="text/javascript">
   $("#Alert").on("click", function () {
          
          // userad();
          uservalidate();
          userfile();
   
         if (uservalidate() === true && userfile() === true) {
   
         };
   
   
   });
   
   function uservalidate() {
   if ($('#categ').val() == '') { 
       $('#categ').css('border-color', '#dc3545');
    return false;
     } else {
      $('#categ').css('border-color', '#dc3545'); 
       return true;
   }
   
   };

  function userfile() {
   if ($('#file').val() == '') { 
       $('#file').css('border-color', '#dc3545');
    return false;
     } else {
      $('#file').css('border-color', '#dc3545'); 
       return true;
   }
   
   };
  function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
   
</script>