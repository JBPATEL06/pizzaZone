<?php
include("connection.php");
session_start();

if(isset($_POST['add'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $subtitle = mysqli_real_escape_string($conn, $_POST['subtitle']);
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $folder = '../images/'.$image;
    
    if(move_uploaded_file($tmp_name, $folder)) {
        mysqli_query($conn, "INSERT INTO slider_content (title, subtitle, image) VALUES ('$title', '$subtitle', '$image')");
        $message[] = 'Slide added successfully!';
        header('location:manage_slider.php');
        exit;
    }
}

if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $result = mysqli_query($conn, "DELETE FROM slider_content WHERE id = '$id'");
    if (!$result) {
        die("Delete failed: " . mysqli_error($conn));
    }
    header('location:manage_slider.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Slider</title>
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
                <div class="row">
                    <div class="col-lg-5">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Add New Slide</h4>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Slide Title (HTML supported)">
                                    </div>
                                    <div class="form-group">
                                        <label>Subtitle</label>
                                        <input type="text" name="subtitle" class="form-control" placeholder="Slide Subtitle">
                                    </div>
                                    <div class="form-group">
                                        <label>Slide Image</label>
                                        <input type="file" name="image" class="form-control" required>
                                    </div>
                                    <input type="submit" name="add" class="btn btn-success" value="Add Slide">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Current Slides</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $query = mysqli_query($conn, "SELECT * FROM slider_content");
                                                while($row = mysqli_fetch_assoc($query)) {
                                                    echo '<tr>
                                                        <td><img src="../images/'.$row['image'].'" style="width:100px;"></td>
                                                        <td>'.$row['title'].'</td>
                                                        <td><a href="manage_slider.php?delete='.$row['id'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Delete slide?\')"><i class="fa fa-trash"></i></a></td>
                                                    </tr>';
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
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
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
</body>
</html>
