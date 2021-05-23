<?php include( "../admin/partials/menu.php" ); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>
        <br>
        <?php
            $sl = 1;
            $add_category = isset( $_SESSION['add'] ) ? $_SESSION['add'] : '';
            echo $add_category;
            unset( $_SESSION['add'] );

            $remove_category_image_failed = isset( $_SESSION['remove'] ) ?  $_SESSION['remove'] : '';
            echo $remove_category_image_failed;
            unset( $_SESSION['remove'] );

            $remove_category = isset( $_SESSION['delete-category'] ) ?  $_SESSION['delete-category'] : '';
            echo $remove_category;
            unset( $_SESSION['delete-category'] );

            $no_catgeory = isset( $_SESSION['no-category-found'] ) ?  $_SESSION['no-category-found'] : '';
            echo $no_catgeory;
            unset( $_SESSION['no-category-found'] );
        ?>
        <br>
            <a href="<?php echo SITE_URL.'admin/add-category.php' ?>" class="btn-primary">Add Category</a>
        <br /><br /><br />

        <table class="tbl-full">
            <thead>
                <th>S/N</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </thead>

            <?php
                /**
                 * Fetch All Records From The Database
                 */
                $sql = "SELECT * FROM resto_category";
                $result = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($result);
                if( $count ) {
                    while( $rows = mysqli_fetch_assoc($result) ) {
                        $id          = $rows['ID'];
                        $title       = isset( $rows['title'] ) ? $rows['title'] : '';
                        $image_name  = !empty( $rows['image_name'] ) ? '<img src = '.SITE_URL.'images/category/'.$rows['image_name'].' width = 100px >' : ('<div class="error">No Image Available</div>');
                        $featured    = isset( $rows['featured'] ) ? $rows['featured'] : '';
                        $active      = isset( $rows['active'] ) ?  $rows['active'] : '';
                        ?>  
                            <tr>
                                <td><?php echo $sl++; ?></td>
                                <td><?php echo $title; ?></td>
                                <td><?php echo $image_name; ?></td>
                                <td><?php echo $featured; ?></td>
                                <td><?php echo $active; ?></td>
                                <td>
                                    <a href="<?php echo SITE_URL.'admin/update-category.php?id='.$id; ?>" class="btn-secondary">Update Category</a>
                                    <a href="<?php echo SITE_URL.'admin/delete-category.php?id='.$id.'&image_name='.$rows['image_name'] ?>" class="btn-danger">Delete Category</a>
                                </td>
                            </tr>
                        <?php   
                    }
                } else {
                    ?>
                        <tr>
                            <td colspan="6"><div class="error">No Category Added</div></td>
                        </tr>
                    <?php
                }
            ?>
        </table>
    </div>
</div>

<?php  include( "../admin/partials/footer.php"); ?>