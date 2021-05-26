<?php include( $_SERVER['DOCUMENT_ROOT']."/admin/partials/menu.php" ); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br>
        <br>
        <?php
            /**
             * Get All Order Details From Database
             */
            $order_id = isset( $_GET['order_id'] ) ?  $_GET['order_id'] : header('location:'.SITE_URL.'admin/manage-order.php');
            $sql      = "SELECT * FROM resto_order WHERE id = {$order_id}";
            $result   = mysqli_query( $conn, $sql );
            $rows      = mysqli_num_rows($result);
            if( $rows ) {
                $row              = mysqli_fetch_assoc( $result );
                $id               = isset( $row['id'] ) ? $row['id'] : '';
                $food_name        = isset( $row['food'] ) ? $row['food'] : '';
                $price            = isset( $row['price'] ) ? $row['price'] : '';
                $quantity         = isset( $row['qty'] ) ? $row['qty'] : '';
                $order_total      = isset( $row['total'] ) ? $row['total'] : '';
                $order_date       = isset( $row['order_date'] ) ? $row['order_date'] : '';
                $order_status     = isset( $row['status'] ) ? $row['status'] : '';
                $customer_name    = isset( $row['customer_name'] ) ? $row['customer_name'] : '';
                $customer_contact = isset( $row['customer_contact'] ) ?  $row['customer_contact'] : '';
                $customer_email   = isset( $row['customer_email'] ) ?  $row['customer_email'] : '';
                $customer_address = isset( $row['customer_address'] ) ? $row['customer_address'] : '';
            } else {
                header('location:'.SITE_URL.'admin/manage-order.php');
            }
        ?>
        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Food Name</td>
                    <td>
                        <input type="text" name="order_title" value="<?php echo $food_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Price</td>
                    <td>
                        <input type="number" name="order_price" value="<?php echo $price; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Qty</td>
                    <td>
                        <input type="number" name="order_qty" value="<?php echo $quantity; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Total</td>
                    <td>
                        <input type="number" name="order_total" value="<?php echo $order_total; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Order Date</td>
                    <td>
                        <input type="datetime" name="order_date" value="<?php echo $order_date; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <select name="order_status">
                            <option value="Ordered" <?php if( $order_status === 'Ordered ' ){ echo 'selected'; }?>>Ordered</option>
                            <option value="On Delivery" <?php if( $order_status === 'On Delivery' ){ echo 'selected'; }?>>On Delivery</option>
                            <option value="Delivered"<?php if( $order_status === 'Delivered' ){ echo 'selected'; }?>>Delivered</option>
                            <option value="Cancelled"<?php if( $order_status === 'Cancelled' ){ echo 'selected'; }?>>Cancelled</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Customer Name</td>
                    <td>
                        <input type="text" name="order_customer_name" value="<?php echo $customer_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Contact</td>
                    <td>
                        <input type="text" name="order_customer_contact" value="<?php echo $customer_contact; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td>
                        <input type="email" name="order_customer_email" value="<?php echo $customer_email; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Address</td>
                    <td>
                        <textarea name="order_customer_address" cols="30" rows="5"><?php echo $customer_address; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="order_id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Order" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
        if( isset( $_POST['submit'] ) ) {
            $order_id_updated       = isset( $_POST['order_id'] ) ? $_POST['order_id'] : '';
            $order_name             = isset( $_POST['order_title'] ) ? $_POST['order_title'] : '';
            $order_price            = isset( $_POST['order_price'] ) ? $_POST['order_price'] : '';
            $order_qty              = isset( $_POST['order_qty'] ) ? $_POST['order_qty'] : '';
            $order_total            = isset( $_POST['order_total'] ) ? $_POST['order_total'] : '';
            $order_date             = isset( $_POST['order_date'] ) ? $_POST['order_date'] : '';
            $order_status           = isset( $_POST['order_status'] ) ? $_POST['order_status'] : '';
            $order_customer_name    = isset( $_POST['order_customer_name'] ) ? $_POST['order_customer_name'] : '';
            $order_customer_contact = isset( $_POST['order_customer_contact'] ) ? $_POST['order_customer_contact'] : '';
            $order_customer_email   = isset( $_POST['order_customer_email'] ) ? $_POST['order_customer_email'] : '';
            $order_customer_address = isset( $_POST['order_customer_address'] ) ? $_POST['order_customer_address'] : '';

            $sql2   = "UPDATE resto_order SET food = '{$order_name}', price = '{$order_price}', qty = '{$order_qty}', total = '{$order_total}', order_date = '{$order_date}', status = '{$order_status}', customer_name = '{$order_customer_name}', customer_email = '{$order_customer_email}', customer_address = '{$order_customer_address}' WHERE id = '{$order_id_updated}' ";
            $result2 = mysqli_query( $conn, $sql2 ); 
            if( $result2 ) {
                $_SESSION['update-order'] = '<div class="success">Order Update Successfully!</div>';
            } else {
                $_SESSION['update-order'] = '<div class="error">Failed To Update Order!</div>';

            }
            header('location:'.SITE_URL.'admin/manage-order.php');
        }
        ?>

    </div>
</div>

<?php include( $_SERVER['DOCUMENT_ROOT']."/admin/partials/footer.php"); ?>

