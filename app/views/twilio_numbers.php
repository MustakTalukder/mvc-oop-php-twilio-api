<!doctype html>
<html lang="en">

  <?php include_once('inc/header.php') ?>


    <?php 

      $data = $_SESSION['my_numbers'];


      unset($_SESSION['my_numbers']);

      //  foreach($data as $record){
      //   print_r($record);
      //  }

      ?> 


  <body>
 
  <div class="row">
      <div class="col-6" style="margin: 50px auto">

      <h2>Number List</h2>
      <hr>


      <form action="" method="post" >

      <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Number</th>
           
          </tr>
        </thead>
        <tbody>
          <?php
          $i=0;
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

      </form>










      

      </div>
    </div>

    




    <?php include_once('inc/footer.php') ?>


  

            </div>
            </div>


</body>



</html>