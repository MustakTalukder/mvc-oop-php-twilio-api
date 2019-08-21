<!doctype html>
<html lang="en">

  <?php include_once('inc/header.php') ?>

  <body>


 
    <div class="row">
        <div class="col-6" style="margin: 50px auto" >
        <h2>Twilio search</h2>

                                                                                                
        <hr>
            <form id="form" data-validate="parsley" action="/app/controllers/twilio_controller.php" method="post" >

            <div class="form-group">
                <label for="area_code">Auth Token</label>
                <input name="area_code" type="text" class="form-control" placeholder="Enter Area Code" required >
            </div>

            <button type="submit" name="areacode_search" class="btn btn-success">Search</button>
            </form>
        </div>
    </div>
    




    <?php include_once('inc/footer.php') ?>
    <script>
  $('#form').parsley();
</script>

  </body>


</html>