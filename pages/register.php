<?php
include("headermenu.php")
?>


<?php
include("connection.php");
if($_POST)
{
   $firstName=$_POST['firstName'];
   $lastName=$_POST['lastName'];
   $emailId=$_POST['emailId'];
   $password=$_POST['password'];
   $confirmPassword=$_POST['confirmPassword'];

    $query    = mysqli_query($conn, "SELECT * FROM user WHERE emailId='$emailId'");
    $num      = mysqli_fetch_array($query);
	
    if ($num > 0) {
      echo "<script>alert('EMAIL IS ALREADY EXIST PLEASE LOGIN OR FORGET PASSWORD!!');</script>";
      echo "<script> window.location.href='login.php';</script>";
    } 
   else{

   $isPasswordMatch = true;
   if($password === $confirmPassword){
      $query="insert into user (firstName,lastName,emailId,password) values('$firstName','$lastName','$emailId','$password')";
      $chk=mysqli_query($conn,$query);
      if(!$chk) //query and connection check
      {
         die(mysqli_error($conn));
      }
      echo "<script>alert('Registration successfull. Please login');</script>";
      echo "<script> window.location.href='login.php';</script>";   }
   else{
        
      // $isPasswordMatch = false;
      echo '<script>alert("Password and Confirm Password does not match !!")</script>';
   }
  }
  
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
   <title>Register</title>

</head>
<body>

</script>
<link rel="stylesheet" href="../css/loginStyle.css"  type="text/css" media="all" />
<div class="wrapper fadeInDown"  style="background-image: url('../images/ban.png');">
  <div id="formContent" style="margin-top:5em;margin-bottom:5em;">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img style = "height: 75px;width: 75px;margin: 22px;" src="../images/register.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form action="" method="POST">
    <input type="hidden" />
      <input required type="text" class="fadeIn second" name="firstName" placeholder="First Name" required="">
      <input required type="text" class="fadeIn second" name="lastName" placeholder="Last Name" required="">
      <input required type="email" class="fadeIn second" name="emailId" placeholder="email id" required="">
      <input required onChange="checkConfirmPassword('first')" type="password" class="fadeIn second" name="password" placeholder="Password" required="">   
      <input required onChange="checkConfirmPassword('second')" type="password" class="fadeIn second" name="confirmPassword" placeholder="Confirm Password" required="">   
      
      <?php 
         if(isset($isPasswordMatch) &&  $isPasswordMatch == false) 
          echo "<span style='color:red;' id='errorMsg'>Password does not match</span>"
          
         ?> 
      <input type="submit" class="fadeIn fourth" value="Register">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      Already have an account ?
      <a class="underlineHover" href="../pages/login.php">Login</a>
    </div>

  </div>
</div>
</body>
</html>
<!-- 
<script type="text/javascript">
function checkConfirmPassword(type)
{

  var valueOne = document.getElementsByName('password');
  var valueTwo = document.getElementsByName('confirmPassword');
  var error = document.getElementById('errorMsg');

  if(valueOne[0] && valueTwo[0]){
  if(type === "first")
  {
    if(valueTwo[0].value){
      if(valueOne[0].value !== valueTwo[0].value)
    {
        error.style.display = 'block';
    }
    else
    {
      error.style.display = 'none';
    }
    }
  }
  else{
    if(valueOne[0].value !== valueTwo[0].value)
    {
        error.style.display = 'block';
    }
    else
    {
      error.style.display = 'none';
    }
  }
  }
}
</script> -->
   
