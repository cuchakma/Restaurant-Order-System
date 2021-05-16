<?php
/**
 * Session Start
 */
session_start();

define('SITE_URL', 'http://restaurant-system.test/');
define('HOST', "localhost");
define('USER', "debian-sys-maint");
define('PASSWORD', "dYy3AmKg4rSh8qPJ");
define('DB_NAME', "food-resto");

$conn = new mysqli(HOST, USER, PASSWORD, DB_NAME);

