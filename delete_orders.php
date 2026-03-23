<?php
include("./pages/connection.php"); //connection to db
error_reporting(0);
session_start();

if(!isset($_SESSION['userData'])){
   header("location:pages/login.php");
   exit();
}

$userId = $_SESSION['userId'];
$orderId = $_GET['order_del'];

// sending query with userId check for security
mysqli_query($conn,"DELETE FROM orders WHERE ID = '$orderId' AND userId = '$userId'"); 
header("location:your_orders.php"); 

?>
