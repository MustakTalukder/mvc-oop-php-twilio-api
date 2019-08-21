
<html>

  <?php include_once('inc/header.php') ?>

  <body>

  
  
      <div class="row">
          <div class="col-6" style="margin: 50px auto" >
          <h2>Registration</h2>
          <hr>


          
              <form id="form" data-validate="parsley" action="/app/controllers/auth_controller.php" method="post" >
              <div class="form-group">
                  <label for="email">Email address</label>
                  <input name="email" type="email" value="" class="form-control" id="email_check" placeholder="Enter email" required data-parsley-type="email">
                
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required data-parsley-length="[3,8]">
              </div>

              <button type="submit" class="btn btn-primary" name="registration" >Sign Up</button>
              </form>
          </div>
      </div>
      
    



      <?php include_once('inc/footer.php') ?>
      
      <!-- <script>
          $('#form').parsley();
    
              $("#email_check").change(function(e) {
              //  alert("alsdf");

                e.preventDefault();

                var form = $(this);

                $.ajax({
                      type: "POST",
                      url: "<?php echo base_url('auth_controller/is_email_available')?>",
                      data: form.serialize(), 
                      datatype: 'json',
                      success: function(response)
                      {
                        response = JSON.parse(response);

                        // alert(response['status']);

                        // console.log(response);
                        

                        if(response['status'] == 'already_taken'){

                          $('#email_error').html("<p class='alert alert-danger'>email already taken</p>");
              
                          }else{
                            $('#email_error').empty();
                          
                          }

                          // if(data==true){
                          //   $('#email_error').append('Email alredy taken');
                          // } // show response from the php script.
                          // else{
                          //   $('#email_error').empty();
                          // }
                      }
                    });


                });
        </script> -->

  </body>


</html>