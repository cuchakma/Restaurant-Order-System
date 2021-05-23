<?php include "../config/constants.php"; ?>

<html>
    <head>
        <title>Login Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>  
        <div class="login">
            <h1 class="text-center">Login</h1><br><br>
            <?php 
                $show_logged_message = isset( $_SESSION['login'] ) ?  $_SESSION['login'] : '';
                echo $show_logged_message;
                unset( $_SESSION['login'] );

                $unauthorized_login_message = isset( $_SESSION['no-login-message'] ) ? $_SESSION['no-login-message'] : '';
                echo $unauthorized_login_message;
                unset( $_SESSION['no-login-message'] );
            ?>
            <br>
            <br>
                <form action="" method="POST" class="" style="">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" placeholder="Enter Username" class="form-input"><br><br>

                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" placeholder="Enter Password" class="form-input"><br><br>
                    <input type="submit" name="submit" value="Login" class="btn-submit">
                </form><br><br>
            <p class="text-center">Created By <a href="#">Cupid Chakma</a></p>
        </div>
    </body>
</html>

<?php

if( isset($_POST['submit']) ) {

    /**
     * Username And Password Datas
     */
    $username = isset( $_POST['username'] ) ? $_POST['username'] : '';
    $password = isset( $_POST['password'] ) ? md5($_POST['password']) : '';

    /**
     * Check For Existance Of The Datas In The Database
     */
    $sql = "SELECT * FROM resto_admin WHERE user_name = '{$username}' AND password = '{$password}' ";
    // echo $sql;
    // die();
    
    /**
     * Insert And Perform SQL Query In Database And Get The Results 
     */
    $result = mysqli_query( $conn, $sql );
    $count = mysqli_num_rows( $result );
    
    if( $count ) {

        /**
         * Logged In Message Stored Inside A Session Variable(Successful)
         */
        $_SESSION['login'] = '<div class="success">Logged In Successfully!</div>';

        /**
         * Check Wether A User Is Logged In Or Not
         */
        $_SESSION['user'] = $username;

        /**
         * Redirect After Logged In
         */
        header("location: http://localhost/Restaurant-Order-System/");

    } else {  

        /**
         * Logged In Message Stored Inside A Session Variable(Failed)
         */
        $_SESSION['login'] = '<div class="error text-center">Login Failed Username Or Password Did Not Match!</div>';

        /**
         * Redirect After Logged In
         */
        header("location:http://localhost/Restaurant-Order-System/admin/login.php");
    }
}