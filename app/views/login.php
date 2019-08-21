
<!doctype html>
<html lang="en">

  <?php include_once('inc/header.php') ?>

  <body>
 


    <div class="row">
      <div class="col-6" style="margin: 50px auto">
      
        <h2>Login</h2>
        <hr> 



          <div id="login_error" >
          
          </div>
          

        <form id="form_login" data-validate="parsley" action="/app/controllers/auth_controller.php/?controller=index" method="post" >
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input  name="email" type="email" class="form-control" id="email" placeholder="Enter email" required data-parsley-type="email"  >
        
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="Password" required data-parsley-length="[3,8]" >
            </div>

            <button type="submit" name="login" class="btn btn-primary">Log In</button>

            <p>Not a member? <a href="/app/views/registration.php">Create Account</a></p>
        </form>

      </div>

    </div>

    




    <?php include_once('inc/footer.php') ?>


  <script>

  $('#form_login').parsley();

  </script>


  </body>



</html>