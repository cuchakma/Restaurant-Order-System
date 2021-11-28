<?php include( $_SERVER['DOCUMENT_ROOT']."/admin/partials/menu.php" ); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order</h1>
        <br /><br /><br />
        <?php 
            $updated_order = isset(  $_SESSION['update-order'] ) ?  $_SESSION['update-order'] : '';
            echo $updated_order;
            unset( $_SESSION['update-order'] );
        ?>
        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Food Name</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Customer Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>

            <?php 
                $sl = 1;
                $sql    = "SELECT * FROM resto_order ORDER BY id DESC";
                $result = mysqli_query( $conn, $sql );
                $rows   = mysqli_num_rows($result);
                if( $rows ) {
                    while( $row = mysqli_fetch_assoc( $result ) ) {
                        $id               = $row['id'];
                        $food_title       = isset( $row['food'] ) ?  $row['food'] : '';
                        $price            = isset( $row['price'] ) ? $row['price'] : '';
                        $qty              = isset( $row['qty'] ) ? $row['qty'] : '';
                        $total            = isset( $row['total'] ) ? $row['total'] : '';
                        $order_date       = isset( $row['order_date'] ) ? $row['order_date'] : '';
                        $status           = isset( $row['status'] ) ? $row['status'] : '' ;
                        $cutsomer_name    = isset( $row['customer_name'] ) ? $row['customer_name'] : ''; 
                        $cutsomer_contact = isset( $row['customer_contact'] ) ? $row['customer_contact'] : '';
                        $customer_email   = isset( $row['customer_email'] ) ? $row['customer_email'] : '';
                        $customer_address = isset( $row['customer_address'] ) ? $row['customer_address'] : '';

                        ?>
                            <tr>
                                <td><?php echo $sl++; ?></td>
                                <td><?php echo $food_title; ?></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo $qty; ?></td>
                                <td><?php echo $total;?></td>
                                <td><?php echo $order_date; ?></td>
                                <td><?php echo $status; ?></td>
                                <td><?php echo $cutsomer_name; ?></td>
                                <td><?php echo $cutsomer_contact; ?></td>
                                <td><?php echo $customer_email; ?></td>
                                <td><?php echo $customer_address; ?></td>
                                <td>
                                    <a href="<?php echo SITE_URL.'admin/update-order.php?order_id='.$id; ?>" class="btn-secondary">Update Admin</a>
                                </td>
                            </tr>

                        <?php
                    }
                } else {
                    echo '<tr><td colspan = "12" class="error">No Orders Found</td></tr>';
                }
            ?>
        </table>
    </div>
</div>

<?php include( $_SERVER['DOCUMENT_ROOT']."/admin/partials/footer.php"); ?>