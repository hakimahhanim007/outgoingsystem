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
          <?php 
              require_once("include/connection.php");
              $id = mysqli_real_escape_string($conn,$_SESSION['admin_user']);
              $r = mysqli_query($conn,"SELECT * FROM admin_login where id = '$id'") or die (mysqli_error($con));
              $row = mysqli_fetch_array($r);
              $id=$row['admin_user'];
               
          ?>
        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

           <!-- Left -->
          <ul class="navbar-nav mr-auto">
           <li class="mr-auto" style="margin-top: 10px;"><strong>Welcome</strong> 
           <?php echo lcfirst(htmlentities($id)); ?> &nbsp;
            <!-- call user name on left top navbar-->
         
            </li>
         
          </ul>

          <!-- display User Name on top right navbar , call from database-->

         
           

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
           
            <li class="nav-item"><a href="notification.php" class="nav-link border border-light rounded waves-effect">
               <i class="bi bi-bell"></i>Notification</a></li>

          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->
 <div id="loader"></div>
 
     <?php include_once 'sidebar.php'?>