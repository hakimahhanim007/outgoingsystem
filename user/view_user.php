<!DOCTYPE html>
<html lang="en">
<?php

        // Inialize session
        session_start();
        error_reporting(0);
        require_once("include/connection.php");
        $id = mysqli_real_escape_string($conn,$_GET['id']);

        // Check, if username session is NOT set then this page will jump to login page
        if (!isset($_SESSION['email_address'])) {
        header('Location: index.html');
        }
        else{
        $uname=$_SESSION['email_address'];
        //  $desired_dir="user_data/$uname/";
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
            ?>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
            <li style="margin-top: 10px;"><strong>Welcome</strong></font> <?php echo lcfirst(htmlentities($id)); ?>&nbsp;</li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link border border-light rounded waves-effect">
               <i class="far fa-user-circle"></i>Sign out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->

   <!--<miss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span> -->

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
            <span>View User</span>
          </h4>
        </div>
      </div>

<div class="">
  
 <table id="dtable" class = "table table-striped">


          <thead>
            <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Department</th>
              <th>Position</th>
              
          </thead><br /><br />
    <tbody>
     <?php
         require_once("include/connection.php");

            $query="SELECT * FROM login_user";
            $result=mysqli_query($conn,$query);
            while($rs=mysqli_fetch_array($result)){
               $id = $rs['id'];
               $fname = $rs['name'];
               $admin = $rs['email_address'];
               $pass = $rs['user_password'];
               $status = $rs['user_status'];
               $position = $rs['position'];
               $department = $rs['department'];
           ?> 
                
           <tr>
                <td width=''><?php echo $id; ?></td>
               <td width=''><?php echo  $fname; ?></td>
               <td align=''><?php echo $admin; ?></td>
               <td align=''><?php echo $department; ?></td>
               <td align=''><?php echo $position; ?></td>
               <!--<td align=''>
                <a href="#modalRegisterFormss?id=<?php echo $id;?>" ><i class="fas fa-user-edit" data-toggle="modal" data-target="#modalRegisterFormss?id=<?php echo $id;?>"></i></a>  
                <a href="delete_user.php?id=<?php echo htmlentities($rs['id']); ?>"><i class='far fa-trash-alt'></i></a>
               </td> -->
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
   


<!--modal for edit user (employee) --->
<div class="modal fade" id="modalRegisterFormss" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
    <?php 

        require_once("include/connection.php");
          
        $q = mysqli_query($conn,"SELECT * FROM login_user WHERE id = '$id'") or die (mysqli_error($conn));
        $rs1 = mysqli_fetch_array($q);
         
                       $id1 = $rs1['id'];
                       $fname1 = $rs1['name'];
                       $admin1 = $rs1['email_address'];
                       $pass1 = $rs1['user_password'];
                       $status = $rs1['user_status'];
                       $staffid = $rs1['staffid'];
                       $department = $rs1['department'];
                       $position = $rs1['position'];
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
           <div class="mb-3">
            <input type="" class="form-control" name="id" value="<?php echo $id1;?>"><br>
        </div>    
        <div class="mb-3">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">Name</label>
          <input type="text" name="name" value="<?php echo $fname1;?>" class="form-control"> 
        </div>
        <div class="mb-3">
          <i class="fa fa-address-card prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">Staff ID</label>
          <input type="text" name="staffid" value="<?php echo $staffid;?>" class="form-control"> 
        </div>
        <div class="mb-3">
          <i class="fa fa-id-badge prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">Position</label>
          <input type="text" name="position" value="<?php echo $position;?>" class="form-control"> 
        </div>
        <div class="mb-3">
          <!--<i class="fa fa-id-badge prefix grey-text"></i>-->
          <i class="fa fa-id-badge prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">Department</label>
          <select class="form-select" name="department">
            <option value="">Please select department</option>
            <option value="Account">Account</option>
            <option value="Contract">Contract</option>
            <option value="Engineering">Engineering</option>
            <option value="HR">HR</option>
            <option value="MIS">MIS</option>
            <option value="Operation">Operation</option>
            <option value="SFU">SFU</option>
          </select>
        </div>
        <div class="mb-3">
          <i class="fas fa-envelope prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">Email</label>
          <input type="email" name="email_address" value="<?php echo $admin1;?>" class="form-control validate">  
        </div>

        <div class="mb-3">
          <i class="fas fa-lock prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">Password</label>
          <input type="password" name="user_password" value="<?php echo $pass1?>" class="form-control validate">
        </div>
       <div class="mb-3">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" class="form-label">User Status</label>
          <input type="text" name="status" value = "Employee" class="form-control validate" readonly=""> 
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-primary" name="edit">UPDATE</button>

      </div>
    </div>
  </div>
</div>
</form>

  <!--modal--->
 <?php 

 require_once("include/connection.php");

  
 if(isset($_POST['edit'])){

    mysqli_query($conn,"UPDATE login_user SET '$user_name', '$email_address', '$user_password', '$staffid', '$department', '$position' WHERE id='$id'") or die (mysqli_error($conn));
  
         $user_name = $_POST['name'];
         $email_address = $_POST['email_address'];
         $user_password = password_hash($_POST['user_password'], PASSWORD_DEFAULT, array('cost' => 12));
         $staffid = $_POST['staffid'];
         $department = $_POST['department'];
         $position = $_POST['position'];

      
      echo "<script type = 'text/javascript'>alert('Success Edit User/Employee!');document.location='view_user.php'</script>";

  }

  if(isset($_GET['edit'])){
         

      mysqli_query($conn,"UPDATE login_user WHERE ") or die (mysqli_error($conn));
  
      echo "<script type = 'text/javascript'>alert('Success Edit User/Employee!');document.location='view_user.php'</script>";

  }

?>
</html>
