<!DOCTYPE html>
<html lang="en">
    <?php
    // include('Private_Dashboard/include/connection.php');
    session_start();
    if(!isset($_SESSION["email_address"])){
        header("location:../login.html");
    } 
    ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>e-archive</title>
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
          <ul class="navbar-nav mr-auto">
          <!--   <li class="nav-item active">
              <a class="nav-link waves-effect" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="#">About
                MDB</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="#">Free
                download</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="#">Free
                tutorials</a>
            </li> -->
          </ul>
           <?php 
              require_once("include/connection.php");
              $id = mysqli_real_escape_string($conn,$_SESSION['email_address']);
              $r = mysqli_query($conn,"SELECT * FROM login_user where id = '$id'") or die (mysqli_error($con));
              $row = mysqli_fetch_array($r);
              $id=$row['email_address'];
               // $fname=$row['fname'];
               // $lname=$row['lname'];
          ?>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
            <li style="margin-top: 10px;"><strong>Welcome</strong></font><?php echo ucwords(htmlentities($id)); ?></li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link border border-light rounded waves-effect">
               <i class="far fa-user-circle"></i>SignOut
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->

    <?php include_once 'side_navigation_user.php' ?> <!-- side navigation & module pop up add user. add admin, add location -->
    
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
                <a href="home2.php">Home Page</a>
                <span>/</span>
                <span>View Admin</span>
              </h4>

              <!-- <form class="d-flex justify-content-center">
           
                <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
                <button class="btn btn-primary btn-sm my-0 p" type="submit">
                  <i class="fas fa-search"></i>
                </button>

              </form> -->

        </div>
      </div>
<div class="">
  
 <table id="dtable" class = "table table-striped">
          <thead>
            <th>Filename</th>
            <th>FileSize</th>
            <th>Uploader</th>  
            <th>Status</th> 
            <th>Date/Time Upload</th>
            <th>Downloads</th>
            <th>Action</th>
          </thead><br /><br />
          <tbody>
          <?php 
          require_once("include/connection.php");
          $query = mysqli_query($conn,"SELECT ID,NAME,SIZE,EMAIL,ADMIN_STATUS,TIMERS,DOWNLOAD FROM upload_files group by NAME DESC") or die (mysqli_error($conn));
          while($file=mysqli_fetch_array($query)){
             $id =  $file['ID'];
             $name =  $file['NAME'];
             $size =  $file['SIZE'];
             $uploads =  $file['EMAIL'];
             $status =  $file['ADMIN_STATUS'];
             $time =  $file['TIMERS'];
             $download =  $file['DOWNLOAD'];
        
          ?>
    
           <tr>
              <td><?php echo  $name; ?></td>
              <td><?php echo floor($size / 1000) . ' KB'; ?></td>
              <td><?php echo $uploads; ?></td>
              <td><?php echo $status; ?></td>
              <td><?php echo $time; ?></td>
              <td><?php echo $download; ?></td>
              <td style="">
                <a href='downloads.php?file_id=<?php echo $id; ?>'><img src="img/698569-icon-57-document-download-128.png" width="30px" height="30px" title="Download File"></a> 
              </td>
           </tr>
       
    <?php  } ?>
       </tbody>
   </table>

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
  <!--modal--->






<div class="modal fade" id="modalRegisterFormsss" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
    <?php 
      require_once("include/connection.php");
        
      $q = mysqli_query($conn,"SELECT * FROM admin_login where id = '$id'") or die (mysqli_error($conn));
      $rs1 = mysqli_fetch_array($q);
       
                     $id1 = $rs1['id'];
                     $fname1 = $rs1['name'];
                     $admin1 = $rs1['admin_user'];
                     $admin_position = $rs1['admin_position'];
                     $pass1 = $rs1['admin_password'];
                     $status = $rs1['admin_status'];
    ?>

  <div class="modal-dialog" role="document">
    <form method="POST">
    
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold"><i class="fas fa-user-edit"></i> Edit User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body mx-3">
           <div class="md-form mb-5">
            <input type="hidden" class="form-control" name="id" value="<?php echo $id1;?>"><br>
        </div>
        <div class="mb-3">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">Admin Name</label>
          <input type="text" name="name" value="<?php echo $fname1;?>" class="form-control validate">
        </div>
        <div class="mb-3">
          <i class="fas fa-envelope prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">Admin Email</label>
          <input type="email" name="admin_user" value="<?php echo $admin1;?>" class="form-control validate"> 
        </div>
        <div class="mb-3">
          <i class="fas fa-envelope prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">Admin Position</label>
          <input type="text" name="admin_position" value="<?php echo $admin_position;?>" class="form-control validate"> 
        </div>
        <div class="mb-3">
          <i class="fas fa-lock prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">Password</label>
          <input type="password" name="admin_password" value="<?php echo $pass1;?>" class="form-control validate"> 
        </div>
          <div class="mb-3">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">User Status</label>
          <input type="text" name="status" value = "Employee" class="form-control validate" readonly>    
        </div>
      
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-primary" name="edit2">UPDATE</button>
      </div>
    </div>
  </div>
</div>
</form>

  <!--modal--->
 <?php 

 require_once("include/connection.php");

  
 if(isset($_POST['edit2'])){
         $user_name = mysqli_real_escape_string($conn,$_POST['name']);
         $admin_user = mysqli_real_escape_string($conn,$_POST['admin_user']);
         $admin_position = mysqli_real_escape_string($conn,$_POST['admin_position']); 
         $admin_password = password_hash($_POST['admin_password'], PASSWORD_DEFAULT, array('cost' => 12)); 
         
       //  $user_status = mysqli_real_escape_string($conn,$_POST['status']);

      mysqli_query($conn,"UPDATE `admin_login` SET `name` = '$user_name', `admin_user` = '$admin_user', `admin_password` = '$admin_password', `admin_position` = '$admin_position' WHERE id='$id'") or die (mysqli_error($conn));
  
      echo "<script type = 'text/javascript'>alert('Success Edit User/Employee!');document.location='view_admin.php'</script>";

}

?>

</html>