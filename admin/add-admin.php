<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>
        <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];//display session message
                        unset ($_SESSION['add']);//removing session message
                    }
                
                ?>
                
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>
                <tr>
                    <td>UserName</td>
                    <td><input type="text" name="username" placeholder="Enter Username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Enter Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
                
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php') ?> 

<?php 
    //Process the value from form and save it in database
    //check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        //button clicked
        // echo "button clicked";
        //get the data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //password encryption with md5

        //SQL querry to save data to database
        $sql ="INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        ";
        //execute querry and save data into database
        $res= mysqli_query($conn,$sql);

        if($res==TRUE){
            //Data insert
            $_SESSION['add']= "Add admin successfully";
            header("location:".SITEURL.'admin/manage-admin.php');
        }else{
            //false to insert data
            $_SESSION['add']= "False to Add admin";
            header("location:".SITEURL.'admin/add-admin.php');
        }
    }
?> 