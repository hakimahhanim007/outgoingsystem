<!DOCTYPE html>
<html lang="en">
<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['admin_user'])) {
header('Location: index.html');
}

?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>admin - e-archive</title>
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
                //"destroy":true;
            });
  })
  </script>

  <style>
    select[multiple], select[size] {
    height: auto;
    width: 20px;
    }
    .pull-right {
    float: right;
    margin: 2px !important;
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
          <!-- Left -->
          <ul class="navbar-nav mr-auto"></ul>
            <?php 
              require_once("include/connection.php");
              $id = mysqli_real_escape_string($conn,$_SESSION['admin_user']);
              $r = mysqli_query($conn,"SELECT * FROM admin_login where id = '$id'") or die (mysqli_error($con));
              $row = mysqli_fetch_array($r);
              $id=$row['admin_user'];
            ?>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
                <li style="margin-top: 10px;"><strong>Welcome</strong></font> <?php echo lcfirst(htmlentities($id)); ?>&nbsp;</li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link border border-light rounded waves-effect">
               <i class="far fa-user-circle"></i>SignOut</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->

    <?php include_once 'side_navigation.php' ?> <!-- side navigation & module pop up add user. add admin, add location -->
    
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
            <a href="dashboard.php">Home Page</a>
            <span>/</span>
            <span>Add Document</span>
          </h4>
        </div>
      </div>
      <!-- Heading -->
      <div class="">
    <!--   <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalRegisterForm">Add File</button> -->
    <a href="add_file.php"><button type="button" class="btn btn-success"><i class="fas fa-file-medical"></i>  Add File</button></a>
    </div>
  
<hr>
 
 <div class="col-md-12">

 <table id="dtable" class = "table table-striped">
     <thead>
        <th>File No</th>
        <th>Filename</th>
        <th>File Date</th>
        <th>Uploader</th>
        <th>Status</th>   
        <th>Date/Time Upload</th>
        <th>Location</th>
        <th>Downloads</th>
        <th>Action</th>
    </thead>
<tbody>
    <tr>
        <?php 
        require_once("include/connection.php");
        $query = mysqli_query($conn,"SELECT DISTINCT ID,NAME,SIZE,EMAIL,ADMIN_STATUS,TIMERS,DOWNLOAD,LOCATION,FILENO,MONTH FROM upload_files group by NAME DESC") or die (mysqli_error($con));
        while($file=mysqli_fetch_array($query)){
          $id =  $file['ID'];
          $name =  $file['NAME'];
          $uploads =  $file['EMAIL'];
          $status =  $file['ADMIN_STATUS'];
          $time =  $file['TIMERS'];
          $location = $file['LOCATION'];
          $download =  $file['DOWNLOAD'];
          $fileno = $file['FILENO'];
          $month = $file['MONTH'];
        ?>
          <td><?php echo $fileno;?></td>
          <td width="20%"><?php echo  $name; ?></td>
          <td><?php echo $month ?></td>
          <td><?php echo $uploads; ?></td>
          <td><?php echo $status; ?></td>
          <td><?php echo $time; ?></td>
          <td><?php echo $location; ?></td>
          <td><?php echo $download; ?></td>
          <td>
            <a href='downloads.php?file_id=<?php echo $id; ?>'  class="btn btn-sm btn-outline-primary"><i class="fa fa-download"></i></a>
            <a href="../uploads/<?php echo  $name; ?> " target="_blank" class="btn btn-sm btn-outline-warning"><i class="fa fa-eye"></i></a>
            <a href='delete.php?ID=<?php echo $id; ?>'  class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>
         </td>
    </tr>
<?php } ?>
</tbody>
   </table>
    </div>  
    <!--Copyright-->
    <hr></div>
    <div class="footer-copyright py-3">
     <p>&copy; Copyright <?php echo date('Y');?> THB Maintenance Sdn. Bhd.</p>
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
