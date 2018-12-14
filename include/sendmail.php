<?php
    require_once '../vendor/autoload.php';

    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
      ->setUsername('ico2invest@gmail.com')
      ->setPassword('Tr2rqFa2OUX4MSNM6DQl');


    $emailTo = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $ico_name = $_POST['ico_name'];
    $website = $_POST['website'];
    $message = $_POST['message'];
    $description = $_POST['description'];

    $mailer = new Swift_Mailer($transport);
    $message = (new Swift_Message('NEW ICO'))
      ->setFrom(array($emailTo => $fname))
      ->setTo(['ico2invest@gmail.com' => 'A name'])
      ->setBody('EMAIL: '. $emailTo .  PHP_EOL .
                'Name: '. $fname .' '. $lname . PHP_EOL .
                'ICO Name: '. $ico_name .  PHP_EOL .
                'Website: '. $website .  PHP_EOL .
                'Short description: '. PHP_EOL . $message .  PHP_EOL .
                'Long description: '. PHP_EOL . $description);

    $result = $mailer->send($message);

/*  if ( $result > 0 )
    {
        echo "email was sent";//Email was sent
    }
    else
    {
         echo "email wasnt sent";// Email was not sent
    }*/


?>
    <script>
    if (<?php  echo $result; ?> > 0) {
      alert("Email was sent!");
    }
    else {
      alert("Email wasnt sent!");
    }
    </script>

    <?php 
      header("Location: ../public/new_ico");
     ?>