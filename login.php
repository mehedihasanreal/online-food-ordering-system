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
        $email=$_POST['email'];
        $password= $_POST['password'];
        if(!empty($email) && !empty($password)){
            $sql6 = "SELECT id FROM tbl_user WHERE email ='$email' AND password='$password'";
            $res6 = mysqli_query($conn, $sql6);
            $mysqli_num_rows = mysqli_num_rows($res6);
            if($mysqli_num_rows){
                $_SESSION['login'] = $email;
                $_SESSION['order'] = "<div class='success text-center'>Log in Successfull.</div>";
                header('location:'.SITEURL);
            }
            else
            {
                $_SESSION['order'] = "<div class='error text-center'>Log in Failed.</div>";
                header('location:'.SITEURL);
            }
        }
        else
        {
            echo "Fill up the form";
        }
        
    }
    ?>
</div>

<body>

    <!-- Loog In Form Section Start Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Sign In</h2>

            <form action="login.php" class="order" method="POST">
                <fieldset>
                    <legend>Log in Details</legend>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="Email" class="input-responsive" required>

                    <div class="order-label">Password</div>
                    <input type="tel" name="password" placeholder="Password" class="input-responsive" required>

                    <input type="submit" name="submit" value="Log in" class="btn btn-primary">
                </fieldset>

            </form>
            <a href="registration.php"><h4 class="text-center text-white">Not registered? Sign Up</h4></a>

        </div>
    </section>
    <!-- Loog In Form Section Ends Here -->


    <!-- footer Section Starts Here -->
    <?php include('partials-front/footer.php'); ?>
    <!-- footer Section Ends Here -->

</body>
</html>