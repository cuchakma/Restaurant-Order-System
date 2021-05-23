<?php include( $_SERVER['DOCUMENT_ROOT']."/admin/partials/menu.php" ); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>
        <br>
        <br>
            <a href="<?php echo SITE_URL.'admin/add-food.php'; ?>" class="btn-primary">Add Food

            </a>
        <br /><br /><br />

        <?php 
            $sl = 1;
            $add_food = isset( $_SESSION['food-add'] ) ? $_SESSION['food-add'] : '';
            echo $add_food;
            unset( $_SESSION['food-add'] ); 

            $delete_food = isset( $_SESSION['delete-food'] ) ?  $_SESSION['delete-food'] : '';
            echo $delete_food;
            unset( $_SESSION['delete-food'] );

            $image_remove_failed = isset( $_SESSION['image-remove-failed'] ) ? $_SESSION['image-remove-failed'] : '';
            echo $image_remove_failed;
            unset( $_SESSION['image-remove-failed'] );

            $food_delete = isset( $_SESSION['food-deleted'] ) ?  $_SESSION['food-deleted'] : '';
            echo $food_delete;
            unset( $_SESSION['food-deleted'] );

            $update_image_failed = isset( $_SESSION['update-food-image-failed'] ) ?  $_SESSION['update-food-image-failed'] : '';
            echo $update_image_failed;
            unset( $_SESSION['update-food-image-failed'] );

            $update_food = isset( $_SESSION['food-updated'] ) ?  $_SESSION['food-updated'] : '';
            echo $update_food;
            unset( $_SESSION['food-updated'] );
        ?>
        
        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>

            <?php
                $sql    = "SELECT * FROM resto_food";
                $result = mysqli_query( $conn, $sql );
                $rows = mysqli_num_rows($result);
                if( $rows ) {
                    while( $row = mysqli_fetch_assoc( $result ) ) {
                        $id          = isset( $row['id'] ) ? $row['id'] : '';
                        $title       = isset( $row['title'] ) ? $row['title'] : '';
                        $description = isset( $row['description'] ) ? $row['description'] : '';
                        $price       = isset( $row['price'] ) ? $row['price'] : '';
                        $image_name  = empty( $row['image_name'] ) ? ( '<div class="error">Image Not Added!</div>' ) : ( '<img src='.SITE_URL.'images/food/'.$row['image_name'].' width = 100px >' );
                        $featured    = isset( $row['featured'] ) ? $row['featured'] : '';
                        $active      = isset( $row['active'] ) ? $row['active'] : '';
                        ?>
                            <tr>
                                <td><?php echo $sl++; ?></td>
                                <td><?php echo $title; ?></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo $image_name; ?></td>
                                <td><?php echo $featured; ?></td>
                                <td><?php echo $active; ?></td>
                                <td>
                                    <a href=<?php echo SITE_URL.'admin/update-food.php?id='.$id; ?> class="btn-secondary">Update Food</a>
                                    <a href=<?php echo SITE_URL.'admin/delete-food.php?id='.$id."&image_name=".$row['image_name']; ?> class="btn-danger">Delete Food</a>
                                </td>
                            </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='7' class = 'error'>Food Not Added Yet!</td></tr>";
                }
            ?>
        </table>    
    </div>
</div>

<?php  include( $_SERVER['DOCUMENT_ROOT']."/admin/partials/footer.php"); ?>