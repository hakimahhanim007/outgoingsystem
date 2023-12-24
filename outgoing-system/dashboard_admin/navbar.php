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
           <li class="mr-auto" style="margin-top: 10px;"><strong>Welcome</strong> 
            <!-- call user name on right top navbar-->
           <?php echo "kim"; ?>
            </li>
         
          </ul>

          <!-- display User Name on top right navbar , call from database-->

         
           

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
           
            <li class="nav-item"><a href="logout.php" class="nav-link border border-light rounded waves-effect">
               <i class="far fa-user-circle"></i>Notification</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->
 <div id="loader"></div>
 
     <?php include_once 'sidebar.php'?>