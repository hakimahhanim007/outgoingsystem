<!DOCTYPE html>
<html lang="en">
   <?php
  session_start();
  if(!isset($_SESSION["admin_user"])){
      header("location:adminlogin.html");

  } else{
      $uname = $_SESSION['admin_user'];
  }
  ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>View Admin - OUTGOING Admin</title>
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

  <!--navbar-->
      <?php include_once 'navbar.php' ?> 
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
                <span>View Admin</span>
              </h4>
          </div>
      </div>

    <div class="card mb-4 wow fadeIn mt-2">
    <div class="card-body d-sm-flex justify-content-between">
    <div class="table table-striped table-hover">
    <table id="dtable" class="table  table-bordered">
        <thead class="thead-light"> 
                     <th>No.</th>
                     <th>Name</th>
                    <th>Admin Email</th>
                    <th>Admin Position</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead><br /><br />
                <tbody>
                <?php
                    include 'include/connection.php';
                    $results = mysqli_query($db, "SELECT * FROM admin_login");
                    $cnt=1;
                    while ($row = mysqli_fetch_array($results)) { 
                ?>       
                 <tr>
                    <td><?php echo $cnt;?>.</td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['admin_user']; ?></td>
                    <td><?php echo $row['admin_position']; ?></td>
                    <td><?php echo $row['admin_status']; ?></td>
                    <td>
                      <a href="admin_update.php?id=<?php echo $row['id']?>" title="Edit">
                      <i class="fas fa-user-edit"></i></a>
                      <a onclick='javascript:confirmationDelete($(this));return false;' href="delete_admin.php?id=<?php echo htmlentities($row['id']); ?>" title="Delete"><i class='far fa-trash-alt'></i></a>
                    </td>
                 </tr>
             
          <?php  
             $cnt=$cnt+1;
           } ?>
             </tbody>
        </table>
        </div></div>
        </div>
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

<script type="text/javascript">
  function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this admin?');
   if(conf)
      window.location=anchor.attr("href");
}
</script>

