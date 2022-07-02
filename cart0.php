<?php include('partials-front/menu.php'); ?>
<script type="text/javascript">
	function text(x){
		if (x==1) {
			document.getElementById('real').style.display="block";
		}
		else{
			document.getElementById('real').style.display = "none";
		}
	}
</script>

<?php 
if(isset($_GET['remove'])){
    $id=$_GET['remove'];
    unset($_SESSION['cart'][$id]);
}
if(isset($_GET['removeall'])){
    unset($_SESSION['cart']);
}
?>

<?php 
$msg = "";
if(isset($_POST['placeorder'])){
    $a = "";
    $b = "";
    $total = $_POST['total'];
    $name = $_POST['full-name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $add = $_POST['address'];
    $cod = $_POST['cod'];
    if($cod == 'Pay Online'){
        $a = $_POST['bkash'];
        $b = $_POST['tid'];
    }

    $food = serialize($_SESSION['cart']);
    $sql = "insert into tbl_order(food,total,order_date,status,customer_name,customer_contact,customer_email,customer_address,order_type,bkash_number,transaction_id)
    values('$food','$total',now(),'On Delivery','$name','$contact','$email','$add','$cod','$a','$b')";
    $r = $conn->query($sql);
    if($r){
        $msg = "Order Placed Successfully";
        // unset($_SESSION['cart']);
        header("location:invoice.php");
    }
}


?>

<section class="food-search">
	<div class='container'>
        <h3 style="text-align:center;color:green;"><?php echo $msg;?></h3>
    	<fieldset>
            <legend style="text-align:center"><h3>Food cart</h3></legend>
                
                    <table class="table table-solid" border="1px" align="center">
                    <thead class="thead-dark">
                        <tr>
                        <th width="30%">Food Name</th>
                        <th width="10%">Quantity</th>
                        <th width="20%">Price</th>
                        <th width="15%">Order Total</th>
                        <th width="5%">Action</th>
                        </tr>
                    </thead>

                    <?php
                    if(!empty($_SESSION['cart'])){
                        $total = 0;
                        foreach($_SESSION["cart"]as $keys => $values){
                    ?>
                        <tr align="center">
                        <td><?php echo $values["food"]; ?></td>
                        <td><?php echo $values["qty"]; ?></td>
                        <td>৳<?php echo $values["price"] ?></td>
                        <td>৳<?php echo number_format($values["qty"] * $values["price"], 2);?></td>
                        <td><a href="?remove=<?php echo $keys; ?>"><span class="text-danger">Remove</span></a></td>
                        </tr>
                    <?php
                    $total = $total + ($values["qty"] * $values["price"]);
                    }  
                    ?> 
                    <tr>
                        <td colspan="3" align="center">Total</td>
                        <td align="center">৳<?php echo number_format($total, 2) ?></td>
                        <td><a href="?removeall=1"><span class="text-danger">Clear All</span></a></td>
                    </tr>
                    <?php
                    }  
                    ?>              
                	</table>
            	
        </fieldset>
        <?php if(isset($_SESSION['login'])){?>
        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <input type="hidden" value="<?php echo $total;?>" name="total">
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Anamika Zaman" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 01677950800" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" value="<?php echo $_SESSION['login'];?>" readonly placeholder="E.g. anamika@gmail.com" class="input-responsive" required>



                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. House, Road, Area" class="input-responsive" required></textarea>

                    <input type="radio"  id="cod" name="cod" value="Cash on Delivery" onclick="text(0)" checked>
					<label for="cod">Cash On Delivery</label><br><br>

					<input type="radio"  id="cod" name="cod" value="Pay Online" onclick="text(1)" >
					<label for="pon">Pay Online (Bkash:01649111224)</label><br><br>
					<div id="real">
					<div class="order-label" >Bkash Number</div>
                    <input type="tel" name="bkash" class="input-responsive" >

                    <div class="order-label" >Transaction Id</div>
                    <input type="tel"  name="tid" class="input-responsive" >
                    </div>

                    <input type="submit" name="placeorder" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>
        <?php }else{?>
            <h1 style="text-align:center;">Please Login to Place order.</h1>
        <?php }?>
    </div>
</section>


    <!-- fOOD sEARCH Section Ends Here -->

 <?php include('partials-front/footer.php'); ?>