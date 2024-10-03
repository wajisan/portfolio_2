<?php
    class APImailer {
        private function mailerRouter() {
            require_once("lib/phpmailer/src/PHPMailer.php");
            require_once("lib/phpmailer/src/SMTP.php");
            require_once("lib/phpmailer/src/Exception.php");

            $mail = new PHPMailer\PHPMailer\PHPMailer(true);

            return $mail;
        }

       

        public function mailerParameters($subject, $message, $name, $email) {
            $mailProvider = $this->mailerRouter();

            try {
                $mailProvider->SMTPDebug  = 1;
                //$mailProvider->IsSMTP(); // activation des fonctions SMTP
                $mailProvider->SMTPAuth = true; // SMTP demande authentification
                $mailProvider->SMTPSecure = 'ssl'; // protocole utilisé ssl ou tls
                $mailProvider->Host = 'smtp.gmail.com'; //adresse du serveur SMTP : 25 en local, 465 pour ssl et 587 pour tls
                $mailProvider->Port = 465; // port du serveur SMTP
                $mailProvider->Username = base64_decode("d2FqaXNhbjkxQGdtYWlsLmNvbQ=="); // le nom d’utilisateur SMTP
                $mailProvider->Password = base64_decode("bGlua3dhbGw0NA=="); // mot de passe SMTP

                // Paramètres du mail
                $mailProvider->AddAddress('wajisanprod@gmail.com','Utilisateur'); // ajout du destinataire
                $mailProvider->SetFrom("wajisan91@gmail.com"); // adresse mail de l’expéditeur
                $mailProvider->FromName = "[Contact from Wajisan.eu]"; // nom de l’expéditeur
                $mailProvider->AddReplyTo("wajisan91@gmail.com","[Wadi Kihel]"); // adresse mail et nom du contact de retour
                $mailProvider->IsHTML(true); // envoi du mail au format HTML
                $mailProvider->CharSet = 'UTF-8';
                $mailProvider->Encoding = 'base64';
                $mailProvider->Subject = "[Contact Wajisan.eu] ".$subject; // sujet du mail
                $mailProvider->Body = "<html>"; // le corps de texte du mail en texte brut si le HTML n'est pas supporté
                $mailProvider->Body .= "<h3>Message:</h3><p>".$message."</p>";                
                $mailProvider->Body .= "<h3>From: </h3><p>".$name."<br/>".$email."<br/>Kind regards Wadi,</p>";
                $mailProvider->Body .= "</html>";
                $mailProvider->AltBody = "Message from client";//format notification

                $mailProvider->Send();
            }
            catch (phpmailerException $e) {
                echo 'error';//$e->errorMessage();
            } catch (Exception $e) {
                echo 'error';//$e->getMessage(); //Boring error messages from anything else!
            }
            return $mailProvider;
        }

    
    }

    if(empty($_POST['name'])  ||
       empty($_POST['mail'])  ||
       empty($_POST['message'])   ||
       empty($_POST['subject'])   ||
       !filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL))
       {
        $err = 1;
        echo 'invalid';
       }
    else {
        $name = strip_tags(htmlspecialchars($_POST['name']));
        $email_address = strip_tags(htmlspecialchars($_POST['mail']));
        $subject = strip_tags(htmlspecialchars($_POST['subject']));
        $message = strip_tags(htmlspecialchars($_POST['message']));

        $apiMailer = new APImailer;
        $mailSendUser = $apiMailer->mailerParameters($subject, $message, $name, $email_address);
    }

?>
