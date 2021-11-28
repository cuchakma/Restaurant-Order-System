<?php include( $_SERVER['DOCUMENT_ROOT']."/admin/partials/menu.php" ); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
        <br>
        <br>
        <?php
            $upload_image_message = isset(  $_SESSION['upload-food-image'] ) ?  $_SESSION['upload-food-image'] : '';
            echo $upload_image_message;
            unset( $_SESSION['upload-food-image'] );
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title Of The Food">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5"></textarea> 
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>


                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>


                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">
                            <?php 
                                /**
                                 * Get And Display Categories From The Database
                                 */
                                $sql    = "SELECT ID, title FROM resto_category WHERE active = 'yes'";
                                $result = mysqli_query($conn, $sql);
                                $rows = mysqli_num_rows($result); 
                                if( $rows ) {
                                    while( $data = mysqli_fetch_assoc($result) ) {
                                        $id = $data['ID'];
                                        $title = $data['title'];
                                        ?>
                                            <option value=<?php echo $id; ?>><?php echo $title; ?></option>
                                        <?php
                                    }
                                } else {
                                    ?>
                                        <option value = 0 > No Category </option>
                                    <?php
                                }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="yes">Yes
                        <input type="radio" name="featured" value="no">No
                    </td>
                </tr>


                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="yes">Yes
                        <input type="radio" name="active" value="no">No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
            if( isset( $_POST['submit'] ) ) {
                $title       = isset( $_POST['title'] ) ? $_POST['title'] : '';
                $description = isset( $_POST['description'] ) ? $_POST['description'] : '';
                $price       = isset( $_POST['price'] ) ? $_POST['price'] : '';
                $image       = isset( $_FILES['image'] ) ? $_FILES['image'] : '';
                $category    = isset( $_POST['category'] ) ? $_POST['category'] : '';
                $featured    = isset( $_POST['featured'] ) ? $_POST['featured'] : 'no';
                $active      = isset( $_POST['active'] ) ? $_POST['active'] : 'no';

                if( $image ) {

                    $image_name = $image['name'];

                    /**
                     * If Image Or Image Name Is Selected By The Admin
                     */
                    if( !empty( $image_name ) ) {
                        $name_and_extension      =  explode('.',$image_name);
                        $name                    = $name_and_extension[0];
                        $extension               = $name_and_extension[1];
                        $new_image_name          = $name.'_'.rand(000, 999).'.'.$extension;
                        $image_file_location     = $image['tmp_name'];
                        $store_image_destination = $_SERVER['DOCUMENT_ROOT'].'/images/food/'.$new_image_name;
                        $upload                  = move_uploaded_file( $image_file_location, $store_image_destination ); 
                        
                        if( !$upload ) {
                            $_SESSION['upload-food-image'] = "<div class='error'>Failed To Upload Image!ss</div>";
                            header("location:".SITE_URL."admin/add-food.php");
                        }
                    }
                }

                $sql = "INSERT into resto_food (title, description, price, image_name, category_id, featured, active) VALUES ( '$title','$description','$price','$new_image_name', '$category', '$featured','$active' )";
                $result = mysqli_query( $conn, $sql );

                if( $result ) {
                    $_SESSION['food-add'] = '<div class="success">Food Added Successfully!</div>';
                    header("location:".SITE_URL."admin/manage-food.php");
                } else {
                    $_SESSION['food-add'] = '<div class="error">Failed To Add Food!</div>';
                    header("location:".SITE_URL."admin/manage-food.php");
                }
            }
        ?>

    </div>
</div>
<?php  include( $_SERVER['DOCUMENT_ROOT']."/admin/partials/footer.php"); ?>