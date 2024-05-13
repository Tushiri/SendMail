<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Mail Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
     integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="container">
        <div class="card mt-5">
            <div class="card-header bg-success">
                <h1 class="text-white display-2 fw-bold">
                Send Mail Activity
                </h1>
            </div>
            <div class="card-body">
                <form method="post">
                <div class="mb-3">
                    <label for="Alias" class="form-label">*Name</label>
                    <input type="text" class="form-control" id="Alias" placeholder="Your Name or Alias" name = "Alias">
                </div>
                    <div class="mb-3">
                        <label for="Email" class="form-label">*Email</label>
                        <input type="email" class="form-control" id="Email" placeholder="Email of the Reciever" name = "Email">
                    </div>
                        <div class="mb-3">
                            <label for="Subject" class="form-label">*Subject</label>
                            <input type="text" class="form-control" id="Subject" placeholder="Email Subject" name = "Subject">
                        </div>
                            <div class="mb-3">
                                <label for="Message" class="form-label">*Message</label>
                                <textarea class="form-control" id="Message" rows="3" placeholder="Write Your Message Here..." name = "Message"></textarea>
                            </div>
                                <div class="d-flex p-2 mt-3"> 
                                    <input type="submit" value="Send" class="btn btn-primary" name= "Send">
                                </div>
                        </form>
            </div>
    </div>
    <?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST['Send'])){
    $name = $_POST['Alias'];
    $email = $_POST['Email'];
    $subject = $_POST['Subject'];
    $message = $_POST['Message'];
require 'vendor/autoload.php';


$mail = new PHPMailer(true);

try{

    $mail->isSMTP();        
    $mail->Host       = 'mail.delphioil.com.ph';      
    $mail->SMTPAuth   = true;  
    $mail->Username   = 'test@delphioil.com.ph';   
    $mail->Password   = '2468_Tavu';               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;    
    $mail->Port       = 465;   
  
    $mail->setFrom('ptc.haroldbryansantos@gmail.com' , $name);
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $message;

    $what = $mail->send();
    echo 'Email sent!';
} catch(Exception $e){
    echo "Message didn't send<br>";
    echo "Message
  Error: {$mail->ErrorInfo}";
}
}
?>

</body>
</html>