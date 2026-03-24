<?php
include("pages/header.php");
?>
 <!-- font awesome cdn link  -->
 <link rel="stylesheet" href="fontawsome/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="css/faq.css">


<div class="container">
   <h1>Frequently Asked Questions ?</h1>
      <?php
         $select_faq = mysqli_query($conn, "SELECT * FROM `site_content` WHERE section LIKE 'faq%' ORDER BY section ASC, order_priority ASC");
         $i = 1;
         if (mysqli_num_rows($select_faq) > 0) {
            while ($fetch_faq = mysqli_fetch_assoc($select_faq)) {
      ?>
      <div class="tab">
         <input type="radio" name="acc" id="acc<?php echo $i; ?>">
         <label for="acc<?php echo $i; ?>">
            <h2>0<?php echo $i; ?></h2>
            <h3><?php echo $fetch_faq['title']; ?></h3>
         </label>
         <div class="content">
            <p><?php echo $fetch_faq['description']; ?></p>
         </div>
      </div>
      <?php
               $i++;
            }
         }
      ?>
</div>
<?php
include("pages/footer.php");
?>
