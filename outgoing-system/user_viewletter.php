<!DOCTYPE html>
<html lang="en">

<?php

// Inialize session
session_start();

if (!isset($_SESSION['email_address'])) {
     header('Location: login.html');
 } else{
      $uname = $_SESSION['email_address'];
  }

?>
 

<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Outgoing</title>
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
      });
    </script> 
</head>

<body class="bg-light" >


   <!--Navigation Bar-->
   <?php include_once 'user_navbar.php'?>

     <!-- Main layout-->
    <main class="pt-5 mx-lg-5" >
    <div class= container-fluid mt-5>

    <!-- Heading -->
      <div class="card mb-4 wow fadeIn mt-5">
      <div class="card-body d-sm-flex justify-content-between">
     
      <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="user_dashboard.php"> Dashboard</a>
            <span>/</span>
            <span>View Letter</span>
          </h4>
        </div>
      </div>

      


<div class="card mb-4 wow fadeIn mt-5">
<div class="card-body d-sm-flex justify-content-between">
<div class="table table-striped table-hover">
    <table id="dtable" class="table  table-bordered">
        <thead class="thead-light"> 
            <tr>
                <th>No.</th>
                <th>Date</th>
                <th>Type</th>
                <th>To</th>
                <th>From</th>
                <th>Title</th>
                <th>Reference Number</th>
                
            </tr>
        </thead><br></br>
        
        <tbody>
        
        <?php 
            include 'include/connection.php';
            $results = mysqli_query($db, "SELECT * FROM summary where type = 'L'");
            $cnt=1;
            while ($row = mysqli_fetch_array($results)) { 


        ?>
       
        <tr>
             <td><?php echo $cnt;?>.</td>
             <td><?php echo $row['date']; ?></td>
             <td><?php echo $row['type']; ?></td>
             <td><?php echo $row['to_person']; ?></td>
             <td><?php echo $row['from_person']; ?></td>
             <td><?php echo $row['title']; ?></td>

             <td><?php echo $row['ref_num']; ?></td>
            

             
             </tr>
             <?php
             $cnt=$cnt+1;
            }?>
           
        </tbody>
    </table>
</div>
 </div >
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
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css"/>   
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/1.0.3/css/dataTables.responsive.css">
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/1.0.3/js/dataTables.responsive.js"></script>


 
</body>
</html>



