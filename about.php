<?php
include("pages/header.php");
?>
<!---------------------------about section--------------->
<!-- font awesome cdn link  -->
<link rel="stylesheet" href="fontawsome/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="css/about.css">
<br>
<br>
<br>
<br>
<br>
<br>
<section class="about" id="about">
    <h1 class="heading"> Our Story</h1>

    <?php
    // Fetch story paragraph & image from about_story section, fallback to site_settings
    $story_row = null;
    $story_q = mysqli_query($conn, "SELECT * FROM `site_content` WHERE section = 'about_story' LIMIT 1");
    if ($story_q && mysqli_num_rows($story_q) > 0) {
        $story_row = mysqli_fetch_assoc($story_q);
    }
    $story_img  = $story_row ? $story_row['image']       : get_setting('about_story_img', 'services.png');
    $story_text = $story_row ? $story_row['description']  : get_setting('about_story_text', 'FlowerZone is a bespoke floral boutique dedicated to bringing nature\'s finest creations to your doorstep. Our philosophy is rooted in elegance, quality, and the timeless language of flowers.');
    ?>

    <div class="about-sec">
        <div class="img">
            <img src="images/<?php echo $story_img; ?>" alt="FlowerZone Story">
        </div>
        <div class="about-content">
            <p><?php echo $story_text; ?></p>
            <div class="about-inner">
                <?php
                   $select_about_features = mysqli_query($conn, "SELECT * FROM `site_content` WHERE section = 'our_story_features' ORDER BY order_priority ASC");
                   if (mysqli_num_rows($select_about_features) > 0) {
                      while ($fetch_feature = mysqli_fetch_assoc($select_about_features)) {
                ?>
                <h5><i class="fas fa-arrow-alt-circle-right"></i><?php echo $fetch_feature['title']; ?></h5>
                <?php
                      }
                   }
                ?>
            </div>
            <button class="btn">Learn More</button>
        </div>
    </div>
</section>

<?php
include("pages/footer.php");
?>