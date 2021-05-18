<?php include( $_SERVER['DOCUMENT_ROOT']."/admin/partials/menu.php" ); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Add Category</h1>
            <br><br>
            <?php
                $add_category = isset( $_SESSION['add'] ) ? $_SESSION['add'] : '';
                echo $add_category;
                unset( $_SESSION['add'] );
            ?>
            <!-- Add Category Form -->
            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Title: </td>
                        <td>
                            <input type="text" name="title" placeholder="Category Title">
                        </td>
                    </tr>

                    <tr>
                        <td>Featured: </td>
                        <td>
                            <input type="radio" name="featured" value="yes">Yes</input>
                            <input type="radio" name="featured" value="no">No</input>
                        </td>
                    </tr>

                    <tr>
                        <td>Active: </td>
                        <td>
                            <input type="radio" name="active" value="yes">Yes</input>
                            <input type="radio" name="active" value="no">No</input>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit"  name="submit" value="Add Category" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>

            <?php
                if( isset( $_POST['submit'] ) ) {

                    /**
                     * Get Values From The Form 
                     */
                    $title      = isset( $_POST['title'] ) ? $_POST['title'] : '';
                    $featured   = isset( $_POST['featured'] ) ? $_POST['featured'] : 'No';
                    $active     = isset( $_POST['active'] ) ? $_POST['active'] : 'No';
                    $image_name = isset( $_POST['image_name'] ) ? $_POST['image_name'] : '';

                    /**
                     * SQL to insert the values
                     */
                    //$sql = "INSERT into resto_category (title, image_name, featured, active) VALUES ('$title', '$image_name', '$featured', '$active')";
                    $result = mysqli_query( $conn, $sql );
                    
                    if( $result ) {
                        $_SESSION['add'] = "<div class='success'>Category Added Successfully</div>";
                        header('location:'.SITE_URL.'admin/manage-category.php');
                    } else {
                        $_SESSION['add'] = "<div class='error'>Failed To Add Category</div>";
                        header('location:'.SITE_URL.'admin/add-category.php');
                    }
                    
                }
            ?>

        </div>
    </div>
<?php include( $_SERVER['DOCUMENT_ROOT']."/admin/partials/footer.php"); ?>
