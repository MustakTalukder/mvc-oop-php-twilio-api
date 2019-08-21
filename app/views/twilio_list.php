<!doctype html>
<html lang="en">

  <?php include_once('inc/header.php') ?>

  <body>

  <?php 

  $data = $_SESSION['twilio_number'];


  unset($_SESSION['twilio_number']);

  //  foreach($data as $record){
  //   print_r($record);
  //  }

 ?> 

 
 
  <div class="row">
      <div class="col-6" style="margin: 50px auto">

      <form action="/app/controllers/twilio_controller.php" method="post" >

      <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Number</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach($data as $record){
          
          ?>
        
          <tr>
            <td><?php echo $record; ?></td>
            
           
            <td>

            <div class="form-group form-check">
              <input 
                type="checkbox"
                name="check_list[]" 
                value="<?php echo $record; ?>" 
                class="form-check-input" 
                id="exampleCheck1"
              >
             
            </div>
            
            </td>  

          </tr>

        <?php
				}
				?>

        </tbody>
      </table>

      <button type="submit" name="save_twilio_list" class="btn btn-primary">Buy</button>
      </form>










      

      </div>
    </div>

    




    <?php include_once('inc/footer.php') ?>


  

            </div>
            </div>


</body>



</html>