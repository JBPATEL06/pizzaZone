
<?php
include("pages/header.php");   
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- font awesome cdn link  -->
<link rel="stylesheet" href="fontawsome/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="css/review.css">

  <body>

    <div class="testimonials">
      <div class="inner">
        <br>
        <br>
        <br>
        <br>
        <br>
        <h1>TESTIMONIALS</h1>
        <div class="row">
          <?php
             $select_review = mysqli_query($conn, "SELECT * FROM `site_content` WHERE section LIKE 'review%' ORDER BY section ASC, order_priority ASC");
             if (mysqli_num_rows($select_review) > 0) {
                while ($fetch_review = mysqli_fetch_assoc($select_review)) {
          ?>
          <div class="col">
            <div class="testimonial">
              <img src="uploads/<?php echo $fetch_review['image']; ?>" alt="<?php echo $fetch_review['title']; ?>">
              <div class="name"><?php echo $fetch_review['title']; ?></div>
              <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>

              <p><?php echo $fetch_review['description']; ?></p>
            </div>
          </div>
          <?php
                }
             }
          ?>
        </div>
      </div>
    </div>

<?php
include("pages/footer.php");   
?>
