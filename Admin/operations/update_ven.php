<?php 
              $server = "localhost";
              $username = "root";
              $password = "";
              $dbname = "break_pass";
                  $con = mysqli_connect($server,$username,$password,$dbname);
                  if(! $con){
                      die("connection faled due to :");
                  }
                  ?>
                  <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <strong> <?php //echo "Connected Successfully !"; ?> </strong> 
                  </div> -->
                  
                  <script>
                    $(".alert").alert();
                  </script>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="update.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div id="main">
    <?php if(isset($_GET['uid'])) {
      
      $id=$_GET['uid'];
      $q4= "SELECT * FROM `vendors` WHERE `id` = '$id'";
      $result23 = mysqli_query($con,$q4);
      
    } ?>
    <?php 
        if(isset($_POST['update'])){
          $idn1 = $id;
          $name= $_POST['name'];
          $phone = $_POST['phone'];
          $email = $_POST['email'];
          $Add = $_POST['add'];
          $Area = $_POST['area'];
          $space = $_POST['sp'];
          $tow = $_POST['tow'];
          $Exp = $_POST['pin'];
          $Ch = $_POST['ch'];
          
      
          $q5= "UPDATE `vendors` SET `name`='$name',`email`='$email',`phone`='$phone',`address`='$Add',`area`='$Area',`space`='$space',`towing`='$tow',`pin`='$Exp', `charges`='$Ch' WHERE `id`='$idn1';";
          $result = mysqli_query($con,$q5);
        
          if($con -> query($q5)==true){
          ?>  
              
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <strong><?php echo"updated successfully !";
      ?></strong> 
              </div>
              
              <script>
                $(".alert").alert();
              </script>
      
          <?php } 
       header("location:../vendors.php");
          
        }
         
          

        ?>
  <?php  while($row = mysqli_fetch_assoc($result23)) { ?>

  <form method="POST" idn ="<?php echo $id ?>">

       
        <div class="form-group">
             <label for="">Name</label>
             <input type="text" value ="<?php echo $row['name'];  ?>" name ="name" id="phone" class="form-control" placeholder="Please enter your phone" aria-describedby="helpId" Required>
            
        </div>
        <div class="form-group">
             <label for="">Phone</label>
             <input type="tel" value ="<?php echo $row['phone'];  ?>" name ="phone" id="phone" class="form-control" placeholder="Please enter your phone" aria-describedby="helpId" Required>
            
        </div>
        <div class="form-group">
             <label for="">Email</label>
             <input type="email" value ="<?php echo $row['email'];  ?>" name ="email" id="phone" class="form-control" placeholder="Please enter your phone" aria-describedby="helpId" Required>
            
        </div>

        <div class="form-group">
             <label for="">Address</label>
             <input type="text" value ="<?php echo $row['address']; ?>" name ="add" id="phone" class="form-control" placeholder="Please enter your phone" aria-describedby="helpId" Required>
            
        </div>
        <div class="form-group">
             <label for="">Area</label>
             <input type="text" value ="<?php echo $row['area'];  ?>" name ="area" id="phone" class="form-control" placeholder="Please enter your phone" aria-describedby="helpId" Required>
            
        </div>
        <div class="form-group">
             <label for="">Specilization</label>
             <input type="text" value ="<?php echo $row['space'];  ?>" name ="sp" id="phone" class="form-control" placeholder="Please enter your phone" aria-describedby="helpId" Required>
            
        </div>
        <div class="form-group">
             <label for="">Towing Services</label>
             <input type="text" value ="<?php echo $row['towing'];  ?>" name ="tow" id="phone" class="form-control" placeholder="Please enter your phone" aria-describedby="helpId" Required>
            
        </div>
        <div class="form-group">
             <label for="">PINCODE</label>
             <input type="text" value ="<?php echo $row['pin'];  ?>" name ="pin" id="phone" class="form-control" placeholder="Please enter your phone" aria-describedby="helpId" Required>
            
        </div>
        <div class="form-group">
             <label for="">Starting Charges</label>
             <input type="text" value ="<?php echo $row['charges'];  ?>" name ="ch" id="phone" class="form-control" placeholder="Please enter your phone" aria-describedby="helpId" Required>
            
        </div>

           <input type="submit" name="update" placeholder="Update">
           
          </form>
        <?php } ?>
        
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
