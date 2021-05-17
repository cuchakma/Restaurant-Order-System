<?php include( $_SERVER['DOCUMENT_ROOT']."/admin/partials/menu.php" ); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br>
        <br>
        <?php 
            $message = isset( $_SESSION['add'] ) ? $_SESSION['add'] : '';
            echo $message;
            unset($message);
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" placeholder="You Fullname">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
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

<?php include 'partials/footer.php'; ?>

<?php 
    /**
     * Process the form values and save inside the database
     */
    if( isset( $_POST['submit'] ) ){
        $fullname = isset( $_POST['full_name'] ) ?  $_POST['full_name'] : '';
        $username = isset( $_POST['username'] ) ?  $_POST['username'] : '';
        $password = isset( $_POST['password'] ) ? md5( $_POST['password'] ): '';

        $sql = "INSERT INTO `resto_admin` (full_name, user_name, password) VALUES ('$fullname', '$username', '$password')";

        /**
         * Execute Query And Save In Databse
         */
        $result = mysqli_query($conn, $sql);

        if( $result ) {
            $_SESSION['add'] = "Added Successfully";
            header("location:".SITE_URL."admin/manage-admin.php");
        } else {
            $_SESSION['add'] = "Failed To Add Admin";
            header("location:".SITE_URL."admin/add-admin.php");
        }

    } 
?>