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

      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<script>
  $(document).ready(function(){
      var today = new Date().toISOString().split('T')[0];
      $('#date').attr('min', today);
    // Function to handle radio button click
    $('input[type="radio"]').change(function(){
      if($(this).val() === ''){
        // If "Private and Confidential" is selected, set input value to "PNC" and disable the textbox
        $('#ref').val('');
        $('#ref').prop('disabled', true);
        $('#title').val('PnC');
        $('#title').prop('disabled', true);
        $('#to').val('PnC');
        $('#to').prop('disabled', true);
        $('#from').val('HR');
        $('#from').prop('disabled', true);
      } else {
        // If other radio buttons are selected, enable the textbox
        $('#ref').prop('disabled', false);
        $('#ref').val('');
        $('#title').prop('disabled', false);
        $('#title').val('');
        $('#to').prop('disabled', false);
        $('#to').val('');
        $('#from').prop('disabled', false);
        $('#from').val('');
      }
    });
  });
</script>

</head>

     
<body class="bg-light">
<?php include_once 'user_navbar.php'?>




 <!-- Main layout-->

<main class="pt-5 mx-lg-5" >
    <div class= container-fluid mt-5>

    

    <div class="card mb-4 wow fadeIn mt-5">
        <div class="card-body d-sm-flex justify-content-between">
     
      <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="user_dashboard.php"> Home Page</a>
            <span>/</span>
            <span>Create New</span>
          </h4>
        </div>
      </div>

        
            <div class="card mb-4 wow fadeIn mt-5">

                   <div class="card-body justify-content-between">
                                           
                        <form action="user_createnewdb.php" method="post">
                        <br></br>

                        <!-- Add radio buttons for selecting Letter or Memo -->
                            <div class="d-flex justify-content-start mb-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="new_type" id="letterRadio" value="L" required>
                                    <label class="form-check-label" for="letterRadio">Create New Letter</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="new_type" id="memoRadio" value="M" required>
                                    <label class="form-check-label" for="memoRadio">Create new Memo</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="new_type" id="pncRadio" value="" required>
                                    <label class="form-check-label" for="memoRadio">Private and Confidential</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label data-error="wrong" data-success="right" for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="new_title" required>
                                </div>
                            
                                                       
                                <div class="col-md-6 mb-3">

                                    <label data-error="wrong" data-success="right" class="form-label">From (Department)</label>
                                    <select class="form-select" id="from" name="new_from" required >
                                    <option value="">Please select department</option>
                                    <option value="Account">Account</option>
                                    <option value="Contract">Contract</option>
                                    <option value="Engineering">Engineering</option>
                                    <option value="HR">HR</option>
                                    <option value="MIS">MIS</option>
                                    <option value="Operation">Operation</option>
                                    <option value="SFU">SFU</option>
                                    <option value="QA">QA</option>
                                  </select>                                    
                                </div>
                             </div>


                             <div class="row">
                                  <div class="col-md-6 mb-3">
                                      <label data-error="wrong" data-success="right" for="date" class="form-label">Date</label>
                                      <input type="date" class="form-control" id="date" name="new_date" required>                              
                                  </div>                                                                                         
                                  <div class="col-md-6 mb-3">
                                       <label  data-error="wrong" data-success="right" for="to" class="form-label">Reciever</label>
                                       <input type="text" class="form-control" id="to" name="new_to" required placeholder="eg: JKR KULIM">
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col-md-6 mb-3">
                                       <label  data-error="wrong" data-success="right" for="email" class="form-label">Email</label>
                                       <input type="email" class="form-control" id="email" name="new_email" value="<?php echo lcfirst(htmlentities($id)); ?>" required>
                                  </div>
                                  <div class="col-md-6 mb-3">
                                       <label  data-error="wrong" data-success="right"  for="ref" class="form-label">Reciever Reference</label>
                                       <input type="text" class="form-control" id="ref" name="new_reference" required placeholder="eg: JKR">
                                  </div>
                            </div>      
                            
                            <div class="d-flex justify-content-center mt-4">                         
                           <button type="submit" class="btn btn-primary" name="submitnew">Submit</button>
                           </div>
                        </form>
                      </div>
          </div>
      </div>
</body>
   