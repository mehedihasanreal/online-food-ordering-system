
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


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search2">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Anamika Zaman" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 01677950800" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. anamika@gmail.com" class="input-responsive" required>



                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. House, Road, Area" class="input-responsive" required></textarea>

                    <input type="radio"  id="cod" name="cod" value="Cash on Delivery" onclick="text(0)" checked>
					<label for="cod">Cash On Delivery</label><br><br>

					<input type="radio"  id="cod" name="cod" value="Pay Online" onclick="text(1)" >
					<label for="pon">Pay Online</label><br><br>
					<div id="real">
					<div class="order-label" >Bkash Number</div>
                    <input type="tel" name="bkash" class="input-responsive" >

                    <div class="order-label" >Transaction Id</div>
                    <input type="tel"  name="tid" class="input-responsive" >
                    </div>

                    <input type="submit" name="sbmt" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php 

                //CHeck whether submit button is clicked or not
                if(isset($_POST['sbmt']))
                {
                    // Get all the details from the form

                    $food = $_POST['food'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];

                    $total = $price * $qty; // total = price x qty 

                    $order_date = date("Y-m-d h:i:sa"); //Order DAte

                    $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled

                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];


                    //Save the Order in Databaase
                    //Create SQL to save the data
                    $sql2 = "INSERT INTO tbl_order SET 
                        food = '$food',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        order_date = '$order_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address'
                    ";
                    

                    //echo $sql2; die();

                    //Execute the Query
                    $res2 = mysqli_query($conn, $sql2);

                    //Check whether query executed successfully or not
                    if($res2==true)
                    {
                        //Query Executed and Order Saved    

                        $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div>";
                        header('location:'.SITEURL);
                    }
                    else
                    {
                        //Failed to Save Order
                        $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
                        header('location:'.SITEURL);
                    }

                }
            
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>