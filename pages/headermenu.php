<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>FlowerZone</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="../fontawsome/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css" >

</head>
<body>
   
<!-- header section starts  -->

<header class="header">

   <section class="flex">
   <div class="logo"><a href="../index.php"><img src="../images/<?php echo get_setting('logo', 'logo.png'); ?>"></a>
   </div>
      <nav class="navbar">
         
         <a href="../index.php">Home</a>
         <a href="../menu.php">Menu</a>
         <a href="../about.php">About</a>
         <a href="../services.php">Services</a>
         <a href="../contact.php">Contact</a>
         <a href="../gallery.php">GALLARY</a>
         <a href="../review.php">Review</a>
         <a href="../faq.php">FAQ</a>
         
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <a href="../pages/login.php"><div id="user-btn" class="fas fa-user"></div></a>
         <?php
            if (!isset($_SESSION['userData']) && empty($_SESSION['userData'])) {
                  ?>
                  <?php
            } else {
                  ?>
                   <a class="test" href=""><div class="fas fa-box"></div></a>        
                   <a href="../cart.php"><div id="cart-btn" class="fas fa-shopping-cart"></div></a>
               <?php   
                  
            }
            ?>
      </div>

   </section>

</header>
