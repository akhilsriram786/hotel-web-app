<?php
ini_set("display_errors",0);
error_reporting(E_ERROR);
global $con;
$con = mysqli_connect("127.0.0.1", "root", "", "hotel_booking_system");

if (!$con) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>