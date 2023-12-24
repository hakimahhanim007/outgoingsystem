<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
  if(!isset($_SESSION["admin_user"])){
      header("location:adminlogin.php");

  } else{
      $uname = $_SESSION['admin_user'];
  }
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>admin - outgoing</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">

 

  <style>
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

  
  <?php include_once 'admin_navigation.php'?> 


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
            <span>Dashboard</span>
          </h4>
        </div>
      </div>

      <!-- Heading -->

       <div class="row">
        <div class="col-xl-3 col-md-6">
          <div class="card bg-primary text-white mb-4">
            <div class="card-body">
              Total request
              
              
              <?php 
                  $dash_category_query = "SELECT * FROM upload_files";
                  $dash_category_query_run = mysqli_query($conn, $dash_category_query);
                  if ($category_total = mysqli_num_rows($dash_category_query_run)) {
                    echo '<h4 class="mb-0">'.$category_total.'</h4>';
                  }
                  else{
                    echo '<h4 class="mb-0">No Data</h4>';
                  }
              ?>
              
            </div>
            <div class="card-footer d-flex align_items-center justify-content-between">
            <a class="small text-white stretched-link" href="view_request.php">View Details</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>            
            </div>
        </div>
      </div>

        <div class="col-xl-3 col-md-6">
          <div class="card bg-warning text-white mb-4">
            <div class="card-body">
            
            Total pending
            
            pending to update scanned document
              <?php 
                    $dash_category_query = "SELECT * FROM login_user";
                    $dash_category_query_run = mysqli_query($conn, $dash_category_query);
                    if ($category_total = mysqli_num_rows($dash_category_query_run)) {
                      echo '<h4 class="mb-0">'.$category_total.'</h4>';
                    }
                    else{
                      echo '<h4 class="mb-0">No Data</h4>';
                    }
                ?> 
            </div>
            <div class="card-footer d-flex align_items-center justify-content-between">
              <a class="small text-white stretched-link" href="view_pending.php">View Details</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>            
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6">
          <div class="card bg-success text-white mb-4">
            <div class="card-body">Total Completed
            /* view completed tasks
            <?php 
                  $dash_category_query = "SELECT * FROM history_log";
                  $dash_category_query_run = mysqli_query($conn, $dash_category_query);
                  if ($category_total = mysqli_num_rows($dash_category_query_run)) {
                    echo '<h4 class="mb-0">'.$category_total.'</h4>';
                  }
                  else{
                    echo '<h4 class="mb-0">No Data</h4>';
                  }
              ?> 
              */
            </div>
            <div class="card-footer d-flex align_items-center justify-content-between">
              <a class="small text-white stretched-link" href="view_completed.php">View Details</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>            
            </div>
        </div>
      </div>

        
             


      <!--Grid row-->
      <div class="row wow fadeIn">
        <!--Grid column-->
        <div class="col-md-12 mb-2">
          <!--Card-->
          <div class="card">
            <!--Card content-->
                <div class="card-body">
                  
                    <CENTER><h3 class="page-header">New Memo/Letter</h3></CENTER> 
                
                 <!-- <canvas id="myChart"></canvas> -->

             
                <table id="dtable" class="table table-striped">
                  <thead>
                      <th>No.</th>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Department</th>
                      <th>Position</th>
                      <th>Action</th>
                  </thead> 
            <tbody>              
              <?php 
              include 'include/connection.php';
              $results = mysqli_query($db, "SELECT * FROM login_user");
              $cnt=1;
              while ($row = mysqli_fetch_array($results)) { 
              ?>
                <tr>
                    <td><?php echo $cnt;?>.</td>
                    <td><?php echo $row['staffid']; ?></td>
                    <td><?php echo  $row['name']; ?></td>
                    <td><?php echo $row['email_address']; ?></td>
                    <td><?php echo $row['department']; ?></td>
                    <td><?php echo $row['position']; ?></td>
                    <td>
                      <a href="user_update.php?id=<?php echo $row['id']; ?>" title="Edit"><i class="fas fa-user-edit"></i></a>
                      <a onclick='javascript:confirmationDelete($(this));return false;' href="delete_user.php?id=<?php echo htmlentities($row['id']); ?>"><i class='far fa-trash-alt' title="Delete"></i></a>
                    </td> 
                </tr>             
                <?php  
                     $cnt=$cnt+1;
                         } ?>
            </tbody>
   </table>
    <hr></div>

            </div>
          </div>
          <!--/.Card-->
        </div>
        <!--Grid column-->

        
    <!--Copyright-->
    <div class="footer-copyright py-3">
    <p>&copy; Copyright <?php echo date('Y');?> THB Maintenance Sdn. Bhd.</p>
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
   <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>
  <!-- Charts -->

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
