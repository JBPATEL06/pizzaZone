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

         <div class="slide active">
            <div class="image">
               <img src="images/p5.png" alt="Midnight Rose Bouquet">
            </div>
            <div class="content">
               <h3>Midnight Rose Bouquet</h3>
               <div class="fas fa-angle-left" onclick="prev()"></div>
               <div class="fas fa-angle-right" onclick="next()"></div>
            </div>
         </div>

         <div class="slide">
            <div class="image">
               <img src="images/home-img-2.png" alt="Lilac Dreams Arrangement">
            </div>
            <div class="content">
               <h3>Lilac Dreams Arrangement</h3>
               <div class="fas fa-angle-left" onclick="prev()"></div>
               <div class="fas fa-angle-right" onclick="next()"></div>
            </div>
         </div>

         <div class="slide">
            <div class="image">
               <img src="images/home-img-3.png" alt="Sunflower Bliss Selection">
            </div>
            <div class="content">
               <h3>Sunflower Bliss Selection</h3>
               <div class="fas fa-angle-left" onclick="prev()"></div>
               <div class="fas fa-angle-right" onclick="next()"></div>
            </div>
         </div>

      </div>

   </section>

</div>
<!-- POPULAR BOUQUET SECTION START -->
<section class="popular" id="popular">
      <h1>POPULAR BOUQUETS</h1>
      <div class="box-container">
         <div class="box">
            <img src="images/maxvage.jpg" alt="Exotic Collection">
            <h2>EXOTIC COLLECTION</h2>
            <p>A delight for floral enthusiasts! Choose from our wide range of rare and exotic blooms, curated to perfection.</p>
            <a href="menu.php">VIEW COLLECTION</a>
         </div>
         <div class="box">
            <img src="images/paneer.jpg" alt="Wedding Grace">
            <h2>WEDDING GRACE</h2>
            <p>A selection that elegantly carries the weight of pure love, with white lilies and soft roses.</p>
            <a href="menu.php">VIEW COLLECTION</a>
         </div>
         <div class="box">
            <img src="images/makhni.jpg" alt="Orchid Elegance">
            <h2>ORCHID ELEGANCE</h2>
            <p>It is sophisticated. It is timeless. It is FlowerZone signature. Exotic orchids with a touch of luxury.</p>
            <a href="menu.php">VIEW COLLECTION</a>
         </div>
      </div>

</section>
<!-- POPULAR BOUQUET SECTION END -->

     <img src="images/Home.png" class="imghome" alt="FlowerZone Banner">
<!-- about section starts  -->

<section class="about" id="about">

   <h1 class="heading">About Us</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/about-1.svg" alt="Grown with Care">
         <h3>grown with care</h3>
         <p>No matter the occasion, flowers always convey the right message. Especially a bouquet that gives you freedom to customize.<br></p>
         <a href="menu.php" class="btn">our collection</a>
      </div>

      <div class="box">
         <img src="images/about-2.svg" alt="Express Delivery">
         <h3>express floral delivery</h3>
         <p>Stop searching blindly for flowers. Order from FlowerZone for a fresh, beautiful bouquet at your doorstep in no time.<br></p>
         <a href="menu.php" class="btn">our collection</a>
      </div>

      <div class="box">
         <img src="images/about-3.svg" alt="Special Moments">
         <h3>cherish special moments</h3>
         <p>Celebrate your milestones with our premium floral arrangements. Check out our seasonal combos starting from ₹499.</p>
         <a href="menu.php" class="btn">our collection</a>
      </div>

   </div>

</section>

<!-- about section ends -->

<?php
include("pages/footer.php");   
?>
