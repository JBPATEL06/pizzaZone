<?php
@include 'pages/connection.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['userData'])){
   header('location:pages/login.php');
   exit();
}

$userId = $_SESSION['userId'];
$message = [];

if(isset($_POST['update_profile'])){
   $number = mysqli_real_escape_string($conn, $_POST['number']);
   $flat = mysqli_real_escape_string($conn, $_POST['flat']);
   $street = mysqli_real_escape_string($conn, $_POST['street']);
   $city = mysqli_real_escape_string($conn, $_POST['city']);
   $state = mysqli_real_escape_string($conn, $_POST['state']);
   $pin_code = mysqli_real_escape_string($conn, $_POST['pin_code']);
   
   $update_query = mysqli_query($conn, "UPDATE `user` SET number='$number', flat='$flat', street='$street', city='$city', state='$state', pin_code='$pin_code' WHERE ID='$userId'") or die('query failed');
   if($update_query){
      $message[] = 'Profile updated successfully!';
   }
}

$user_query = mysqli_query($conn, "SELECT * FROM `user` WHERE ID = '$userId'") or die('query failed');
$user_data = mysqli_fetch_assoc($user_query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo get_setting('site_name', 'FlowerZone'); ?> | My Profile</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="./fontawsome/all.min.css">
   
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/cart.css">
   <style>
       .profile-form { padding-top: 15rem; min-height: 80vh; }
       .profile-controls { display: flex; justify-content: center; margin-top: 2rem; gap: 2rem; }
   </style>
</head>
<body>

<?php include("pages/header.php"); ?>

<div class="container">
<section class="checkout-form profile-form">

   <h1 class="heading">My Profile</h1>

   <?php
   if(!empty($message)){
      foreach($message as $msg){
         echo '
         <div class="message" style="margin-bottom: 2rem;">
            <span>'.$msg.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
   ?>

   <form action="" method="post">
      <div class="flex">
         <div class="inputBox">
            <span>First Name</span>
            <input type="text" value="<?= htmlspecialchars($user_data['firstName']) ?>" readonly style="background:var(--light-bg); cursor:not-allowed;">
         </div>
         <div class="inputBox">
            <span>Last Name</span>
            <input type="text" value="<?= htmlspecialchars($user_data['lastName']) ?>" readonly style="background:var(--light-bg); cursor:not-allowed;">
         </div>
         <div class="inputBox">
            <span>Email</span>
            <input type="email" value="<?= htmlspecialchars($user_data['emailId']) ?>" readonly style="background:var(--light-bg); cursor:not-allowed;">
         </div>
         <div class="inputBox">
            <span>Phone Number</span>
            <input type="number" placeholder="Enter your contact number" name="number" value="<?= htmlspecialchars($user_data['number']) ?>" required>
         </div>
         <div class="inputBox">
            <span>Address Line 1 (Flat, House no.)</span>
            <input type="text" placeholder="e.g. Flat No. 12" name="flat" value="<?= htmlspecialchars($user_data['flat']) ?>" required>
         </div>
         <div class="inputBox">
            <span>Address Line 2 (Street, Area)</span>
            <input type="text" placeholder="e.g. Main Street" name="street" value="<?= htmlspecialchars($user_data['street']) ?>" required>
         </div>
         <div class="inputBox">
            <span>City</span>
            <input type="text" placeholder="e.g. Mumbai" name="city" value="<?= htmlspecialchars($user_data['city']) ?>" required>
         </div>
         <div class="inputBox">
            <span>State</span>
            <input type="text" placeholder="e.g. Maharashtra" name="state" value="<?= htmlspecialchars($user_data['state']) ?>" required>
         </div>
         <div class="inputBox">
            <span>Pincode</span>
            <input type="number" placeholder="e.g. 400001" name="pin_code" value="<?= htmlspecialchars($user_data['pin_code']) ?>" required>
         </div>
         <div class="inputBox">
            <span>Country</span>
            <input type="text" value="India" name="country" readonly style="background:var(--light-bg); cursor:not-allowed;">
         </div>
      </div>
      <div class="profile-controls">
         <input type="submit" value="Save Profile" name="update_profile" class="btn" style="width: auto; padding: 1rem 3rem;">
         <a href="your_orders.php" class="option-btn" style="width: auto; padding: 1rem 3rem;">My Orders</a>
      </div>
   </form>

</section>
</div>

<?php include("pages/footer.php"); ?>
</body>
</html>
