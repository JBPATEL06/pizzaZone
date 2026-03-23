<?php
@include 'pages/connection.php';
session_start();

if(!isset($_SESSION['userData'])){
   header('location:pages/login.php');
   exit();
}

if(isset($_POST['order_btn'])){
   $userId = $_SESSION['userId'];
   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $country = $_POST['country'];
   $pin_code = $_POST['pin_code'];
   

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE userId='$userId'");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = ($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `orders`(name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price,userId) VALUES('$name','$number','$email','$method','$flat','$street','$city','$state','$country','$pin_code','$total_product','$price_total','$userId')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for choosing FlowerZone!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : ₹".$price_total."/-  </span>
         </div>
         <div class='customer-details'>
            <p> name : <span>".$name."</span> </p>
            <p> contact : <span>".$number."</span> </p>
            <p> email : <span>".$email."</span> </p>
            <p> delivery address : <span>".$flat.", ".$street.", ".$city.", ".$state.", ".$country." - ".$pin_code."</span> </p>
            <p> payment mode : <span>".$method."</span> </p>
            <p>(*pay on delivery*)</p>
         </div>
            <a href='menu.php' class='btn'>explore more bouquets</a>
         </div>
      </div>
      ";
      
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Secure Checkout | FlowerZone</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="./fontawsome/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/cart.css">

</head>
<body>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">Complete Your Floral Order</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $userId = $_SESSION['userId'];
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE userId='$userId'") or die('query failed');
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your floral order is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> total amount : ₹<?= $grand_total; ?>/- </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="number" placeholder="enter your number" name="number" required>
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder="enter your email" name="email" required>
         </div>
         <div class="inputBox">
            <span>payment method</span>
            <select name="method">
               <option value="cash on delivery" selected>cash on delivery</option>
               <option value="credit card">credit card</option>
               <option value="paypal">paypal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>address line 1</span>
            <input type="text" placeholder="e.g. flat no." name="flat" required>
         </div>
         <div class="inputBox">
            <span>address line 2</span>
            <input type="text" placeholder="e.g. street name" name="street" required>
         </div>
         <div class="inputBox">
            <span>city</span>
            <input type="text" placeholder="e.g. mumbai" name="city" required>
         </div>
         <div class="inputBox">
            <span>state</span>
            <input type="text" placeholder="e.g. maharashtra" name="state" required>
         </div>
         <div class="inputBox">
            <span>country</span>
            <input type="text" placeholder="e.g. india" name="country" required>
         </div>
         <div class="inputBox">
            <span>pin code</span>
            <input type="text" placeholder="e.g. 123456" name="pin_code" required>
         </div>
      </div>
      <input type="submit" value="place order" name="order_btn" class="btn">
   </form>

</section>

</div>

<!-- custom js file link  -->
<script type="module" src="js/script.js"></script>
   
</body>
</html>