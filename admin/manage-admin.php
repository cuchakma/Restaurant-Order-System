<?php include( $_SERVER['DOCUMENT_ROOT']."/admin/partials/menu.php" ); ?>

        <!-- Main Content Section-->
            <div class ="main-content">
                <div class="wrapper">
                    <h1>Manage Admin</h1>
                   <br>
                   <br>

                   <?php 
                        $sl = 1;
                        $message = isset( $_SESSION['add'] ) ?  $_SESSION['add'] : '';
                        echo $message;

                        /**
                         * Remove Session
                         */
                        unset( $_SESSION['add'] );

                        $delete = isset( $_SESSION['delete'] ) ? $_SESSION['delete'] : '';
                        echo $delete;

                        /**
                         * Remove Session
                         */
                        unset( $_SESSION['delete'] );
                   ?>
                   <br>
                   <br>
                        <a href="add-admin.php" class="btn-primary">Add Admin</a>
                    <br /><br /><br />

                    <table class="tbl-full">
                        <tr>
                            <th>S.N</th>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Actions</th>
                        </tr>

                        <?php
                            $sql = "SELECT * FROM `resto_admin`";
                            $res = mysqli_query($conn, $sql);
                            if( $res ) {
                                
                                while( $rows = mysqli_fetch_assoc($res) ) {
                                    $id = $rows['ID'];
                                    $fullname = $rows['full_name'];
                                    $username = $rows['user_name'];

                                    ?>
                                         <tr>
                                            <td><?php echo $sl++; ?></td>
                                            <td><?php echo $fullname; ?></td>
                                            <td><?php echo $username; ?></td>
                                            <td>
                                                <a href="#" class="btn-secondary">Update Admin</a>
                                                <a href="<?php echo SITE_URL.'admin/delete-admin.php?id='.$id; ?>" class="btn-danger">Delete Admin</a>
                                            <td/>
                                        </tr>
                                    <?php
                                }

                            }
                        ?>
                    </table>
                </div>
            </div>
        <!-- Main Content Section-->
        
<?php include 'partials/footer.php'; ?>