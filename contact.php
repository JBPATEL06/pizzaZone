<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
   <!-- <title> Responsive Contact Us Form  | CodingLab </title>-->
    <link rel="stylesheet" href="./css/contact.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="./fontawsome/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <?php
    include("./pages/header.php");
    $emailError = false;
    if(isset($_POST["submit"])){
      $emaiId=$_POST['EMAIL'];
      if($emaiId=""){
        $emailError = true;
      }
    }
  ?>
 <br>
 <br>

  <div class="container">
    
  <h1>CONTACT-US</h1>

    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Address</div>
          <div class="text-one">Surkhet, NP12</div>
          <div class="text-two">Birendranagar 06</div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Phone</div>
          <div class="text-one">+91 9586643802</div>
          <div class="text-two">+91 6353339823</div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">info@pizzazone.com</div>
          <div class="text-two">pizzazone@gmail.com</div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Send us a message</div>
        <h2>If you have any work from me or any types of quries related to my tutorial, you can send me message from here. It's my pleasure to help you.</h2>

    
      <!-- Begin Mailchimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/classic-071822.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif;  width:600px;}
	/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
    <form action="https://gmail.us21.list-manage.com/subscribe/post?u=162d810bb290118e0d1a428ed&amp;id=5766839ab1&amp;f_id=004af9e1f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <div id="mc_embed_signup_scroll">
        <h2>Contact Us</h2>
        <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
<div class="mc-field-group">
	<label for="mce-EMAIL">Email  <span class="asterisk">*</span>
</label>
	<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" required>
	<span id="mce-EMAIL-HELPERTEXT" class="helper_text"></span>
</div>
<div class="mc-field-group">
	<label for="mce-NAME">Name </label>
	<input type="text" value="" name="NAME" class="" id="mce-NAME">
	<span id="mce-NAME-HELPERTEXT" class="helper_text"></span>
</div>
<div class="mc-field-group">
	<label for="mce-MMERGE4">Message </label>
	<input type="text" value="" name="MMERGE4" class="" id="mce-MMERGE4">
	<span id="mce-MMERGE4-HELPERTEXT" class="helper_text"></span>
</div>
	<div id="mce-responses" class="clear foot">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_162d810bb290118e0d1a428ed_5766839ab1" tabindex="-1" value=""></div>
        <div class="optionalParent">
            <div class="clear foot">
                <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                <p class="brandingLogo"><a href="http://eepurl.com/ik5SoP" title="Mailchimp - email marketing made easy and fun"><img src="https://eep.io/mc-cdn-images/template_images/branding_logo_text_dark_dtp.svg"></a></p>
            </div>
        </div>
    </div>
</form>
</div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[1]='NAME';ftypes[1]='text';fnames[0]='EMAIL';ftypes[0]='email';fnames[4]='MMERGE4';ftypes[4]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->
    </div>
    </div>
  </div>

</body>
</html>

<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'>
</script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[1]='NAME';ftypes[1]='text';fnames[0]='EMAIL';ftypes[0]='email';fnames[2]='MMERGE2';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>

  

