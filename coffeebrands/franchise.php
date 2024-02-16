<?php  include "includes/navigation.php";?>

<button onclick="topFunction()" id="cbbtt" title="Go to top">
  <i class="fa fa-angle-double-up" style="font-size:36px;color: #73A6E4;"></i> <!--fa fa-arrow-circle-up -->
</button> 


<!-- Franchise Parallax Image with Portfolio Text -->
<div class="bgimg-4 w3-display-container w3-opacity-min" id="franchise">
  <div class="w3-display-middle">
<!--     <span class="w3-text-white" id="thanos">Franchise</span>-->
     <span class="w3-text-white w3-hide-small" id="thanos"><img src="img/franchise-white.png"></span>
     <span class="w3-text-white w3-hide-large w3-hide-medium" id="thanos"><img src="img/franchise.png"></span>
  </div>
</div>

<!-- Container (Franchise Section) 

    
        if(isset($_POST['submit'])){

        $to      =  "atr0x23@gmail.com";  //franchise@coffeebrands.gr" info@vasandi-aromata.gr  
        $name =  wordwrap($_POST['name'],70); // use wordwrap() if lines are longer than 70 characters
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $area = $_POST['area'];    
        $body    = "<b>Όνομα: </b>" . $name . " , <b>:Τηλέφωνο: </b>" . $phone . " , <b>Email: </b> " . $email . " , <b>Περιοχή: </b> " . $area;
        $subject = " Ενδιαφερόμενος για Franchise ";    
        $header  =  "From: " . $_POST['email'];     
        // send email
        mail($to,$subject,$body,$header); 

        $message_sent = "<div class='alert alert-success' role='alert'> Thank you, your request has been sent! <mark>:)</mark> </div>";
        $something_is_wrong = "";
        }
-->


<div class="w3-bg-grammes-l">
  <div class="w3-content w3-container w3-padding-64">
    <h3 class="w3-center w3-text-cbcyan w3-lsf w3-largee w3-ub"><?php echo _FR_TITLE_IDEA ?></h3><br><br>
    <p class="w3-lhf" style="font-size: 16px; margin-bottom: 50px;"><?php echo _FR_DESCR_IDEA ?></p>
    <h3 class="w3-center w3-text-cbcyan w3-lsf w3-largee w3-ub"><?php echo _FR_TITLE_TERMS ?></h3><br><br>
    <p class="w3-lhf" style="font-size: 16px;"><?php echo _FR_DESCR_TERMS_BR1 ?><br><br>
                                              <?php echo _FR_DESCR_TERMS_BR2 ?><br>
                                              <?php echo _FR_DESCR_TERMS_BR3 ?><br><br>
                                              <?php echo _FR_DESCR_TERMS_BR4 ?></p>
      <br>
    <h3 class="w3-center w3-text-cbcyan w3-lsf w3-largee w3-ub"><?php echo _FR_TITLE_PRIVILEDGES ?></h3><br><br>
    <p class="w3-lhf" style="font-size: 16px;"><?php echo _FR_DESCR_PRIVILEDGES_BR1 ?><br>
                                               <?php echo _FR_DESCR_PRIVILEDGES_BR2 ?></p>
      <br>      
    <h3 class="w3-center w3-text-cbcyan w3-lsf w3-largee w3-ub"><?php echo _FR_TITLE_BECOME_FR ?></h3><br><br>
    <p class="w3-lhf" style="font-size: 16px;"><?php echo _FR_DESCR_BECOME_FR ?></p>
      
      <p class="w3-center"><a href="#demo" class="cbbutton" data-toggle="collapse"><?php echo _FR_FORM_TITLE ?></a></p>
      <div id="demo" class="collapse">
          
        <p><?php echo _FR_FORM_SUBTITLE ?> <i class="fa fa-coffee"></i> <?php echo _FR_FORM_SUBTITLE_OWNER ?></p>
        <form role="form" action="franchise_confirm.php" method="post" id="login-form" autocomplete="off">
        
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder=<?php echo _FR_FORM_NAME ?> required name="name" id="subject">
            </div>
            <div class="w3-half">
              <input class="w3-input w3-border" type="tel" placeholder=<?php echo _FR_FORM_PHONE ?> required name="phone" pattern="\+?\d{1,3}[\s.-]?\d{9,14}">
            </div>
            <div class="w3-half">
              <input class="w3-input w3-border" type="email" placeholder=<?php echo _FR_FORM_EMAIL ?> required name="email" id="email">
            </div>
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder=<?php echo _FR_FORM_AREA ?> required name="area">
            </div>
            
            <div class="w3-half">
            <p style="margin-top:15px;"><?php echo _FR_FORM_VISIT ?></p>
            <input type="radio" name="radio" id="visit" value="Has already been visited one of our stores!">
            <label style="margin-right: 60px;" for="visit"> <?php echo _FR_FORM_VISIT_YES ?> </label>
            <input type="radio" name="radio" id="notvisit" value="Has NOT been visited one of our stores before!">
            <label style="margin-bottom:20px;" for="notvisit"> <?php echo _FR_FORM_VISIT_NO ?> </label>
            </div>

            <div class="w3-half">
              <div class="g-recaptcha w3-input" required data-sitekey="6LdmgSUlAAAAAGhypvYmkww7v62a2GEFFe0d4I4H"></div>
            </div>
            <br>
          </div>
          
          <button type="submit" name="submit" class="w3-button w3-white w3-right w3-section"><i class="fa fa-paper-plane"></i> <?php echo _CONTACT_FORM_BUTTON ?> </button>
        </form>

                <!-- Google reCaptcha -->
                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        
      </div>
      <div class="w3-margin-big-bottom">  </div>
  </div>
</div>

<!-- carousel section -->
<div class="w3-bg-grammes-r">
  <div class="w3-content">
      
<!--
      <div class="w3-padding-64">
        <h1 class="w3-center">Μερικά απο τα καταστήματά μας</h1>
      </div>
-->


      <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2800">

        <!-- Indicators -->
        
        <!-- The slideshow -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/fran-carousel1.jpg">
          </div>
          <div class="carousel-item">
            <img src="img/fran-carousel4.jpg">
          </div>
          <div class="carousel-item">
            <img src="img/fran-carousel2.jpg">
          </div>
          <div class="carousel-item">
            <img src="img/fran-carousel3.jpg">
          </div>
          <div class="carousel-item">
            <img src="img/slider-images1.jpg">
          </div>
          <div class="carousel-item">
            <img src="img/slider-images2.jpg">
          </div>
          <div class="carousel-item">
            <img src="img/carousel1.jpg">
          </div>
          <div class="carousel-item">
            <img src="img/carousel2.jpg">
          </div>
          <div class="carousel-item">
            <img src="img/carousel3.jpg">
          </div>
          <div class="carousel-item">
            <img src="img/carousel4.jpg">
          </div>
          <div class="carousel-item">
            <img src="img/carousel5.jpg">
          </div>
        </div>
        
        <!-- Left and right controls -->
      
      </div>
    <div class="w3-padding-64"></div>
  </div>
</div>  
<!-- end of carousel section --> 


<script src="includes/script.js"></script>

<?php  include "includes/footer.php";?>
