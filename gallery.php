<?php
include("pages/header.php");
?>

<!-- custom css file link  -->
<link rel="stylesheet" href="css/gallery.css">



<input type="radio" name="Photos" id="check1" checked>
<input type="radio" name="Photos" id="check2">
<input type="radio" name="Photos" id="check3">
<input type="radio" name="Photos" id="check4">
<input type="radio" name="Photos" id="check5">


<div class="container">
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>
<h1>OUR PHOTO GALLERY</h1>
<div class="top-content active">
        <h3>Photo Gallery</h3>
        <label for="check1">All Photos</label>
        <label for="check2">Our Restaurant</label>
        <label for="check3">Our Pizza's</label>
        <label for="check4">Our Chef</label>
     </div>

     <div class="photo-gallery">
        <!-- Restaurant Images -->
        <div class="pic restaurant">
               <img src="images/gallery/g1.jpg">
        </div> 
        <div class="pic restaurant">
               <img src="images/gallery/g2.jpg">
        </div> 
        <div class="pic restaurant">
               <img src="images/gallery/g3.jpg">
        </div> 
        <div class="pic restaurant">
               <img src="images/gallery/g4.jpg">
        </div> 

        <!-- Pizza Images -->

        <div class="pic pizza">
                <img src="images/gallery/p1.jpg">
        </div>
        <div class="pic pizza">
                <img src="images/gallery/p2.jpg">
        </div>
        <div class="pic pizza">
                <img src="images/gallery/p3.jpg">
        </div>
        <div class="pic pizza">
                <img src="images/gallery/p4.jpg">
        </div>
        <!-- Chefs Images -->
        <div class="pic chefs">
                <img src="images/gallery/c1.jpg">
        </div>
        <div class="pic chefs">
                <img src="images/gallery/c2.jpg">
        </div>
        <div class="pic chefs">
                <img src="images/gallery/c3.jpg">
        </div>
        <div class="pic chefs">
                <img src="images/gallery/c4.jpg">
        </div>

       </div>
</div>