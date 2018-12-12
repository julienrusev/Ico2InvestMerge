<?php 

/*require_once '../vendor/autoload.php';*/
 
/*try {
    // Create the SMTP Transport
    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465))
        ->setUsername('ico2invest@gmail.com')
        ->setPassword('Tr2rqFa2OUX4MSNM6DQl');*/
 
/*    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);
 
    // Create a message
    $message = new Swift_Message();
 
    // Set a "subject"
    $message->setSubject('Demo message using the SwiftMailer library.');
 
    // Set the "From address"
    $message->setFrom(['ico2invest@gmail.com' => 'ICO 2 INVEST']);
 
    // Set the "To address" [Use setTo method for multiple recipients, argument should be array]
    $message->addTo('recipient@gmail.com','recipient name');
 
    // Add inline "Image"
    $inline_attachment = Swift_Image::fromPath('nature.jpg');
    $cid = $message->embed($inline_attachment);
 
    // Set the plain-text "Body"
    $message->setBody("This is the plain text body of the message.\nThanks,\nAdmin");
 
    // Set a "Body"
    $message->addPart('This is the HTML version of the message.<br>Example of inline image:<br><img src="'.$cid.'" width="200" height="200"><br>Thanks,<br>Admin', 'text/html');*/
 
   /* // Send the message
    $result = $mailer->send($message);
} catch (Exception $e) {
  echo $e->getMessage();
}*/

include 'config.php';

if(isset($_POST['submit_form']))
{
 $name=$_POST["user_name"];
 $email=$_POST["email"];
 
 $sql ="INSERT INTO newsletter_signups(name, email) VALUES('$name','$email')";
 if(!mysqli_query($conn,$sql))
    {
        die('Error : ' . mysqli_error($conn));
    }
    else{echo "Thank You For Joining Our Newsletter";}
 
}
?>