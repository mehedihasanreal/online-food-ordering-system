<?php include('partials-front/menu.php'); ?>

<div class="food-search2">
    <div class="container">
        <?php if(isset($_SESSION['login'])){?>
            <fieldset>
            <legend><h3>Orders</h3></legend>
                <table class="tbl-full table table-solid" border="1px" align="center">
                    <tr>
                        <th width="5%">#</th>
                        <th width="10%">Order Date</th>
                        <th width="20%">Items</th>
                        <th width="6%">Total</th>
                        <th width="8%">Status</th>
                    </tr>

                    <?php 
                        //Get all the orders from database
                        $e = $_SESSION['login'];
                        $sql = "SELECT * FROM tbl_order where customer_email = '$e' ORDER BY id DESC"; // DIsplay the Latest Order at First
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
                                //$food = $row['food'];
                                $food = unserialize($row['food']);
                                $total = $row['total'];
                                $order_date = $row['order_date'];
                                $status = $row['status'];
                                ?>

                                    <tr align="center">
                                        <td><?php echo $sn; ?> </td>
                                        <td><?php echo $order_date; ?></td>
                                        <td>
                                            <?php 
                                                foreach($food as $keys => $values){?>
                                            Food: <?php echo $values["food"]; ?>, Qty: <?php echo $values["qty"]; ?> <br>
                                            <?php }?>
                                        </td>
                                        <td><?php echo '৳'.$total; ?></td>
                                        

                                        <td>
                                            <?php 
                                                // Ordered, On Delivery, Delivered, Cancelled

                                                if($status=="Ordered")
                                                {
                                                    echo "<label style='color: blue;'>$status</label>";
                                                }
                                                elseif($status=="On Delivery")
                                                {
                                                    echo "<label style='color: orange;'>$status</label>";
                                                }
                                                elseif($status=="Delivered")
                                                {
                                                    echo "<label style='color: green;'><b>$status</b></label>";
                                                }
                                                elseif($status=="Cancelled")
                                                {
                                                    echo "<label style='color: red;'>$status</label>";
                                                }
                                            ?>
                                        </td>
                                    </tr>

                                <?php

                            }
                        $sn++;}
                        else
                        {
                            //Order not Available
                            echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
                        }
                    ?>

 
                </table>
                    </fieldset>
                <?php }else{?>
                    <h3 class="text-center">Please Login to See Your Orders</h3>
                <?php }?>
    </div>
    
</div>

<?php include('partials-front/footer.php'); ?>

<!--Fixedd-->