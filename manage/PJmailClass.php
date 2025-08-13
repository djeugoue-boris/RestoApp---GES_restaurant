<?php

require_once 'pjmail/pjmail.class.php';

class PJmailClass12 {
  
    public function __construct() {
    }

    public function sendMail($objet= "Test sur PJmail", 
                            $contenu= "Testé <b>PJmail</b> est un réel plaisir.", 
                            $destinataire= 'mtejiogni@gescope.com') {

        $mail= new PJmail();

        // ajout de l'expediteur
        $mail->setAllFrom('mtejiogni@yahoo.fr');
        //$mail->setAllFrom('mtejiogni@gescope.com','IKIMIA');

        // ajout du destinataire
        $mail->addrecipient($destinataire);
        // $mail->addrecipient('mtejiogni@gescope.com', 'Nom');
        // Copie cachée
        // $mail->addbcc('mtejiogni@gescope.com','TEJIOGNI Marc');

        //ajout du sujet
        $mail->addsubject($objet);

        // Ajout du message
        $mail->html = $contenu;

        // Joindre un fichier
        //$mail->addattachement('../print/files/file-1.pdf');

        // envoie du message
        return $mail->sendmail();
    }

}

?>






