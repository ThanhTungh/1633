<?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
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
                //get the search
                $search = $_POST['search'];

                //sql query foood based on search
                $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
                //execute the query
                $res = mysqli_query($conn, $sql);

                //count row
                $count = mysqli_num_rows($res);
                if ($count > 0)
                {
                    while($row = mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name']; 
                        ?>
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                <?php
                                        if ($image_name == "")
                                        {
                                            echo "<div class = 'error'> No Image Available </div>";
                                        }
                                        else
                                        {
                                            ?>
                                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name ?>"  class="img-responsive img-curve">
                                            <?php
                                        }
                                    ?>
                                </div>

                                <div class="food-menu-desc">
                                    <h4><?php echo $title ?></h4>
                                    <p class="food-price"><?php echo $price ?></p>
                                    <p class="food-detail"><?php echo $description ?></p>
                                
                                </div>
                            </div>
                        <?php
                    }
                }
                else
                {
                    echo "<div clas = 'error'> Food not Found </div>";
                }
            ?>
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>