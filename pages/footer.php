<!-- footer section starts  -->

<section class="footer">

   <div class="box-container">

      <div class="box">
         <i class="fas fa-phone"></i>
         <h3>phone number</h3>
         <p><?php echo get_setting('phone', '+123-456-7890'); ?></p>
      </div>

      <div class="box">
         <i class="fas fa-map-marker-alt"></i>
         <h3>our address</h3>
         <p><?php echo get_setting('address', 'mumbai, india - 400104'); ?></p>
      </div>

      <div class="box">
         <i class="fas fa-clock"></i>
         <h3>opening hours</h3>
         <p><?php echo get_setting('hours', '09:00am to 10:00pm'); ?></p>
      </div>

      <div class="box">
         <i class="fas fa-envelope"></i>
         <h3>email address</h3>
         <p><?php echo get_setting('email', 'info@flowerzone.com'); ?></p>
      </div>

   </div>

   <div class="credit">
      <?php echo get_setting('footer_text', '&copy; copyright @ 2026 by <span>FlowerZone Team</span> | all rights reserved!'); ?>
   </div>

</section>

<!-- footer section ends -->
<script type="module" src="js/script.js"></script>
</body>
</html>