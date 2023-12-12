  <html>
  <head>
  <meta charset="utf-8">
  <title>Scoot</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <!-- Font awesome -->
  <script src="https://kit.fontawesome.com/6c069c0432.js" crossorigin="anonymous"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <script src="js/mapScript.js"></script>
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

  <!-- Favicon -->
  <link href="img/faviconA2-32x32.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style2.css" rel="stylesheet">
  <link href="style1.css" rel="stylesheet" type="text/css">

</head>

<body>
<?php 
      

if(isset($_POST['submit'])){
    
    
//        function reCaptcha($recaptcha){
//          $secret = "6LcBWKwgAAAAALOoPdqAd-9VqFysyXwp7Nj2gYkc";
//          $ip = $_SERVER['REMOTE_ADDR'];
//
//          $postvars = array("secret"=>$secret, "response"=>$recaptcha, "remoteip"=>$ip);
//          $url = "https://www.google.com/recaptcha/api/siteverify";
//          $ch = curl_init();
//          curl_setopt($ch, CURLOPT_URL, $url);
//          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//          curl_setopt($ch, CURLOPT_TIMEOUT, 10);
//          curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
//          $data = curl_exec($ch);
//          curl_close($ch);
//
//          return json_decode($data, true);
//        }
    
//        if(isset($_POST['g-recaptcha-response']))
//        $recaptcha = $_POST['g-recaptcha-response']; // sto info@scoot.ltd to exw setarei to reCAPTCHA
//        $res = reCaptcha($recaptcha);
//                if(!$recaptcha){
//                echo '<div class="col-md-12 text-center">';     
//                echo '<a class="hero-brand" href="index.php" title="Home"><img alt="Bell Logo" src="img/logo-scoot3.png"></a>';    
//                echo '</div>';
//                echo '<br>';    
//                echo '<h2 class="text-center">Please check the captcha form!</h2>';    
//                exit; }
//        elseif($res['success']){
     //Continue and send the email

    $to = "info@microfind.gr";
    $name = $_POST['name'];            
    $from = $_POST['email'];
    $subject = "Μήνυμα από microFIND [web]";
    $message = "O/H " . $name . " έγραψε το ακόλουθο μήνυμα:" . "\n\n" . $_POST['message'];                 
                        
    
//    $headers  = "MIME-Version: 1.0" . "\r\n" . "Content-type: text/html; charset=iso-8859-1" . "\r\n";
//    $headers .= "From: info@iscooting.gr \r\n" . "Reply-To: $from " . "\r\n" . "X-Mailer: PHP/" . phpversion();
//    $headers  = "Organization: Sender Organization\r\n";
      $headers  = "MIME-Version: 1.0\r\n";
      $headers .= "Return-Path: The Sender <noreply@microfind.gr>\r\n";
      $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
      $headers .= "X-Priority: 3\r\n";
      $headers .= "From: noreply@microfind.gr\r\n";
      $headers .= "Reply-To:$from\r\n";
      $headers .= "X-Mailer: PHP". phpversion() ."\r\n";
    //send the form
    mail($to,$subject,$message,$headers, '-r noreply@microfind.gr');

    $message_sent = "Your message has been sent!";
    $message_sent2 = " We will contact you soon, thank you :) ";
    // You cannot use header and echo together. It's one or the other.
    }
//   else{  $message_not_sent = "ΑΠΕΤΥΧΕ! :( ";
//           $message_not_sent2 = " Ξεχάσατε να κλικάρετε το reCAPTCHA !!! "; }  
?>

 <section class='features'>
    <div class='container text-center'>
      <h1 class='text-center'>
          <?php echo $message_sent; echo $message_not_sent;  ?>
        </h1>
          <div class='row'>
<!--
            <div class='feature-col col-lg-6 col-xs-12'>
              <div class='card card-block text-center'>
                <div>
                  <div class='feature-icon'>
                    <span class='fa fa-rocket fa-2x'></span>
                  </div>
                </div>
              </div>
            </div>
-->
           <div class="col-md-12">
          <a class="hero-brand" href="index.php" title="Home"><img alt="Site Logo" src="contact_mail_form/img/logo.jpg" width="400px;"></a>
        </div>
            </div>
        <h1 class='text-center'>
          <?php echo $message_sent2; echo $message_not_sent2; ?> <!-- } else echo "oops, something went wrong!"; -->
        </h1>
        </div>
        </section>          

  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/tether/js/tether.min.js"></script>
  <script src="lib/stellar/stellar.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/easing/easing.js"></script>
  <script src="lib/stickyjs/sticky.js"></script>
  <script src="lib/parallax/parallax.js"></script>
  <script src="lib/lockfixed/lockfixed.min.js"></script>
  <script src="js/custom.js"></script>
        
<script>setTimeout(function () {
   window.location.href= 'https://microfind.gr/front-page'; // the redirect goes here

},2700);</script>

</body>
</html>     