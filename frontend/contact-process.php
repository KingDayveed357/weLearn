<?php  include_once 'head.php';
  

   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;
   
   
   //Load Composer's autoloader
   require '../vendor/autoload.php';
   
       if(isset($_POST['send'])){ 
        $name = cleaninput($_POST['name']);
        $email = cleaninput($_POST['email']);
        $subject = cleaninput($_POST['subject']);
        $message = cleaninput($_POST['message']);
        $code = cleaninput(md5(rand(90876, 34576)));
    if(mysqli_num_rows(mysqli_query($conn, "SELECT email FROM `admin` WHERE email= '$adminMail' ")) >0){
    
       $mail = new PHPMailer(true);
   
       try {
           //Server settings
           $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
           $mail->isSMTP();                                            //Send using SMTP
           $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
           $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
           $mail->Username   = $email;                                  //SMTP username
           $mail->Password   =                                     //SMTP password
           $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
           $mail->Port       = 465;                                    //TCP port  to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
       
           //Recipients
           $mail->setFrom('WE LEARN');
           $mail->addAddress($adminMail);
   
           //Content
           $mail->isHTML(true);                                  //Set email format to HTML
           $mail->Subject = $subject;
           $mail->Body    =  $body ;
       
           $mail->send();
           echo 'Message has been sent';
       } catch (Exception $e) {
           echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
       }
       if (!$mail->send()){
        $emailErr = "<div class='alert alert-danger'>Email is not valid</div>";
      } 
       echo "</div>";  
       
     $emailErr = "
     <div class='alert alert-info alert-dismissible' >
     We've sent a reset link to your email-$email
     <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
   </div>
     ";

     }
    }else{ 
      $emailErr = "
        <div class='alert alert-danger alert-dismissible' >
        $email - We don't recognise this email!!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
        ";
        
           header("Location:contact.php");
          }
  
  
?>
