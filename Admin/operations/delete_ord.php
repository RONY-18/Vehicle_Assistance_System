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
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <strong> <?php echo "Connected Successfully !"; ?> </strong> 
                  </div>
                  
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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div id="main">
    <?php if(isset($_GET['uid'])) {
      
      $id=$_GET['uid'];
      $q4= "SELECT * FROM `requests` WHERE `id` = '$id'";
      $result = mysqli_query($con,$q4);
      
    }?>
  <?php while($row = mysqli_fetch_assoc($result)) { ?>

  <form method="POST" idn ="<?php echo $id ?>">

  <div class="form-group">
             <label for="">Name</label>
             <input type="text" value ="<?php echo $row['name'];  ?>" name ="name" id="phone" class="form-control" placeholder="Please enter your phone" aria-describedby="helpId" Required>
            
        </div>
        <div class="form-group">
             <label for="">Email</label>
             <input type="email" value ="<?php echo $row['email'];  ?>" name ="email" id="phone" class="form-control" placeholder="Please enter your phone" aria-describedby="helpId" Required>
            
        </div>

        <div class="form-group">
             <label for="">Password</label>
             <input type="text" value ="<?php echo $row['password']; ?>" name ="pass" id="phone" class="form-control" placeholder="Please enter your phone" aria-describedby="helpId" Required>
            
        </div>
        <div class="form-group">
             <label for="">Location</label>
             <input type="text" value ="<?php echo $row['loc'];  ?>" name ="loc" id="phone" class="form-control" placeholder="Please enter your phone" aria-describedby="helpId" Required>
            
        </div>
        <div class="form-group">
             <label for="">National Highway</label>
             <input type="text" value ="<?php echo $row['NH'];  ?>" name ="nh" id="phone" class="form-control" placeholder="Please enter your phone" aria-describedby="helpId" Required>
            
        </div>
        <div class="form-group">
             <label for="">Issue</label>
             <input type="text" value ="<?php echo $row['issue'];  ?>" name ="iss" id="phone" class="form-control" placeholder="Please enter your phone" aria-describedby="helpId" Required>
            
        </div>
        <div class="form-group">
             <label for="">Details</label>
             <input type="text" value ="<?php echo $row['details'];  ?>" name ="det" id="phone" class="form-control" placeholder="Please enter your phone" aria-describedby="helpId" Required>
            
        </div>
           <button type="submit" name="delete">Delete</button>
           
          </form>
        <?php } ?>
        <?php 
        if(isset($_POST['delete'])){
         
      
          $q6= "DELETE FROM `requests` WHERE `id` = $id";
          $result2 = mysqli_query($con,$q6);
        
          if($result2){
          ?>  
              
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <strong><?php echo"deleated successfully !";
      ?></strong> 
              </div>
              
              <script>
                $(".alert").alert();

              </script>
      
          <?php 
        }
        header("location:../orders.php");
      }  

        ?>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>