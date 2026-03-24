<?php
include("pages/header.php");
?>

<!-- custom css file link  -->
<link rel="stylesheet" href="css/gallery.css">
<div class="container">
    <h1 class="gallery-heading">OUR PHOTO GALLERY</h1>

    <div class="photo-gallery">
        <?php
        $select_gallery = mysqli_query($conn, "SELECT * FROM `site_content` WHERE section LIKE 'gallery%' ORDER BY section ASC, order_priority ASC");
        if (mysqli_num_rows($select_gallery) > 0) {
            while ($fetch_gallery = mysqli_fetch_assoc($select_gallery)) {
                // No category filtering, just display all images
                ?>
                <div class="pic">
                    <img src="uploads/<?php echo $fetch_gallery['image']; ?>" alt="<?php echo $fetch_gallery['title']; ?>">
                </div>
                <?php
            }
        } else {
            echo '<p class="empty">No gallery images found!</p>';
        }
        ?>
    </div>
</div>
<?php
include("pages/footer.php");
?>