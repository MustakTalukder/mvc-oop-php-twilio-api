<!doctype html>
<html lang="en">

  <?php include_once('inc/header.php') ?>

  <body>


  
    <div class="row">
        <div class="col-6" style="margin: 50px auto" >
        <h2>Twilio Auth</h2>

                                                                                                
        <hr>
            <form id="form" data-validate="parsley" action="/app/controllers/twilio_controller.php/?method=save_twilio_auth_data" method="post" >
            <div class="form-group">
                <label for="twilio_sid">Account sid</label>
                <input name="twilio_sid" type="text" class="form-control"  placeholder="Enter ACCOUNT SID" required >
              
            </div>
            <div class="form-group">
                <label for="twilio_token">Auth Token</label>
                <input name="twilio_token" type="text" class="form-control" placeholder="Enter AUTH TOKEN" required >
            </div>

            <button type="submit" name="save_twilio_auth_data" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
    




    <?php include_once('inc/footer.php') ?>
    <script>
  $('#form').parsley();
</script>

  </body>


</html>