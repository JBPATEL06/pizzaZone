<!DOCTYPE html>
<html lang="en">
<?php
include("connection.php");
session_start();

if(isset($_POST['submit'])) {
    $site_name = mysqli_real_escape_string($conn, $_POST['site_name']);
    $footer_text = mysqli_real_escape_string($conn, $_POST['footer_text']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $hours = mysqli_real_escape_string($conn, $_POST['hours']);
    
    mysqli_query($conn, "UPDATE site_settings SET setting_value = '$site_name' WHERE setting_key = 'site_name'");
    mysqli_query($conn, "UPDATE site_settings SET setting_value = '$footer_text' WHERE setting_key = 'footer_text'");
    mysqli_query($conn, "UPDATE site_settings SET setting_value = '$phone' WHERE setting_key = 'phone'");
    mysqli_query($conn, "UPDATE site_settings SET setting_value = '$email' WHERE setting_key = 'email'");
    mysqli_query($conn, "UPDATE site_settings SET setting_value = '$address' WHERE setting_key = 'address'");
    mysqli_query($conn, "UPDATE site_settings SET setting_value = '$hours' WHERE setting_key = 'hours'");
    
    if(!empty($_FILES['logo']['name'])) {
        $logo_name = $_FILES['logo']['name'];
        $logo_tmp_name = $_FILES['logo']['tmp_name'];
        $logo_folder = '../images/'.$logo_name;
        
        if(move_uploaded_file($logo_tmp_name, $logo_folder)) {
            mysqli_query($conn, "UPDATE site_settings SET setting_value = '$logo_name' WHERE setting_key = 'logo'");
        }
    }
    $message[] = 'Settings updated successfully!';
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Site Settings</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../fontawsome/all.min.css">
</head>
<body class="fix-header">
    <div id="main-wrapper">
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php">
                        <span><img src="images/<?php echo get_setting('logo', 'logo.png'); ?>" alt="homepage" class="dark-logo" style="max-height:40px;" /></span>
                    </a>
                </div>
            </nav>
        </div>
        <div class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-label">Home</li>
                        <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
                        <li class="nav-label">Log</li>
                        <li> <a href="all_users.php"><span><i class="fa fa-user"></i></span><span>Users</span></a></li>
                        <li> <a href="all_menu.php"><span><i class="fa fa-cutlery"></i></span><span>Menu</span></a></li>
                        <li> <a href="all_orders.php"><span><i class="fa fa-shopping-cart"></i></span><span>Orders</span></a></li>
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
                        <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row" id="contact-info">
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Global Site Settings</h4>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <?php if(isset($message)) { foreach($message as $msg) { echo '<div class="alert alert-success">'.$msg.'</div>'; } } ?>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Site Name</label>
                                                    <input type="text" name="site_name" value="<?php echo get_setting('site_name'); ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Site Logo</label>
                                                    <input type="file" name="logo" class="form-control">
                                                    <small>Current Logo: <?php echo get_setting('logo'); ?></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Phone Number</label>
                                                    <input type="text" name="phone" value="<?php echo get_setting('phone'); ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email Address</label>
                                                    <input type="text" name="email" value="<?php echo get_setting('email'); ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Our Address</label>
                                                    <input type="text" name="address" value="<?php echo get_setting('address'); ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Opening Hours</label>
                                                    <input type="text" name="hours" value="<?php echo get_setting('hours'); ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Footer Text / Credit</label>
                                                    <textarea name="footer_text" class="form-control" rows="3"><?php echo get_setting('footer_text'); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" name="submit" class="btn btn-success" value="Save Settings">
                                        <a href="dashboard.php" class="btn btn-inverse">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer"> © 2026 FlowerZone Admin </footer>
        </div>
    </div>
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/custom.min.js"></script>
</body>
</html>
