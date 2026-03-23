<?php
include('connection.php');
session_start();
?>

<!DOCTYPE html>
<php
session_start();
?>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PizzaZone</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="fontawsome/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css" >
   <link rel="stylesheet" href="css/logout.css" >


</head>
<body>
   
<!-- header section starts  -->

<header class="header">

   <section class="flex">
   <div class="logo"><a href="./index.php"><img src="images/logo.png"></a>
   </div>
      
      <nav class="navbar">

      
         
         <a href="index.php">HOME</a>
         <a href="menu.php">MENU</a>
         <a href="about.php">ABOUT</a>
         <a href="services.php">SERVICES</a>
         <a href="contact.php">CONTACT</a>
         <a href="gallery.php">GALLARY</a>
         <a href="review.php">REVIEW</a>
         <a href="faq.php">FAQ</a>
         
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <?php
            if (!isset($_SESSION['userData']) && empty($_SESSION['userData'])) {
                  ?>
                  <a class="test" href="./pages/login.php"><div id="user-btn" class="fas fa-user"></div></a>        
                  <?php
            } else {
                  ?>

                  <li class="logout">
                  <a href="pages/logout.php" class="btn12">
                     <span class="fa-solid fa-right-from-bracket"></span> Log out
                  </a>
                  </li>
                  <a><?php  echo "Welcome " .$_SESSION['username']; ?></a>
                  <?php
                  
            }
            ?>
            <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

<?php
            if (!isset($_SESSION['userData']) && empty($_SESSION['userData'])) {
                  ?>
                  <?php
            } else {
                  ?>
                   <a class="test" href="your_orders.php"><div class="fas fa-box"></div></a>        

               <?php   
                  
            }
            ?>
      <a href="cart.php"><div id="cart-btn" class="fas fa-shopping-cart"></span></div></a>

   </section>
</div>

