<?php
include("connection.php");
session_start();

$active_page = (isset($_GET['page']) && !empty($_GET['page'])) ? $_GET['page'] : 'homepage';
$page_title = "Manage Site Content";
if($active_page) {
    if ($active_page == 'ourstory') $page_title = "Manage Our Story";
    else if ($active_page == 'homepage') $page_title = "Manage Home Page";
    else $page_title = "Manage " . ucfirst($active_page);
}

// Handle Add Content
if(isset($_POST['add'])) {
    $section = mysqli_real_escape_string($conn, $_POST['section']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $link = mysqli_real_escape_string($conn, $_POST['link']);
    if(!empty($image)) {
        // Insert first to get the ID
        mysqli_query($conn, "INSERT INTO site_content (section, title, description, image, link) VALUES ('$section', '$title', '$description', '', '$link')");
        $new_id = mysqli_insert_id($conn);
        
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $new_name = $new_id . '.' . $ext;
        $folder = '../uploads/'.$new_name;
        
        if(move_uploaded_file($tmp_name, $folder)) {
            mysqli_query($conn, "UPDATE site_content SET image = '$new_name' WHERE id = $new_id");
            
            $redirect_page = 'homepage';
            if (in_array($section, ['about_story', 'our_story_features'])) $redirect_page = 'ourstory';
            elseif (strpos($section, 'services') !== false) $redirect_page = 'services';
            elseif (strpos($section, 'gallery') !== false) $redirect_page = 'gallery';
            elseif (strpos($section, 'review') !== false) $redirect_page = 'review';
            elseif (strpos($section, 'faq') !== false) $redirect_page = 'faq';
            
            header('location:manage_content.php?page=' . $redirect_page);
            exit;
        }
    }
}

// Handle Update Content
if(isset($_POST['update'])) {
    $id = $_POST['edit_id'];
    $section = mysqli_real_escape_string($conn, $_POST['section']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $link = mysqli_real_escape_string($conn, $_POST['link']);
    $old_image = $_POST['old_image'];
    
    $image = $_FILES['image']['name'];
    if($image != '') {
        $tmp_name = $_FILES['image']['tmp_name'];
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $new_name = $id . '.' . $ext;
        $folder = '../uploads/'.$new_name;
        move_uploaded_file($tmp_name, $folder);
        $image = $new_name;
    } else {
        $image = $old_image;
    }
    mysqli_query($conn, "UPDATE site_content SET section='$section', title='$title', description='$description', image='$image', link='$link' WHERE id='$id'");

    $redirect_page = 'homepage';
    if (in_array($section, ['about_story', 'our_story_features'])) $redirect_page = 'ourstory';
    elseif (strpos($section, 'services') !== false) $redirect_page = 'services';
    elseif (strpos($section, 'gallery') !== false) $redirect_page = 'gallery';
    elseif (strpos($section, 'review') !== false) $redirect_page = 'review';
    elseif (strpos($section, 'faq') !== false) $redirect_page = 'faq';

    header('location:manage_content.php?page=' . $redirect_page);
    exit;
}

// Handle Delete Content
if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM site_content WHERE id = '$id'");
    $redirect = isset($_GET['page']) ? '?page='.$_GET['page'] : '';
    header('location:manage_content.php'.$redirect);
    exit;
}

// Fetch edit data if in edit mode
$edit_mode = false;
$edit_data = null;
if(isset($_GET['edit'])) {
    $edit_mode = true;
    $id = $_GET['edit'];
    $edit_query = mysqli_query($conn, "SELECT * FROM site_content WHERE id='$id'");
    if (mysqli_num_rows($edit_query) > 0) {
        $edit_data = mysqli_fetch_assoc($edit_query);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $page_title; ?></title>
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
                        <span><img src="../uploads/<?php echo get_setting('logo', 'logo.png'); ?>" alt="homepage" class="dark-logo" style="max-height:40px;" /></span>
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
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"><?php echo $active_page ? ($active_page == 'ourstory' ? 'Our Story' : ($active_page == 'homepage' ? 'Home Page' : ucfirst($active_page))) . " Management" : "Site Content Management"; ?></h3> </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"><?php echo $edit_mode ? 'Update' : 'Add'; ?> <?php echo $active_page ? ($active_page == 'ourstory' ? 'Our Story' : ($active_page == 'homepage' ? 'Home Page' : ucfirst($active_page))) : 'Content'; ?> Block</h4>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <?php if($edit_mode && $edit_data): ?>
                                      <input type="hidden" name="edit_id" value="<?php echo $edit_data['id']; ?>">
                                      <input type="hidden" name="old_image" value="<?php echo $edit_data['image']; ?>">
                                    <?php endif; ?>
                                    <?php
                                    $current_section = $edit_mode ? $edit_data['section'] : '';
                                    if ($edit_mode) {
                                        $sec = $edit_data['section'];
                                        $current_page = 'homepage';
                                        if (in_array($sec, ['about_story', 'our_story_features'])) $current_page = 'ourstory';
                                        elseif (strpos($sec, 'services') !== false) $current_page = 'services';
                                        elseif (strpos($sec, 'gallery') !== false) $current_page = 'gallery';
                                        elseif (strpos($sec, 'review') !== false) $current_page = 'review';
                                        elseif (strpos($sec, 'faq') !== false) $current_page = 'faq';
                                    } else {
                                        $current_page = $active_page;
                                    }
                                    ?>
                                    <div class="form-group">
                                        <label>Page</label>
                                        <select id="page_picker" class="form-control">
                                            <option value="homepage" <?php if($current_page=='homepage') echo 'selected'; ?>>Home Page</option>
                                            <option value="ourstory" <?php if($current_page=='ourstory') echo 'selected'; ?>>Our Story</option>
                                            <option value="services" <?php if($current_page=='services') echo 'selected'; ?>>Services</option>
                                            <option value="gallery"  <?php if($current_page=='gallery')  echo 'selected'; ?>>Gallery</option>
                                            <option value="review"   <?php if($current_page=='review')   echo 'selected'; ?>>Testimonials</option>
                                            <option value="faq"      <?php if($current_page=='faq')      echo 'selected'; ?>>FAQs</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Section / Item</label>
                                        <select name="section" id="section_picker" class="form-control">
                                            <!-- Populated by JS -->
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" value="<?php echo $edit_mode ? $edit_data['title'] : ''; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control" rows="3"><?php echo $edit_mode ? $edit_data['description'] : ''; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Link (URL)</label>
                                        <input type="text" name="link" class="form-control" value="<?php echo $edit_mode ? $edit_data['link'] : 'menu.php'; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="image" class="form-control" <?php echo $edit_mode ? '' : 'required'; ?>>
                                        <?php if($edit_mode && $edit_data['image']): ?>
                                            <img src="../uploads/<?php echo $edit_data['image']; ?>" style="width:100px; margin-top:10px;">
                                        <?php endif; ?>
                                    </div>
                                    <input type="submit" name="<?php echo $edit_mode ? 'update' : 'add'; ?>" class="btn btn-<?php echo $edit_mode ? 'warning' : 'success'; ?>" value="<?php echo $edit_mode ? 'Update Content' : 'Add Content'; ?>">
                                    <?php if($edit_mode): ?>
                                      <a href="manage_content.php<?php echo $active_page ? '?page='.$active_page : ''; ?>" class="btn btn-secondary">Cancel</a>
                                    <?php endif; ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Existing <?php echo $active_page ? ($active_page == 'ourstory' ? 'Our Story' : ($active_page == 'homepage' ? 'Home Page' : ucfirst($active_page))) : 'Content'; ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Section</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $page_sections_map = [
                                                    'homepage' => "('banner', 'popular', 'about')",
                                                    'ourstory' => "('about_story', 'our_story_features')",
                                                    'services' => "('services', 'services_2', 'services_3')",
                                                    'gallery'  => "('gallery', 'gallery_2', 'gallery_3', 'gallery_4', 'gallery_5', 'gallery_6', 'gallery_7', 'gallery_8', 'gallery_9', 'gallery_10', 'gallery_11', 'gallery_12')",
                                                    'review'   => "('review', 'review_2', 'review_3')",
                                                    'faq'      => "('faq', 'faq_2', 'faq_3', 'faq_4')",
                                                ];
                                                $where_clause = "";
                                                if ($active_page && isset($page_sections_map[$active_page])) {
                                                    $where_clause = "WHERE section IN " . $page_sections_map[$active_page];
                                                } elseif ($active_page) {
                                                    $where_clause = "WHERE section = '$active_page'";
                                                }
                                                $query = mysqli_query($conn, "SELECT * FROM site_content $where_clause ORDER BY section, order_priority");
                                                while($row = mysqli_fetch_assoc($query)) {
                                                    $delete_url = "manage_content.php?delete=".$row['id'];
                                                    $edit_url = "manage_content.php?edit=".$row['id'];
                                                    if($active_page) {
                                                        $delete_url .= "&page=".$active_page;
                                                        $edit_url .= "&page=".$active_page;
                                                    }
                                                    
                                                    echo '<tr>
                                                        <td>'.ucfirst($row['section']).'</td>
                                                        <td><img src="../uploads/'.$row['image'].'" style="width:80px;"></td>
                                                        <td>'.$row['title'].'</td>
                                                        <td>
                                                            <a href="'.$edit_url.'" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                            <a href="'.$delete_url.'" class="btn btn-danger btn-sm" onclick="return confirm(\'Delete content block?\')"><i class="fa fa-trash"></i></a>
                                                        </td>
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
    <script>
    // Section sub-items per page — all sections across all pages
    var pageSections = {
        homepage: [
            { value: 'banner',    label: 'Mid-Page Banner (Home.png)' },
            { value: 'popular',   label: 'Popular Bouquets Section' },
            { value: 'about',     label: 'About Us Blocks (Home)' }
        ],
        ourstory: [
            { value: 'about_story',        label: 'Story Paragraph & Image' },
            { value: 'our_story_features', label: 'Story Feature Bullets' }
        ],
        services: [
            { value: 'services',    label: 'Service Card 1' },
            { value: 'services_2',  label: 'Service Card 2' },
            { value: 'services_3',  label: 'Service Card 3' }
        ],
        gallery: [
            { value: 'gallery',    label: 'Gallery Image 1' },
            { value: 'gallery_2',  label: 'Gallery Image 2' },
            { value: 'gallery_3',  label: 'Gallery Image 3' },
            { value: 'gallery_4',  label: 'Gallery Image 4' },
            { value: 'gallery_5',  label: 'Gallery Image 5' },
            { value: 'gallery_6',  label: 'Gallery Image 6' },
            { value: 'gallery_7',  label: 'Gallery Image 7' },
            { value: 'gallery_8',  label: 'Gallery Image 8' },
            { value: 'gallery_9',  label: 'Gallery Image 9' },
            { value: 'gallery_10', label: 'Gallery Image 10' },
            { value: 'gallery_11', label: 'Gallery Image 11' },
            { value: 'gallery_12', label: 'Gallery Image 12' }
        ],
        review: [
            { value: 'review',   label: 'Testimonial 1' },
            { value: 'review_2', label: 'Testimonial 2' },
            { value: 'review_3', label: 'Testimonial 3' }
        ],
        faq: [
            { value: 'faq',   label: 'FAQ 1 (Q & A)' },
            { value: 'faq_2', label: 'FAQ 2 (Q & A)' },
            { value: 'faq_3', label: 'FAQ 3 (Q & A)' },
            { value: 'faq_4', label: 'FAQ 4 (Q & A)' }
        ]
    };

    var currentSection = '<?php echo $current_section; ?>';

    function updateSections(page, selectedVal) {
        var items = pageSections[page] || [];
        var $sel = $('#section_picker');
        $sel.empty();
        $.each(items, function(i, item) {
            var opt = $('<option>').val(item.value).text(item.label);
            if (selectedVal && item.value === selectedVal) {
                opt.prop('selected', true);
            } else if (!selectedVal && i === 0) {
                opt.prop('selected', true);
            }
            $sel.append(opt);
        });
    }

    $(document).ready(function() {
        // Initial populate
        updateSections($('#page_picker').val(), currentSection);

        $('#page_picker').on('change', function() {
            var selectedPage = $(this).val();
            window.location.href = 'manage_content.php?page=' + selectedPage;
        });
    });
    </script>
</body>
</html>
