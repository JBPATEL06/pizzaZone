<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'pages/connection.php';
include 'pages/header.php';

if (isset($_POST['add_to_cart'])) {

   $message = [];

   if (!isset($_SESSION['userData']) || empty($_SESSION['userData'])) {
      $message[] = 'Please Login Before Add To Cart';
   } else {
      $product_name = $_POST['product_name'];
      $product_price = $_POST['product_price'];
      $product_image = $_POST['product_image'];
      $userId = $_SESSION['userId'];
      $product_quantity = 1;

      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND userId = '$userId'");

      if (mysqli_num_rows($select_cart) > 0) {
         $message[] = 'product already added to cart';
      } else {
         $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price,image, quantity,userId) VALUES('$product_name', '$product_price','$product_image', '1','$userId')");
         $message[] = 'product added to cart succesfully';
      }
   }
}
?>

<!-- custom css file link -->
<link rel="stylesheet" href="css/menu.css">

<?php
if (!empty($message)) {
   foreach ($message as $msg) {
      echo '<div class="message"><span>' . $msg . '</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   }
}
?>

<div class="container">
   <section class="products">
      <br><br><br><br><br><br>
      <h1 class="heading">Our Collection</h1>

      <div class="box-container">
         <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
         if (mysqli_num_rows($select_products) > 0) {
            while ($fetch_product = mysqli_fetch_assoc($select_products)) {
         ?>
         <form action="" method="post">
            <div class="box">
               <img src="images/<?php echo $fetch_product['image']; ?>" alt="">
               <h3><?php echo $fetch_product['name']; ?></h3>
               <div class="price">₹<?php echo $fetch_product['price']; ?>/-</div>
               <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
               <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
               <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
               <input type="submit" class="btn" value="add to floral order" name="add_to_cart">
            </div>
         </form>
         <?php
            }
         }
         ?>
      </div>
   </section>
</div>

<!-- custom js file link  -->
<script type="module" src="js/script.js"></script>

<?php
include("pages/footer.php");
?>