<?php include('partif/menu.php'); ?>
    <!-- Navbar Section Ends Here -->
    <?php


    if (isset($_GET['food_id'])) {
        $food_id=$_GET['food_id'];
        //get detail fo selected food
        $sql="SELECT * FROM tbl_food WHERE id=$food_id";
        $res=mysqli_query($conn, $sql);
        $count=mysqli_num_rows($res);
        if ($count==1) {
            $row=mysqli_fetch_assoc($res);
            $title=$row['title'];
            $prize=$row['prize'];
            $image_name=$row['image_name'];
        }

        else{
         header('location:'.SETURL);
        }
    }
    else{
        header('location:'.SETURL);
    }
    ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>
                        <?php

                        if ($image_name=="") {
                            echo "Image Not Available";
                        }
                        else{
                            ?>
                              <div class="food-menu-img">
                             <img src="<?php echo SETURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                            <?php
                        }

                        ?>
                  
                       
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">


                        <p class="food-price">Rs.<?php echo $prize; ?></p>
                        <input type="hidden" name="prize" value="<?php echo $prize; ?>">
                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>
            <?php

            if (isset($_POST['submit'])) {
                
                $food=$_POST['food'];
                $prize=$_POST['prize'];
                $qty=$_POST['qty'];
                $total=$prize*$qty;
                $order_date=date("y-m-d h:i:sa"); 
                $status="ordered";
                $customer_name=$_POST['full-name'];
                $customer_contact=$_POST['contact'];
                $customer_email=$_POST['email'];
                $customer_address=$_POST['address'];

                //

                $sql2="INSERT INTO tbl_order SET food='$food', price=$prize, qty=$qty, total=$total, order_date='$order_date', status='$status', customer_name='$customer_name', customer_address='$customer_address', customer_contact='$customer_contact', customer_email='$customer_email'";
                  //  echo $sql2; die();
                $res2=mysqli_query($conn, $sql2);
                if ($res2==true) {
                
                   header('location:'.SITEURL.'/invoice.php'); 
                }
                else{
                    $_SESSION['order-fail']="<div class='error text-center'>Food Order failed</div>";
                   header('location:'.SETURL); 

                }
            }

            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- social Section Starts Here -->
   <?php include('partif/footer.php'); ?>