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
                    while( $row = mysqli_fetch_assoc($result) ) {
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
                                    <a href="#" class="btn-secondary">Update Admin</a>
                                    <a href="#" class="btn-danger">Delete Admin</a>
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