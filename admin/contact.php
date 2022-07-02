<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Contact Forms</h1>

                <br /><br /><br />

                <table class="tbl-full">
                    <tr>
                        <th width="5%">#</th>
                        <th width="10%">Full Name</th>
                        <th width="20%">Email</th>
                        <th width="6%">Phone Number</th>
                        <th width="8%">Subject</th>
                        <th width="10%">Message</th>
                    </tr>

                    <?php 
                        //Get all the contacts from database
                        $sql = "SELECT * FROM tbl_contact ORDER BY id DESC"; // DIsplay the Latest Order at First
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count the Rows
                        $count = mysqli_num_rows($res);

                        $sn = 1; //Create a Serial Number and set its initail value as 1
                        $i = 1;

                        if($count>0)
                        {
                            //Order Available
                            $name = [];
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //Get all the order details
                                $id = $row['id'];
                                $name = $row['name'];
                                $email = $row['email'];
                                $phone = $row['phone'];
                                $subject = $row['subject'];
                                $msg = $row['msg'];
                                
                                ?>

                                    <tr>
                                        <td><?php echo $sn; ?> </td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $phone; ?></td>
                                        <td><?php echo $subject; ?></td>
                                        <td><?php echo $msg; ?></td>
                                    </tr>

                                <?php

                            }
                        $sn++;}
                        else
                        {
                            //Order not Available
                            echo "<tr><td colspan='6' class='error'>Contact Forms not Available</td></tr>";
                        }
                    ?>

 
                </table>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>