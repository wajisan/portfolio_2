<?php
session_start();

ini_set('display_errors', TRUE);
$err = 0;

if(empty($_POST['name'])      ||
   empty($_POST['mail'])     ||
   empty($_POST['msg'])   ||
   !filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL))
   {
    $err = 1;
    header('location: index.html?error=1');
   }
   /*
   if (isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response'] != "6Lf6xicUAAAAAFtazrO0Vs4OKR4NBdWn7agnAgky")
    {
      $err = 4;
    echo(location: index.php?error=4);
    } 
  */
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['mail']));
//$phone = strip_tags(htmlspecialchars($_POST['number']));
$message = strip_tags(htmlspecialchars($_POST['msg']));

/*$match = array();
preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $message, $match);//check if mail contain an URL (to avoid spam)

if ($match[0] != null){
  $err = 6;
  header('location: index.php?error=6');
}*///////////////////////////////////////////////////////////////////////////////////////////

function SendMail( $ToEmail, $MessageHTML) {
  require ( 'PHPMailer/PHPMailerAutoload.php' ); // Add the path as appropriate
  $Mail = new PHPMailer();

  $Mail->IsSMTP(); // Use SMTP
  $Mail->SMTPDebug = 1;
  $Mail->SMTPAuth    = true; // enable SMTP authentication
  $Mail->SMTPSecure  = "tls"; //Secure conection
  $Mail->Host        = "smtp.live.com"; // Sets SMTP server
  $Mail->Port        =  587;//465; // set the SMTP port
  $Mail->IsHTML(true);
  $Mail->Username    = 'wadik@hotmail.fr'; // SMTP account username
  $Mail->Password    = 'linkwall44'; // SMTP account password
  $Mail->SetFrom('wadik@hotmail.fr');//account username again
  $Mail->Subject     = 'No-reply site wajisan';
//  $Mail->Priority    = 3; // Highest priority - Email priority (1 = High, 3 = Normal, 5 = low)
//  $Mail->CharSet     = 'UTF-8';
//  $Mail->Encoding    = '8bit';

// $Mail->ContentType = 'text/html; charset=utf-8\r\n';

//  $Mail->FromName    = 'wajisan';
//  $Mail->WordWrap    = 900; // RFC 2822 Compliant for Max 998 characters per line

  $Mail->AddAddress( $ToEmail ); // To:
  $Mail->isHTML( TRUE );
  $Mail->Body    = $MessageHTML;
  //$Mail->AddAttachment($attach);
   if (!$Mail->send()) {
    echo "Mailer Error: " . $Mail->ErrorInfo;
} else {
    echo "Message sent!";
}  $Mail->SmtpClose();

  if ( $Mail->IsError() ) { // ADDED - This error checking was missing
    return FALSE;
  }
  else {
    return TRUE;
  }
}



$ToEmail = "wajisanprod@gmail.com";
//$ToName  = 'Wadi';
$MessageHTML = "<h2>WajiMail</h2>";
$MessageHTML .= "<div>".$message." <br><br>--------<br><br>".$name." <br><br> ".$email_address." <br> </div>";
//echo "to -> ".$ToEmail;
//echo "user -> ".$user;
//echo "url -> ".$img; 

//$img .= ".jpg";// put type to path img
$Send = null;
if ($err == 0)
  $Send = SendMail( $ToEmail, $MessageHTML);



if ( $Send ) {
  //echo "<h2> Sent OK </h2>";
  header('location: index.html#contact');
}
else {
  //echo "<h2> ERROR </h2>";
  header('location: index.html#contact?error=2');
}
//die;


?>