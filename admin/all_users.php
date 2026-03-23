<!DOCTYPE html>
<html lang="en">
    <?php
    include("connection.php");
if(isset($_GET['delete'])){
   
   $Id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM user WHERE ID = $Id");
   header('location:all_users.php');
 }
 ?>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>All Users</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">   
    <link rel="stylesheet" href="../fontawsome/all.min.css">


</head>
<body class="fix-header fix-sidebar">
 
 <div class="preloader">
     <svg class="circular" viewBox="25 25 50 50">
         <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
 </div>
 <div id="main-wrapper">

      <div class="header">
         <nav class="navbar top-navbar navbar-expand-md navbar-light">
         <div class="navbar-header">
                 <a class="navbar-brand" href="dashboard.php">
                     
                 <span><img src="images/logo.png" alt="homepage" class="dark-logo" /></span>
                 </a>
             </div>
             <div class="navbar-collapse">
         
                 <ul class="navbar-nav mr-auto mt-md-0">
           
                     
                  
                    
                 </ul>
         
                 <ul class="navbar-nav my-lg-0">

                     
   
                     <li class="nav-item dropdown">
                        
                         <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                             <ul>
                                 <li>
                                     <div class="drop-title">Notifications</div>
                                 </li>
                                 
                                 <li>
                                     <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                 </li>
                             </ul>
                         </div>
                     </li>
      
            
                     <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/usericn.png" alt="user" class="profile-pic" /></a>
                         <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                             <ul class="dropdown-user">
                                 <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                             </ul>
                         </div>
                     </li>
                 </ul>
             </div>
         </nav>
     </div>

     <div class="left-sidebar">
       
         <div class="scroll-sidebar">
     
             <nav class="sidebar-nav">
                <ul id="sidebarnav">
                     <li class="nav-devider"></li>
                     <li class="nav-label">Home</li>
                     <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
                     <li class="nav-label">Log</li>
                     <li> <a href="all_users.php">  <span><i class="fa fa-user f-s-20 "></i></span><span>Users</span></a></li>
                     
                   <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Menu</span></a>
                         <ul aria-expanded="false" class="collapse">
                             <li><a href="all_menu.php">All Menues</a></li>
                             <li><a href="add_menu.php">Add Menu</a></li>
                           
                             
                         </ul>
                     </li>
                      <li> <a href="all_orders.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Orders</span></a></li>
                      
                 </ul>
             </nav>
      
         </div>
      
     </div>
        <div class="page-wrapper">
     
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        
                        <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">All Users</h4>
                            </div>
                             
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped table-hover">
                                    <thead class="thead-dark">
                                            <tr>
                                                <th>ID</th>
                                                <th>FirstName</th>
                                                <th>LastName</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                   

  <?php
        $sql = "SELECT * FROM user"; 
        $result = mysqli_query($conn, $sql);
                            
            while($row=mysqli_fetch_assoc($result)) {
               $Id = $row['ID'];
               $firstName = $row['firstName'];
               $lastName = $row['lastName'];
               $email = $row['emailId'];

                   echo '<tr>
                      <td>'.$Id. '</td>
                       <td>'.$firstName. '</td>
                        <td>'.$lastName. '</td>
                       <td>' .$email. '</td>  
                       <td><a href="all_users.php?delete='.$row['ID'].'" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash" style="font-size:16px"></i></a> 
                       <a href="update_user.php?update='.$row['ID'].'" " class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="fa fa-edit"></i></a>
                      </td></tr>';
              }
   ?>
   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM user WHERE ID = '$Id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
 
											
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
						 </div>
                      
                            </div>
                        </div>
                    </div>
                </div>
             
            </div>
            <footer class="footer"> © Copyright @ 2022 PizzaZone By Rutvik Parmar & Nayan Jadav | All Rights Reserved! </footer>
           
        </div>
     
    </div>

  
   <?php

   ?>
<!-- The form -->

<!-- newUser Modal -->
  <?php
  if(isset($_POST['update'])){
    $update_data = "UPDATE user SET firstName='$firstName', lastName='$lastName',emailId='$email' WHERE id = '$id'";
    $upload = mysqli_query($conn, $update_data);
  }

?>

<?php
      }
?>
</body>

</html>

<script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
