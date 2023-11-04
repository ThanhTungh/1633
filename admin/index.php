<?php include('partials/menu.php') ?>
<!-- Main content Section Starts-->
<div class="main-content">
    <div class="wrapper">
        <h1>DASHBOARD</h1>
        <br><br>

        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login']; //display session message
            unset($_SESSION['login']); //removing session message
        }
        ?>
        <br><br>

        <div class="col-4 text-center" style="margin-left:300px;">
            <?php
                //sql query
                $sql ="SELECT * FROM tbl_category";
                //execute query
                $res = mysqli_query($conn, $sql);
                //count row
                $count = mysqli_num_rows($res)
            ?>
            <h1><?php echo $count ?></h1> 
            <br />
            Category
        </div>
        <div class="col-4 text-center">
            <?php
                //sql query
                $sql2 ="SELECT * FROM tbl_food";
                //execute query
                $res2 = mysqli_query($conn, $sql2);
                //count row
                $count2 = mysqli_num_rows($res2)
            ?>
            <h1><?php echo $count2 ?></h1>
            <br />
            Food
        </div>
        <div class="clearfix"></div>
    </div>

</div>
<!-- Footer section starts -->
<?php include('partials/footer.php') ?>