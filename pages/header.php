<?php
include('connection.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo get_setting('site_name', 'FlowerZone'); ?> | Premium Bouquets</title>

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
   <div class="logo"><a href="./index.php"><img src="images/<?php echo get_setting('logo', 'logo.png'); ?>" alt="<?php echo get_setting('site_name', 'FlowerZone'); ?> Logo"></a>
   </div>
      
      <nav class="navbar">

      
         
         <a href="index.php">HOME</a>
         <a href="menu.php">COLLECTION</a>
         <a href="about.php">OUR STORY</a>
         <a href="services.php">SERVICES</a>
         <a href="contact.php">CONTACT</a>
         <a href="gallery.php">GALLERY</a>
         <a href="review.php">REVIEWS</a>
         <a href="faq.php">FAQ</a>
         
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <?php
            $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
            $row_count = mysqli_num_rows($select_rows);

            if (!isset($_SESSION['userData']) || empty($_SESSION['userData'])) {
                echo '<a href="./pages/login.php" class="test"><div class="fas fa-user"></div></a>';
            } else {
                // Logged in icons
                echo '<a href="cart.php" class="test"><div class="fas fa-shopping-cart"></div><span>('.$row_count.')</span></a>';
                echo '<a href="your_orders.php" class="test"><div class="fas fa-box"></div></a>';
                echo '<a href="profile.php" class="test"><div class="fas fa-user"></div></a>';
                echo '<a href="pages/logout.php" class="test"><div class="fas fa-right-from-bracket"></div></a>';
            }
         ?>
      </div>

   </section>
</header>
