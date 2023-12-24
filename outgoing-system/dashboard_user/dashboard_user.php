<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>admin - outgoing</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
  rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">




	<style>
   
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
      });
    </script> 
</head>

<body class="bg-light" >


   <!--Navigation Bar-->
   <?php include_once 'navbar_user.php'?>

     <!-- Main layout-->
    <main class="pt-5 mx-lg-5" >
    <div class= container-fluid mt-5>
    <!-- Heading -->
      <div class="card mb-4 wow fadeIn mt-5">
      <div class="card-body d-sm-flex justify-content-between">
      <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="dash.php"> Home Page</a>
            <span>/</span>
            <span>Dashboard</span>
          </h4>
        </div>
      </div>

      <div class="row">
        <div class="col-xl-3 col-md-6">
          <div class="card bg-primary text-white mb-4">
            <div class="card-body">
              New 
             
              </div>
            <div class="card-footer d-flex align_items-center justify-content-between">
            <a class="small text-white stretched-link" href="new_task.php">View Details</a>
              <div class="small text-white">
              <i class="fas fa-angle-right"></i>
              </div>            
            </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6">
          <div class="card bg-warning text-white mb-4">
            <div class="card-body">
            Verified 
            </div>
            <div class="card-footer d-flex align_items-center justify-content-between">
            <a class="small text-white stretched-link" href="verified_task.php">View Details</a>
              <div class="small text-white">
              <i class="fas fa-angle-right"></i>
              </div>            
            </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6">
          <div class="card bg-success text-white mb-4">
            <div class="card-body">Completed</div>
            <div class="card-footer d-flex align_items-center justify-content-between">
              <a class="small text-white stretched-link" href="completed_task.php">View Details</a>
            <div class="small text-white">
              <i class="fas fa-angle-right"></i>
            </div>            
          </div>
        </div>        
      </div>

      
     <!-- table tasks-->

     <!--Grid row-->


<!-- Inside the <body> section, where you define your table -->
<div class="table table-striped table-hover">
    <table id="table" class="table  table-bordered">
        <thead class="thead-light"> <!-- Add dark background to header -->
            <tr>
                <th>No.</th>
                <th>Date</th>
                <th>Type</th>
                <th>To</th>
                <th>From</th>
                <th>Title</th>
                <th>Description</th>
                <th>Reference Number</th>
                <th>Remarks</th>
            </tr>
        </thead>
        
        <tbody>
       
           
        </tbody>
    </table>
</div>

           
          <!--Copyright-->
        <div class="footer-copyright py-3">
         <p>&copy; Copyright <?php echo date('Y');?> THB Maintenance Sdn. Bhd.</p>
        </div>
        <!--/.Copyright-->
        </footer>

      

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

 
</body>
</html>



