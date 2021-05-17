<?php
include( $_SERVER['DOCUMENT_ROOT']."/config/constants.php" );
/**
 * Get The ID Of The Admin For Deletion
 */
$id = $_REQUEST['id'];

/**
 * SQL Query For Deletion Of The Admin
 */
$sql = "DELETE FROM resto_admin WHERE ID = {$id}";
$res = mysqli_query($conn, $sql);

if( $res ) {
    $_SESSION['delete'] = 'Admin Deleted Successfully';
} else {
    $_SESSION['delete'] = 'Failed To Delete, Please Try Again Later';
}

/**
 * Redirect To Manage Admin Page After Deletion(Show Success Message/Error Message)
 */
header('location:'.SITE_URL.'admin/manage-admin.php');