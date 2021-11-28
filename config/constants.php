<?php
/**
 * Session Start
 */
session_start();

define('SITE_URL', 'http://restaurant-system.test/');
define('HOST', "localhost");
define('USER', "root");
define('PASSWORD', "01906759899");
define('DB_NAME', "food-resto");

$conn = new mysqli(HOST, USER, PASSWORD, DB_NAME);

