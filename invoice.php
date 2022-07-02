<?php
ob_start();
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Online Food Order System</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body onload="window.print()">
      <div class="container">
          <div class="row mt-3">
              <div class="col-md-12">
                <center><h3>Invoice # <?php echo rand();?></h3></center>
              </div>
              <div class="col-md-12 mt-3">
                <div class="row">
                  <div class="col-md-9">
                    <h5>Email: <?php echo $_SESSION['login'];?></h5>
                    <h5>Order: Pending</h5>
                    <h5><i class="fa fa-location-dot text-danger" aria-hidden="true"></i> Bangladesh</h5>
                  </div>
                  <div class="col-md-3">
                    <h3 class="text-center">Generated On</h3>
                    <h5 class="text-center">Date: <?php echo date("Y/m/d");?></h5>
                    <h5 class="text-center">Time: <?php echo date("h:i:sa");?></h5>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <hr color="black">
              </div>
              <div class="col-md-12">
              <table class="table">
                    <thead>
                        <tr>
                        <th width="30%">Food Name</th>
                        <th width="10%">Quantity</th>
                        <th width="20%">Price</th>
                        <th width="15%">Order Total</th>
                        </tr>
                    </thead>

                    <?php
                    if(!empty($_SESSION['cart'])){
                        $total = 0;
                        foreach($_SESSION["cart"]as $keys => $values){
                    ?>
                        <tr>
                        <td><?php echo $values["food"]; ?></td>
                        <td><?php echo $values["qty"]; ?></td>
                        <td>৳<?php echo $values["price"] ?></td>
                        <td>৳<?php echo number_format($values["qty"] * $values["price"], 2);?></td>
                        </tr>
                    <?php
                    $total = $total + ($values["qty"] * $values["price"]);
                    }  
                    ?> 
                    <tr>
                        <td colspan="3" align="center">Total</td>
                        <td>৳<?php echo number_format($total, 2) ?></td>
                    </tr>
                    <?php
                    }  
                    ?>              
                	</table>
              </div>
              <footer class="col-md-12 fixed-bottom text-center">
                <hr color="black">
                <h4><span class="text-info">Developed By Anamika Zaman Priya</span></h4>
              </footer>
          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>