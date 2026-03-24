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
   
   $check_user = mysqli_query($conn, "SELECT street FROM user WHERE ID='$userId'");
   $u_row = mysqli_fetch_assoc($check_user);
   if (empty($u_row['street'])) {
       mysqli_query($conn, "UPDATE user SET number='$number', flat='$flat', street='$street', city='$city', state='$state', pin_code='$pin_code' WHERE ID='$userId'");
   }

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

    <?php
       $user_id = $_SESSION['userId'];
       $user_fetch = mysqli_query($conn, "SELECT * FROM user WHERE ID = '$user_id'");
       $user_data = mysqli_fetch_assoc($user_fetch);
       
       if (!empty($user_data['street'])) {
           // User has a saved address
    ?>
       <div class="user-details-summary" style="padding: 2rem; background: var(--white); border-radius: 1rem; margin-bottom: 2rem; border: var(--border);">
          <h3 style="font-size: 2rem; margin-bottom: 1.5rem; color: var(--black);">Delivery Details</h3>
          <p style="font-size: 1.6rem; color: var(--light-color); line-height: 2;"><strong style="color:var(--black);">Name:</strong> <?= htmlspecialchars($user_data['firstName'] . ' ' . $user_data['lastName']) ?></p>
          <p style="font-size: 1.6rem; color: var(--light-color); line-height: 2;"><strong style="color:var(--black);">Phone:</strong> <?= htmlspecialchars($user_data['number']) ?></p>
          <p style="font-size: 1.6rem; color: var(--light-color); line-height: 2;"><strong style="color:var(--black);">Email:</strong> <?= htmlspecialchars($user_data['emailId']) ?></p>
          <p style="font-size: 1.6rem; color: var(--light-color); line-height: 2;"><strong style="color:var(--black);">Address:</strong> <?= htmlspecialchars($user_data['flat']) ?>, <?= htmlspecialchars($user_data['street']) ?>, <?= htmlspecialchars($user_data['city']) ?>, <?= htmlspecialchars($user_data['state']) ?>, <?= htmlspecialchars($user_data['country']) ?> - <?= htmlspecialchars($user_data['pin_code']) ?></p>
          <p style="font-size: 1.6rem; color: var(--light-color); line-height: 2; margin-bottom: 1rem;"><strong style="color:var(--black);">Payment Method:</strong> Cash on Delivery</p>
          <p><a href="profile.php" style="color: var(--primary); text-decoration: underline; font-size: 1.5rem;">Edit details in Profile</a></p>
          
          <input type="hidden" name="name" value="<?= htmlspecialchars($user_data['firstName'] . ' ' . $user_data['lastName']) ?>">
          <input type="hidden" name="number" value="<?= htmlspecialchars($user_data['number']) ?>">
          <input type="hidden" name="email" value="<?= htmlspecialchars($user_data['emailId']) ?>">
          <input type="hidden" name="flat" value="<?= htmlspecialchars($user_data['flat']) ?>">
          <input type="hidden" name="street" value="<?= htmlspecialchars($user_data['street']) ?>">
          <input type="hidden" name="city" value="<?= htmlspecialchars($user_data['city']) ?>">
          <input type="hidden" name="state" value="<?= htmlspecialchars($user_data['state']) ?>">
          <input type="hidden" name="country" value="India">
          <input type="hidden" name="pin_code" value="<?= htmlspecialchars($user_data['pin_code']) ?>">
          <input type="hidden" name="method" value="cash on delivery">
       </div>
    <?php } else { ?>
      <div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="enter your name" name="name" value="<?= htmlspecialchars($user_data['firstName'] . ' ' . $user_data['lastName']) ?>" required readonly style="background:var(--light-bg); cursor:not-allowed;">
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="number" placeholder="enter your number" name="number" required>
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder="enter your email" name="email" value="<?= htmlspecialchars($user_data['emailId']) ?>" required readonly style="background:var(--light-bg); cursor:not-allowed;">
         </div>
         <div class="inputBox">
            <span>payment method</span>
            <input type="text" value="Cash on Delivery" readonly style="background:var(--light-bg); cursor:not-allowed;">
            <input type="hidden" name="method" value="cash on delivery">
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
            <input type="text" value="India" name="country" readonly style="background:var(--light-bg); cursor:not-allowed;">
         </div>
         <div class="inputBox">
            <span>pin code</span>
            <input type="text" placeholder="e.g. 123456" name="pin_code" required>
         </div>
      </div>
    <?php } ?>
      <input type="submit" value="place order" name="order_btn" class="btn">
   </form>

</section>

</div>

<!-- custom js file link  -->
<script type="module" src="js/script.js"></script>
   
</body>
</html>