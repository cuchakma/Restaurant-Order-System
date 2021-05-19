<?php include( $_SERVER['DOCUMENT_ROOT']."/admin/partials/menu.php" ); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>
        <br>
        <?php
            $sl = 1;
            $add_category = isset( $_SESSION['add'] ) ? $_SESSION['add'] : '';
            echo $add_category;
            unset( $_SESSION['add'] );
        ?>
        <br>
            <a href="<?php echo SITE_URL.'admin/add-category.php' ?>" class="btn-primary">Add Category</a>
        <br /><br /><br />

        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>

            <?php
                /**
                 * Fetch All Records From The Database
                 */
                $sql = "SELECT * FROM resto_category";
                $result = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($result);
                if( $count ) {
                    while( $rows = mysqli_fetch_assoc($result) ) {
                        $title      = isset( $rows['title'] ) ? $rows['title'] : '';
                        $image_name = !empty( $rows['image_name'] ) ? '<img src = '.SITE_URL.'images/category/'.$rows['image_name'].' width = 100px >' : ('<div class="error">No Image Available</div>');
                        $featured   = isset( $rows['featured'] ) ? $rows['featured'] : '';
                        $active     = isset( $rows['active'] ) ?  $rows['active'] : '';
                        ?>  
                            <tr>
                                <td><?php echo $sl++; ?></td>
                                <td><?php echo $title; ?></td>
                                <td><?php echo $image_name; ?></td>
                                <td><?php echo $featured; ?></td>
                                <td><?php echo $active; ?></td>
                                <td>
                                    <a href="#" class="btn-secondary">Update Category</a>
                                    <a href="#" class="btn-danger">Delete Category</a>
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

<?php  include( $_SERVER['DOCUMENT_ROOT']."/admin/partials/footer.php"); ?>