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
               <img src="images/p5.png" alt="">
            </div>
            <div class="content">
               <h3>homemade Pepperoni Pizza</h3>
               <div class="fas fa-angle-left" onclick="prev()"></div>
               <div class="fas fa-angle-right" onclick="next()"></div>
            </div>
         </div>

         <div class="slide">
            <div class="image">
               <img src="images/home-img-2.png" alt="">
            </div>
            <div class="content">
               <h3>Pizza With Mushrooms</h3>
               <div class="fas fa-angle-left" onclick="prev()"></div>
               <div class="fas fa-angle-right" onclick="next()"></div>
            </div>
         </div>

         <div class="slide">
            <div class="image">
               <img src="images/home-img-3.png" alt="">
            </div>
            <div class="content">
               <h3>Mascarpone And Mushrooms</h3>
               <div class="fas fa-angle-left" onclick="prev()"></div>
               <div class="fas fa-angle-right" onclick="next()"></div>
            </div>
         </div>

      </div>

   </section>

</div>
<!-- POPULAR PIZZA SECTION START -->
<section class="popular" id="popular">
      <h1>POPULAR PIZZA'S</h1>
      <div class="box-container">
         <div class="box">
            <img src="images/maxvage.jpg">
            <h2>MEXICAN GREEN WAVE</h2>
            <p>A delight for veggie lovers! Choose from our wide range of delicious vegetarian pizzas, it's softer and tastier</p>
            <a href="#">VIEW MENU</a>
         </div>
         <div class="box">
            <img src="images/paneer.jpg">
            <h2>VEG EXTRAVAGANZA</h2>
            <p> A pizza that decidedly staggers under an overload of golden corn, exotic black olives, crunchy onions, crisp capsicum,</p>
            <a href="#">VIEW MENU</a>
         </div>
         <div class="box">
            <img src="images/makhni.jpg">
            <h2>PANEER MAKHANI</h2>
            <p>It is hot. It is spicy. It is oh-so-Indian. Tandoori paneer with capsicum I red paprika I mint mayoss</p>
            <a href="#">VIEW MENU</a>
         </div>
      </div>

</section>
<!-- POPULAR PIZZA SECTION END -->

    <img src="images/Home.png" class="imghome" alt="" srcset="">
<!-- about section starts  -->

<section class="about" id="about">

   <h1 class="heading">about us</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/about-1.svg" alt="">
         <h3>made with love</h3>
         <p>No matter what the situation, pizza always helps. Especially a pizza that gives you the freedom to choose your toppings.<br></p>
         <a href="menu.php" class="btn">our menu</a>
      </div>

      <div class="box">
         <img src="images/about-2.svg" alt="">
         <h3>30 minutes delivery</h3>
         <p>So stop googling for the “pizza shops near me” and order from your nearest pizza outlet to have a hot box of pizza on your table in the next 30 minutes.<br></p>
         <a href="menu.php" class="btn">our menu</a>
      </div>

      <div class="box">
         <img src="images/about-3.svg" alt="">
         <h3>share with freinds</h3>
         <p>end-of-the-month blues while placing your order Online, check out from pizza mania combos with just ₹99 and ₹199 each.</p>
         <a href="menu.php" class="btn">our menu</a>
      </div>

   </div>

</section>

<!-- about section ends -->

<?php
include("pages/footer.php");   
?>
