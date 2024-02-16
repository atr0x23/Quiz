<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

  // reCAPTCHA validation
if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {

    // Google secret API
    $secretAPIkey = '6LdmgSUlAAAAAIOBhz5lYPP1ua3IzE1vATJD0ix6';

    // reCAPTCHA response verification
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretAPIkey.'&response='.$_POST['g-recaptcha-response']);

    // Decode JSON data
    $response = json_decode($verifyResponse);
        if($response->success){

    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                     // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'atr0x23@gmail.com';                 // SMTP username
    $mail->Password = 'czvgmmqytyswhuga';                           // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; ;                           
    $mail->Port = 465;                                    // TCP port to connect to  587

    //Recipients
    $mail->setFrom('atr0x23@gmail.com', 'Coffeebrands GR');
    $mail->addAddress('info@coffeebrands.gr');     // Add a recipient
    $mail->addBCC('enasmerelas@gmail.com');
    $mail->addReplyTo($_POST['email']);



    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'GR Franchise Form';
    $mail->Body = "Όνομα: <b>" . $_POST['name'] . "</b><br/> Τηλέφωνο: <b>" . $_POST['phone'] . "</b><br/> 
                   Email: <b>" . $_POST['email'] . "</b><br/> Περιοχή: <b>" . $_POST['area'] . "</b><br/> <b>" . $_POST['radio'] . "</b>";

    $mail->send();

 

    header( "refresh:3;url=/franchise" );
      
    echo "<!DOCTYPE html>";
    echo "<html>";
    echo "<head>";
    echo "<link rel='stylesheet' href='css/w3.css'>";
    echo "</head>";
    echo "<body>";
      echo "<div class='w3-row w3-container w3-padding-64 w3-bg-signature-blend'>";
      echo "<div class='w3-content'>"; 

      echo "<div class='w3-col m12 w3-padding-large w3-medium'>";
      echo "<p class='w3-padding-large' style='padding-top: 80px; color: white'>";
      echo "<div class='w3-padding-top-64 w3-container w3-blue'> <h2> Ευχαριστούμε, το αίτημά σας έχει σταλεί! <mark>:)</mark></h2> </div>";
      echo "</p>";
      echo "</div>";

      echo "</div>";  
      echo "</div>";
    
    echo "</body>";
    echo "</html>";

   
    
  //   else{ 
  //     $response = array(
  //         "status" => "alert-danger",
  //         "message" => "Plese check on the reCAPTCHA box."
  //     );
  // }

    exit();

        }else{echo "Oops...,check on the reCAPTCHA box please and try again";}

} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
} else{echo "Please check on the reCAPTCHA box and try again";}
?>
</body>
</html>