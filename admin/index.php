<?php include 'partials/menu.php'; ?>

        <!-- Main Content Section-->
        <div class ="main-content">
            <div class="wrapper">
                <h1>DASHBOARD</h1>
                <br><br>
                <?php 
                    $show_logged_message = isset( $_SESSION['login'] ) ?  $_SESSION['login'] : '';
                    echo $show_logged_message;
                    unset( $_SESSION['login'] );
                ?>
                <br><br>
                <div class="col-4 text-center">
                    <h1>5</h1>
                    <br/>
                    Categories
                </div>

                <div class="col-4 text-center">
                    <h1>5</h1>
                    <br/>
                    Categories
                </div>

                <div class="col-4 text-center">
                    <h1>5</h1>
                    <br/>
                    Categories
                </div>

                <div class="col-4 text-center">
                    <h1>5</h1>
                    <br/>
                    Categories
                </div>

                <div class="clearfix">
                </div>
            </div>
        </div>
        <!-- Main Content Section-->
        
<?php include 'partials/footer.php'; ?>       