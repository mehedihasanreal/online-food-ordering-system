<?php include('partials-front/menu.php'); ?>

<?php 
$a = "";

if(isset($_POST['contact1'])){
    $name = $_POST['full-name'];
    $phone = $_POST['contact'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];

    $sql = "insert into tbl_contact(name,phone,email,subject,msg) values('$name','$phone','$email','$subject','$msg')";
    $r = $conn->query($sql);
    if($r){
        $a = "Form Submitted Successfully.";
    }
}


?>

<section class="food-search">
	<div class="container">
        <h3 class="text-center" style="color:green;"><?php echo $a;?></h3>
		<h2 class="text-center text-white">Stay Touched</h2>

            <form action="" method="POST" class="order">
                
                <fieldset>
                    <legend>Fill the Form</legend>

                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Anamika Zaman" class="input-responsive" required>

                    <div class="order-label">Subject</div>
                    <input type="tel" name="subject" placeholder="E.g. Title" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 01677950800" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. anamika@gmail.com" class="input-responsive" required>

                    <div class="order-label">Message</div>
                    <textarea name="msg" rows="10" placeholder="E.g. Any Message" class="input-responsive" required></textarea>

                    <input type="submit" name="contact1" value="Submit" class="btn btn-primary">
                </fieldset>
            </form>
    </div>
</section>
