<?php include( $_SERVER['DOCUMENT_ROOT']."/admin/partials/menu.php" ); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>

        <br><br>
        <?php
            $id = isset( $_GET['id'] ) ? $_GET['id'] : '';

            if( $id ) {
                $sql = "SELECT * FROM resto_category WHERE ID = '{$id}'";
                $result = mysqli_query( $conn, $sql ); 
                $count = mysqli_num_rows($result);
                if( $count ) {
                    $rows       = mysqli_fetch_assoc($result);
                    $title      = isset( $rows['title'] ) ? $rows['title'] : '';
                    $image_name = isset( $rows['image_name'] ) ?  $rows['image_name'] : '';
                    $featured   = isset( $rows['featured'] ) ? $rows['featured'] : '';
                    $active     = isset( $rows['active'] ) ? $rows['active'] : '';
                } else {
                    $_SESSION['no-category-found'] = "<div class='error'>Category Not Found</div>";
                    header('location:'.SITE_URL.'admin/manage-category.php');
                }
            } else {
                header('location:'.SITE_URL.'admin/manage-category.php');
            }
        ?>
        
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                        Image Will Be Displayed Here
                    </td>
                </tr>
                
                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type="file" name="image">
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
                        <input type="submit"  name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php  include( $_SERVER['DOCUMENT_ROOT']."/admin/partials/footer.php"); ?>