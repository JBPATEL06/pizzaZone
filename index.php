<!-- header section starts  -->
<?php
include("pages/header.php");
?>

<!-- header section ends -->

<!-- font awesome cdn link  -->

<link rel="stylesheet" href="fontawsome/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="css/style.css">
<link rel="icon" href="./images/logo.png" type="image/png">


<div class="home-bg">

   <section class="home" id="home">

      <div class="slide-container">

         <?php
         $select_slider = mysqli_query($conn, "SELECT * FROM `slider_content` WHERE is_active = 1");
         $first = true;
         if (mysqli_num_rows($select_slider) > 0) {
            while ($fetch_slider = mysqli_fetch_assoc($select_slider)) {
               ?>
               <div class="slide <?php echo $first ? 'active' : ''; ?>"
                  style="background-image: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.1)), url('images/<?php echo $fetch_slider['image']; ?>');">
                  <div class="content">
                     <?php if(isset($_SESSION['username'])): ?>
                         <p style="font-size: 2.5rem; color: var(--accent); margin-bottom: 1.5rem; font-weight: 600; text-shadow: 0 5px 25px rgba(0,0,0,0.8);">Welcome, <?php echo $_SESSION['username']; ?>!</p>
                     <?php endif; ?>
                     <h3><?php echo $fetch_slider['title']; ?></h3>
                  </div>
                  <div class="fas fa-angle-left" onclick="prev()"></div>
                  <div class="fas fa-angle-right" onclick="next()"></div>
               </div>
               <?php
               $first = false;
            }
         } else {
            // Fallback if no slider content
            echo '<div class="slide active"><div class="content"><h3>Welcome to FlowerZone</h3></div></div>';
         }
         ?>

      </div>

   </section>

</div>

<script>
let slides = document.querySelectorAll('.home-bg .home .slide-container .slide');
let index = 0;

function next(){
    slides[index].classList.remove('active');
    index = (index + 1) % slides.length;
    slides[index].classList.add('active');
}

function prev(){
    slides[index].classList.remove('active');
    index = (index - 1 + slides.length) % slides.length;
    slides[index].classList.add('active');
}

setInterval(next, 7000);
</script>
<!-- POPULAR BOUQUET SECTION START -->
<section class="popular" id="popular">
   <h1>POPULAR BOUQUETS</h1>
   <div class="box-container">
      <?php
      $select_popular = mysqli_query($conn, "SELECT * FROM `site_content` WHERE section = 'popular' ORDER BY order_priority ASC");
      if (mysqli_num_rows($select_popular) > 0) {
         while ($fetch_popular = mysqli_fetch_assoc($select_popular)) {
            ?>
            <div class="box">
               <img src="images/<?php echo $fetch_popular['image']; ?>" alt="<?php echo $fetch_popular['title']; ?>">
               <h2><?php echo $fetch_popular['title']; ?></h2>
               <p><?php echo $fetch_popular['description']; ?></p>
               <a href="<?php echo $fetch_popular['link']; ?>">VIEW COLLECTION</a>
            </div>
            <?php
         }
      }
      ?>
   </div>

</section>
<!-- POPULAR BOUQUET SECTION END -->

<!-- <img src="images/<?php echo get_setting('mid_banner', 'Home.png'); ?>" class="imghome" alt="FlowerZone Banner"> -->
<!-- about section starts  -->

<section class="about" id="about">

   <h1 class="heading">About Us</h1>

   <div class="box-container">

      <?php
      $select_about = mysqli_query($conn, "SELECT * FROM `site_content` WHERE section = 'about' ORDER BY order_priority ASC");
      if (mysqli_num_rows($select_about) > 0) {
         while ($fetch_about = mysqli_fetch_assoc($select_about)) {
            ?>
            <div class="box">
               <img src="images/<?php echo $fetch_about['image']; ?>" alt="<?php echo $fetch_about['title']; ?>">
               <h3><?php echo $fetch_about['title']; ?></h3>
               <p><?php echo $fetch_about['description']; ?></p>
               <a href="<?php echo $fetch_about['link']; ?>" class="btn">our collection</a>
            </div>
            <?php
         }
      }
      ?>

   </div>

</section>

<!-- about section ends -->

<?php
include("pages/footer.php");
?>