<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $conn = mysqli_connect("localhost", "root", "", "student");
    if (!$conn) {
            die("Error connecting to database: " . mysqli_connect_error());
    }
    if (!defined('ROOT_PATH')) {
        define ('ROOT_PATH', realpath(dirname(__FILE__)));
    }    
    if (!defined('BASE_URL')) {
        define('BASE_URL', 'http://localhost/Machine-Test-Task-main/');
    }
?>