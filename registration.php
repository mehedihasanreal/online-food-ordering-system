<?php include('partials-front/menu.php'); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>
<div>
    <?php 
    if(isset($_POST['submit'])){
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $phonenumber=$_POST['phonenumber'];
        $email=$_POST['email'];
        $password= $_POST['password'];
        $sql7 = "INSERT INTO tbl_user (firstname, lastname, email, phone, password) VALUES ('$firstname','$lastname','$email',$phonenumber,'$password')";
        $res7 = mysqli_query($conn, $sql7);
        if($res7==true)
            {
                //Query Executed and Details Saved    

                $_SESSION['order'] = "<div class='success text-center'>Registration Successfull.</div>";
                header('location:'.SITEURL);
            }
            else
            {
                //Failed to Registered
                $_SESSION['order'] = "<div class='error text-center'>Registration Failed.</div>";
                header('location:'.SITEURL);
            }
    }
    ?>
</div>
<body>   
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Sign Up</h2>

            <form action="registration.php" class="order" method="POST">
                <fieldset>
                    <legend>Fill Up Details</legend>
                    <div class="order-label">First Name</div>
                    <input type="text" name="firstname" placeholder="First Name" class="input-responsive" required>
                    <div class="order-label">Last Name</div>
                    <input type="text" name="lastname" placeholder="Last Name" class="input-responsive" required>
                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="phonenumber" placeholder="Phone Number" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="Email" class="input-responsive" required>

                    <div class="order-label">Password</div>
                    <input type="tel" name="password" placeholder="Password" class="input-responsive" required>

                    <input type="submit" name="submit" value="Sign Up" class="btn btn-primary">
                </fieldset>

            </form>
           <a href="login.php"><h4 class="text-center text-white">Already registered? Sign In</h4></a> 

        </div>
    </section>

    <!-- footer Section Starts Here -->
    <?php include('partials-front/footer.php'); ?>
    <!-- footer Section Ends Here -->

</body>
</html>