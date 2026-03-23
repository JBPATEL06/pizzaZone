<?php
include("./pages/connection.php"); //connection to db
error_reporting(0);
session_start();


// sending query
mysqli_query($conn,"DELETE FROM orders WHERE ID = '".$_GET['order_del']."'"); 
header("location:your_orders.php"); 

?>
