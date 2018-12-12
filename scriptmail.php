<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<?php
    require_once __DIR__.'/vendor/autoload.php';
    echo 'Mail sent'; 

    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
      ->setUsername('ico2invest@gmail.com')
      ->setPassword('Tr2rqFa2OUX4MSNM6DQl');

    $mailer = new Swift_Mailer($transport);

    $mailer = new Swift_Mailer($transport);
    $message = (new Swift_Message('Wonderful Subject'))
      ->setFrom(['john@doe.com' => 'John Doe'])
      ->setTo(['ico2invest@gmail.com', 'ico2invest@gmail.com' => 'A name'])
      ->setBody('Here is the message itself');

    $result = $mailer->send($message);

?>
</body>
</html>