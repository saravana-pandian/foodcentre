<?php include('partif/menu.php'); ?>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SETURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

              <?php 

            $sql2="SELECT * FROM tbl_food WHERE active='Yes'";
            $res2=mysqli_query($conn, $sql2);
            $count2=mysqli_num_rows($res2);
            if($count2>0){
                    while ($row=mysqli_fetch_assoc($res2)) {
                        $id=$row['id'];
                        $title=$row['title'];
                        $prize=$row['prize'];
                        $description=$row['description'];
                        $image_name=$row['image_name'];
                        ?>


            <div class="food-menu-box">
                <div class="food-menu-img">
                      <?php

                    if ($image_name=="") {
                    echo "<div class='error'>image Not Availabe</div>";
                }
                else{
                    ?>
                     <img src="<?php echo SETURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                     <?php
                }
                ?>

                </div>

                 <div class="food-menu-desc">
                    <h4><?php echo $title; ?></h4>
                    <p class="food-price">Rs.<?php echo $prize; ?></p>
                    <p class="food-detail">
                        <?php echo $description; ?>
                    </p>
                    <br>

                   <a href="<?php echo SETURL;  ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>
            <?php
                     }
                    }
                    else{

                        echo "<div>Food Not Available</div>";
                }
                   ?>
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
   <?php include('partif/footer.php'); ?>