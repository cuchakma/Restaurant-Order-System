<?php include( "../admin/partials/menu.php" ); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1 style="text-align:center;color:darkgreen">Add New Category</h1>
            <br><br>
            <style>
                .form-radio{
                    margin: 2 10px;
                }
            </style>
            <?php
                $add_category = isset( $_SESSION['add'] ) ? $_SESSION['add'] : '';
                echo $add_category;
                unset( $_SESSION['add'] );

                $failed_upload = isset( $_SESSION['upload'] ) ? $_SESSION['upload'] : '';
                echo $failed_upload;
                unset($_SESSION['upload']);
            ?>
            <!-- Add Category Form -->
            <div class="login" style="width: 50%;margin-top:2%">
            <form action="" method="POST" enctype="multipart/form-data">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" placeholder="Enter Category Title" class="form-input"><br><br>

            <label for="Image" class="form-label">Choose Image</label>
            <input type="file" style="background-color: white;"  name="image"  class="form-input"><br><br>


            <label for="featured" class="form-label">Featured</label><br>
            <input type="radio" name="featured" value="yes" class="form-radio">Yes</input>
            <input type="radio" name="featured" value="no" class="form-radio">No</input><br><br>

            <label for="active" class="form-label">Active</label><br>
            <input type="radio" name="active" value="yes" class="form-radio">Yes</input>
            <input type="radio" name="active" value="no" class="form-radio">No</input><br><br>

            <input type="submit" name="submit" value="Add Category" class="btn-submit">
        </form><br><br>
    </div>

            <?php
                if( isset( $_POST['submit'] ) ) {
            
                    /**
                     * Get Values From The Form 
                     */
                    $title             = isset( $_POST['title'] ) ? $_POST['title'] : '';
                    $featured          = isset( $_POST['featured'] ) ? $_POST['featured'] : 'No';
                    $active            = isset( $_POST['active'] ) ? $_POST['active'] : 'No';
                    $image_name        = isset( $_FILES['image']['name'] ) ? $_FILES['image']['name'] : '';
                    if( $image_name ) {
                        $first_value       = explode( '.', $image_name )[0];
                        $ext               = end ( explode ( '.',$image_name ) );
                        $image_name        = $first_value."_".rand(000, 999).".".$ext;
                        $image_source_path = isset( $_FILES['image']['tmp_name'] ) ? $_FILES['image']['tmp_name'] : '';
                        $destination_path  = "/images/category/".$image_name;
                        $upload            = ( isset( $image_name ) && isset( $image_source_path ) && isset( $destination_path ) ) ? move_uploaded_file( $image_source_path, $destination_path ) : '';
                        if( !$upload ) {
                            $_SESSION['upload'] = '<div class="error">Failed To Upload Image</div>';
                            header("location:".SITE_URL."admin/add-category.php");
                            die();
                        }
                    }
                   

                    /**
                     * SQL to insert the values
                     */
                    $sql = "INSERT into resto_category (title, image_name, featured, active) VALUES ('$title', '$image_name', '$featured', '$active')";
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
<?php include( "../admin/partials/footer.php"); ?>
