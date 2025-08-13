<?php 

require_once 'swiftmailer/vendor/autoload.php';

class SwiftMailerClass {
  
  public function __construct() {
  }


  public function sendMail($objet= "Test sur SwiftMailer", 
                            $contenu= "Testé <b>SwiftMailer</b> est un réel plaisir.", 
                            $destinataires= ['mtejiogni@gescope.com']) {

    // Create the Transport
    $transport= new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls');
    $transport->setUsername('mtejiogni1992@gmail.com');
    $transport->setPassword('Voisin-123');

    //simuler la securite SSL
    $transport->setStreamOptions(array('ssl' => array('allow_self_signed' => true, 'verify_peer' => false)));

    $mailer= new Swift_Mailer($transport);


    // Create a message
    $message= new Swift_Message();
    $message->setCharset('utf-8');
    $message->setSubject($objet);
    $message->setBody($contenu, 'text/html');


    //--> Ici les infos de 'setFrom' doivent correspondrent aux infos de $transport 
    $message->setFrom(['mtejiogni1992@gmail.com' => 'TEJIOGNI Marc']);


    $message->setTo($destinataires);
    //$message->addTo('person2@example.org', 'Person 2 Name');
    //$message->addCc('person2@example.org', 'Person 2 Name');
    //$message->addBcc('person2@example.org', 'Person 2 Name');


    // Send the message
    return $mailer->send($message);
  }























  public function sendMail2($objet= "Test sur SwiftMailer", 
                            $contenu= "Testé <b>SwiftMailer</b> est un réel plaisir.", 
                            $destinataires= ['mtejiogni@yahoo.fr']) {

    // Create the Transport
    $transport= new Swift_SmtpTransport('mail.gescope.com', 2080, 'tls');
    $transport->setUsername('contact@gescope.com');
    $transport->setPassword('www.gescope.com');

    //simuler la securite SSL
    $transport->setStreamOptions(array('ssl' => array('allow_self_signed' => true, 'verify_peer' => false)));

    $mailer= new Swift_Mailer($transport);


    // Create a message
    $message= new Swift_Message();
    $message->setCharset('utf-8');
    $message->setSubject($objet);
    $message->setBody($contenu, 'text/html');


    //--> Ici les infos de 'setFrom' doivent correspondrent aux infos de $transport 
    $message->setFrom(['contact@gescope.com' => 'GeScope']);


    $message->setTo($destinataires);
    //$message->addTo('person2@example.org', 'Person 2 Name');
    //$message->addCc('person2@example.org', 'Person 2 Name');
    //$message->addBcc('person2@example.org', 'Person 2 Name');


    // Send the message
    return $mailer->send($message);
  }


























  public function sendMail_WithFile($objet= "Test", 
                            $contenu= "Teste sur l'envoie de mail", 
                            $destinataires= ['mtejiogni@gescope.com'],
                            $file) {

    // Create the Transport
    $transport= new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls');
    $transport->setUsername('mtejiogni1992@gmail.com');
    $transport->setPassword('Voisin-123');

    //simuler la securite SSL
    $transport->setStreamOptions(array('ssl' => array('allow_self_signed' => true, 'verify_peer' => false)));

    $mailer= new Swift_Mailer($transport);


    // Create a message
    $message= new Swift_Message();
    $message->setCharset('utf-8');
    $message->setSubject($objet);
    $message->setBody($contenu, 'text/html');


    //--> Ici les infos de 'setFrom' doivent correspondrent aux infos de $transport 
    $message->setFrom(['mtejiogni1992@gmail.com' => 'TEJIOGNI Marc']); 


    $message->setTo($destinataires);
    //$message->addTo('person2@example.org', 'Person 2 Name');
    //$message->addCc('person2@example.org', 'Person 2 Name');
    //$message->addBcc('person2@example.org', 'Person 2 Name');


    //---> ajout de fichier

    $file_name= $file['name'];
    $file_type= $file['type'];
    $file_tmp_name= $file['tmp_name'];
    $file_error= $file['error'];
    $file_size= $file['size'];

    $file_extension= strtolower(strrchr($file_name, "."));
    $file_rename= date('dmY') . $file_extension;

    $attachment= Swift_Attachment::fromPath($file_tmp_name);
    $attachment->setFilename($file_name);
    $message->attach($attachment);

    // Send the message
    return $mailer->send($message);
  }



}



?>
