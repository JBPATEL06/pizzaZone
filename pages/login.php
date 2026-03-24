<?php
session_start();
//error_reporting(0);
include('connection.php');


// Code for User login
if(isset($_POST["submit"])){
    $emaiId=$_POST['email'];
    $password=$_POST['password'];
    $query    = mysqli_query($conn, "SELECT * FROM user WHERE emailId='$emaiId' and password='$password'");
    $num      = mysqli_fetch_array($query);
	
    if ($num > 0) {
      $_SESSION['userData'] =  $num['emailId'];
      $_SESSION['userId'] =  $num['ID'];
      $_SESSION['username'] =  $num['firstName']." ".$num['lastName'];
      
      header('location:../index.php');
    }else{
      echo "<script>alert('incorrect Email Or Password');</script>";
      echo "<script> window.location.href='login.php';</script>";   

    }
}


?>
<?php
include("headermenu.php");
?>

<link rel="stylesheet" href="../css/loginStyle.css" type="text/css" media="all" />
<div class="wrapper fadeInDown" style="background-image: url('../uploads/ban.png');">
  <div id="formContent" style="margin-top:5em;margin-bottom:5em;">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img style = "height: 75px;width: 75px;margin: 22px;" src="../uploads/user.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form method="post" action="login.php">
    <input type="hidden"/>
      <input type="email" id="login" class="fadeIn second" name="email" placeholder="login" required="">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required="">
      <input type="submit" class="fadeIn fourth" name="submit" value="login">
    </form>
    

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="forgot.php">Forgot Password?</a>
      <br/>
      Don't have an account?
      <a class="underlineHover" href="../pages/register.php">Register</a>
    </div>

  
  </div>
</div>
