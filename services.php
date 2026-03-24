<?php
include("pages/header.php");
?>
<!-- order section starts  -->
<!-- font awesome cdn link  -->
<link rel="stylesheet" href="fontawsome/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="css/services.css">
<br>
<br>
<br>
<br>
<br>
<br>
<section class="service" id="service">

    <h1 class="heading"> our Services</h1>

    <div class="service-content">
        <?php
            $select_services = mysqli_query($conn, "SELECT * FROM `site_content` WHERE section LIKE 'services%' ORDER BY section ASC, order_priority ASC");
            if (mysqli_num_rows($select_services) > 0) {
                while ($fetch_services = mysqli_fetch_assoc($select_services)) {
        ?>
        <div class="inner-box">
            <img src="uploads/<?php echo $fetch_services['image']; ?>" alt="<?php echo $fetch_services['title']; ?>">
            <h2><?php echo $fetch_services['title']; ?></h2>
            <p><?php echo $fetch_services['description']; ?></p>
            <br>
            <a href="contact.php" class="btn">Read More</a>
        </div>
        <?php
                }
            }
        ?>
    </div>
</section>
<?php
include("pages/footer.php");
?>