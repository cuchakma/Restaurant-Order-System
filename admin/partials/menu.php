<?php 
    include( $_SERVER['DOCUMENT_ROOT']."/config/constants.php" ); 
    include( $_SERVER['DOCUMENT_ROOT']."/admin/partials/login-check.php" ); 
?>


<html>
    <head>
        <title>Food Order Management Website</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <!-- Menu Section-->
        <div class ="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="manage-admin.php">Admin</a></li>
                    <li><a href="manage-category.php">Category</a></li>
                    <li><a href="manage-food.php">Food</a></li>
                    <li><a href="manage-order.php">Order</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <!-- Menu Section-->
