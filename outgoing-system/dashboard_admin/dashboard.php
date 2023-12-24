<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
  if(!isset($_SESSION["admin_user"])){
      header("location:index.html");

  } else{
      $uname = $_SESSION['admin_user'];
  }
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>admin - e-archive</title>
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
              Total File
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
            <div class="card-footer d-flex align_items-center justify-content-between"><a class="small text-white stretched-link" href="view_userfile.php">View Details</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>            
            </div>
        </div>
      </div>

        <div class="col-xl-3 col-md-6">
          <div class="card bg-warning text-white mb-4">
            <div class="card-body">Total User
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
              <a class="small text-white stretched-link" href="view_user.php">View Details</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>            
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6">
          <div class="card bg-success text-white mb-4">
            <div class="card-body">Total Login
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
            </div>
            <div class="card-footer d-flex align_items-center justify-content-between">
              <a class="small text-white stretched-link" href="user_log.php">View Details</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>            
            </div>
        </div>
      </div>

        <div class="col-xl-3 col-md-6">
          <div class="card bg-danger text-white mb-4">
            <div class="card-body">Total Location
            <?php 
                  $dash_category_query = "SELECT * FROM location";
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
              <a class="small text-white stretched-link" href="view_location.php">View Details</a>
            <div class="small text-white">
              <i class="fas fa-angle-right"></i>
            </div>            
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
                  <?php
                    // $con  = mysqli_connect("localhost","root","","barchart");
                    //  if (!$con) {
                    //      # code...
                    //     echo "Problem in database connection! Contact administrator!" . mysqli_error();
                    //  }else{

                       require_once("include/connection.php");

                             $sql ="SELECT *,count(email_address) as count FROM history_log group by email_address;";
                             $result = mysqli_query($conn,$sql);
                             $chart_data="";
                             while ($row = mysqli_fetch_array($result)) { 
                     
                                $name[]  = $row['email_address']  ;
                                $counts[] = $row['count'];
                            }
                     
                    ?>
                <CENTER><h3 class="page-header">Count Logged of an Employee</h3></CENTER>  
              <canvas id="myChart"></canvas>
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
  <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>
  <!-- Charts -->
  <script>
    // Line
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
     data: {
            labels:<?php echo json_encode($name); ?>,
            datasets: [{
                      backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#6ae27e", "#dc69e2", "#687be2", "#e28868", "#6c68e2", "#ab68e2", "#e268b7"],
                      // hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"],
                data:<?php echo json_encode($counts); ?>,
            }]
        },
      options: {
          legend: {
            display: false
          },
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]

        }
      }
    });



    //pie
    var ctxP = document.getElementById("pieChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
      type: 'pie',
      data: {
        labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
        datasets: [{
          data: [300, 50, 100, 40, 120],
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
          hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        }]
      },
      options: {
        responsive: true,
        legend: false
      }
    });  
  </script>
</body>
</html>
