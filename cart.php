<?php
include("pages/connection.php");
?>
<?php

if(empty($_SESSION['userData'])) {
   session_start();
}

if(!isset($_SESSION['userData'])){
   header('location:pages/login.php');
   exit();
}

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
   header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Your Floral Order | FlowerZone</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="fontawsome/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/cart.css">

</head>
<body>
<div class="container">
<section class="shopping-cart">

   <h1 class="heading">Your Floral Order</h1>

   <table class="responsive-table">

      <thead>
         <th>preview</th>
         <th>bouquet</th>
         <th>price</th>
         <th>quantity</th>
         <th>subtotal</th>
         <th>action</th>
      </thead>

      <tbody>

         <?php 
         error_reporting(0);
         $userId = $_SESSION['userId'];

         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE userId='$userId'");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td data-label="preview"><img src="uploads/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td data-label="bouquet"><?php echo $fetch_cart['name']; ?></td>
            <td data-label="price">₹<?php echo number_format($fetch_cart['price']); ?>/-</td>
            <td data-label="quantity">
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                  <input type="submit" value="update" name="update_update_btn">
               </form>   
            </td>
            <td data-label="subtotal">₹<?php echo number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
            <td data-label="action"><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove bouquet from order?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
         </tr>
         <?php
           $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);  
            };
         };
         ?>
         <tr class="table-bottom">
            <td data-label="action"><a href="menu.php" class="option-btn" style="margin-top: 0;">explore more</a></td>
            <td colspan="3" data-label="total amount">total amount</td>
            <td data-label="total amount">₹<?php echo $grand_total; ?>/-</td>
            <td data-label="action"><a href="cart.php?delete_all" onclick="return confirm('clear entire order?');" class="delete-btn"> <i class="fas fa-trash"></i> clear all </a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">finalize order</a>
      <a href="menu.php" class="btn">Back To Collection</a>

   </div>

</section>

</div>
   
<!-- custom js file link  -->
<script type="module" src="js/script.js"></script>

</body>
</html>
