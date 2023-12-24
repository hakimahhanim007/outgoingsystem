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
            <span>Create letter</span>
          </h4>
        </div>
      </div>

        
            <div class="card mb-4 wow fadeIn mt-5">

                   <div class="card-body justify-content-between">


                        
                        <form action="user_createletterdb.php" method="post">
                           
                            
                             <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label data-error="wrong" data-success="right" for="title" class="form-label">letter Title</label>
                                 <input type="text" class="form-control" id="title" name="letter_title" required>
                            </div>
                                
                                <div class="col-md-6 mb-3">
                                  <label data-error="wrong" data-success="right" for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="letter_date" required>
                                 
                              </div>
                            </div>

                             <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label  data-error="wrong" data-success="right" for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="letter_email" required>
                                </div>
                                
                              <div class="col-md-6 mb-3">
                                    <label  data-error="wrong" data-success="right"  for="from" class="form-label">Reference (THBM/HQ-HR/TM/M/2024-001)</label>
                                    <input type="text" class="form-control" id="ref" name="letter_ref" required placeholder="eg: TM">
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label data-error="wrong" data-success="right" class="form-label">From</label>
                                    <select class="form-select" name="letter_from" required >
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

                                <div class="col-md-6 mb-3">
                                    <label  data-error="wrong" data-success="right" for="from" class="form-label">To</label>
                                    <input type="text" class="form-control" id="to" name="letter_to" required>
                                </div>
                            </div>
                           

                            <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="privateAndConfidential" name="privateAndConfidential">
                            <label class="form-check-label" for="privateAndConfidential">Private and Confidential</label>
                        </div>
                            
                            <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-primary" name="submitletter">Submit</button>
                           </div>

                        </form>
                      </div>
          </div>
      </div>
</body>
   