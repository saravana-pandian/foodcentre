<?php include('partif/menu.php'); ?>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php

             $search=$_POST['search'];

            ?>
            <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php

           
            $sql=" SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%' ";
            $res=mysqli_query($conn, $sql);

            $count=mysqli_num_rows($res);
            if ($count>0) {
                while ($row=mysqli_fetch_assoc($res)) {
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
                        echo "IMage Not Available";
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

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>  

                        <?php
                }
            }
            else{
                echo "<div>Food Not Found with </div>"; echo $search ;
            }

            ?>

           


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
   <?php include('partif/footer.php'); ?>