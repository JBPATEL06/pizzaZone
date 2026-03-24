<!DOCTYPE html>
<html lang="en">
<?php
//error_reporting(0);
session_start();

@include 'connection.php';

$id = $_GET['edit'];

if(isset($_POST['update_product'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'images/'.$product_image;

   if(empty($product_name) || empty($product_price)|| empty($product_image)){
      $message[] = 'please fill out all!';    
   }
   else{

      $update_data = "UPDATE products SET name='$product_name', price='$product_price', image='$product_image' WHERE id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         header('location:all_menu.php');
         echo "UPDATATION SUCCESSFULL";
      }else{
         $$message[] = 'please fill out all!'; 
      }

   }
}

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Update Menu</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../fontawsome/all.min.css">

   
</head>

<body class="fix-header">
 
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>

    <div id="main-wrapper">
    
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php">
                        
                    <span><img src="images/<?php echo get_setting('logo', 'logo.png'); ?>" alt="homepage" class="dark-logo" style="max-height:40px;" /></span>
                    </a>
                </div>
                <div class="navbar-collapse">
               
                    <ul class="navbar-nav mr-auto mt-md-0">
                    </ul>
                 
                    <ul class="navbar-nav my-lg-0">
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
                         <li class="nav-label">Site Content</li>
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-file-text"></i><span class="hide-menu">Pages</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="manage_content.php?page=homepage">Home Page</a></li>
                                <li><a href="manage_content.php?page=ourstory">Our Story</a></li>
                                <li><a href="manage_content.php?page=services">Services</a></li>
                                <li><a href="manage_content.php?page=gallery">Gallery</a></li>
                                <li><a href="manage_content.php?page=review">Testimonials</a></li>
                                <li><a href="manage_content.php?page=faq">FAQs</a></li>
                            </ul>
                        </li>
                        <li class="nav-label">Settings</li>
                        <li> <a href="settings.php"><i class="fa fa-gear"></i><span>Global Settings</span></a></li>
                        <li> <a href="manage_slider.php"><i class="fa fa-image"></i><span>Homepage Slider</span></a></li>
                        <li> <a href="settings.php#contact-info"><i class="fa fa-phone"></i><span>Contact Info</span></a></li>
                    </ul>
                </nav>
                
            </div>
           
        </div>
      
        <div class="page-wrapper">
        
            
          
            <div class="container-fluid">
                         <div class="card-body">
                                <form action='' method='post'  enctype="multipart/form-data">
                                    <div class="form-body">
                                        <?php $qml ="SELECT * FROM products WHERE id = '$id'";
													$rest=mysqli_query($conn, $qml); 
													$roww=mysqli_fetch_array($rest);
														?>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Bouquet Name</label>
                                                    <input type="text" name="product_name" value="<?php echo $roww['name'];?>" class="form-control" placeholder="Morzirella">
                                                   </div>
                                            </div>
                                
                                            
                                        </div>
                                 
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Price </label>
                                                    <input type="text" name="product_price" value="<?php echo $roww['price'];?>"  class="form-control" placeholder="₹">
                                                   </div>
                                            </div>
                                 
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Image</label>
                                                    <input type="file" name="product_image"  id="lastName" class="form-control form-control-danger" placeholder="12n">
                                                    </div>
                                            </div>
                                        </div>
                                    
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" name="update_product" class="btn btn-primary" value="Save"> 
                                        <a href="all_menu.php" class="btn btn-inverse">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

					<footer class="footer"> © 2026 FlowerZone Admin </footer>
					
                </div>
             
            </div>

        </div>
       
    </div>
  
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>

</body>

</html>
