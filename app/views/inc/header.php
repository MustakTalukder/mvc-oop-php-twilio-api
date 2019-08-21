<?php
if(!isset($_SESSION)){
  session_start();
}

?>


<head>
    <!-- Required meta tags -->
    <base href="http://xyz.mvc/">
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="assets/parsley.css" >

    <title>hello</title>

    <div>


    
    <nav class="navbar navbar-dark bg-dark justify-content-center">
  <!-- Navbar content -->

    
          <ul class="nav ">
            <li class="nav-item ">
              <a class="nav-link text-white" href="/app/views/home.php">Home</a>
            </li>

            <li class="nav-item ">
              <a class="nav-link text-white" href="/app/views/twilio_auth.php">Twilio Auth</a>
            </li>

            <li class="nav-item ">
              <a class="nav-link text-white" href="/app/views/twilio.php">Search</a>
            </li>

            <li class="nav-item ">
              <a class="nav-link text-white" href="app/controllers/twilio_controller.php?user=number" name="number"  >Phone Number List</a>
            </li>

          <?php  if(!isset($_SESSION['email'])){ ?>

                <li class="nav-item">
                  <a class="nav-link text-white" href="/app/views/login.php"> Login</a>
                </li>

          <?php } else{ ?>

            <li class="nav-item">
                <a class="nav-link text-white" href="/app/controllers/auth_controller.php?user=logout" name="logout"  > Logout</a>
              </li>

          <?php } ?>


          </ul>

        </nav>




    </div>

  </head>

