<?php


require '../../database/ClientDB.php';
require '../../database/DicoDB.php';
require '../../database/DocumentDB.php';
require '../../database/LicenceDB.php';
require '../../database/NomcommercialDB.php';
require '../../database/NotificationDB.php';
require '../../database/ProduitDB.php';
require '../../database/SuggestionDB.php';
require '../../database/TransactionDB.php';
require '../../database/UtilisateurDB.php';








$clientbd= new ClientDB();
$dicobd= new DicoDB();
$documentbd= new DocumentDB();
$licencebd= new LicenceDB();
$nomcommercialbd= new NomcommercialDB();
$notificationbd= new NotificationDB();
$produitbd= new ProduitDB();
$suggestionbd= new SuggestionDB();
$transactionbd= new TransactionDB();
$utilisateurbd= new UtilisateurDB();









$action= $_REQUEST['action'];









if($action == 'print') {
    $idutilisateur= $_REQUEST['idutilisateur'];
    $idlicence= $_REQUEST['idlicence'];
    $idnomcommercial= $_REQUEST['idnomcommercial'];

    $utilisateur= $utilisateurbd->read($idutilisateur);
    $licence= $licencebd->read($idlicence);
    $nomcommercial= $nomcommercialbd->read($idnomcommercial);



    $url_model= $_REQUEST['url'];



    $ligne= $_REQUEST['ligne'];
    $list_iddocument= explode(";", $ligne);






    //Chargement de la liste des documents
    $documents= [];
    $index= 0;
    foreach($list_iddocument as $iddocument) {
        $documents[$index]= $documentbd->read($iddocument);
        $index++;
    }






    //Chargement de la liste des noms commercials
    $nomcommercials= [];
    $index= 0;
    foreach($documents as $document) {
        $nomcommercial= $nomcommercialbd->read($document->idnomcommercial);

        $nomcommercials[$index]= $nomcommercial;
        $index++;
    }






    //Chargement de la liste des clients
    $clients= [];
    $index= 0;
    foreach($documents as $document) {
        $client= $clientbd->read($document->idclient);

        $clients[$index]= $client;
        $index++;
    }

}

ob_start();

?>


























<style type="text/css">
    * {
        font-size: 8pt;
        text-align: center;
    }

    table {
        width: 100%;
        margin: 0;
        border-collapse: collapse;
    }

    tr {
        width: auto;
    }

    th, td {
        padding: 1px 1px;
        border: 1px solid black;
    }

    th {
        text-align: center;
        vertical-align: middle;
        font-weight: bold;
    }

    td {
        vertical-align: top;
        text-align: left;
    }

    img {
        margin: auto;
        border: 0px;
        width: 15%;
    }


    

    .block1 th, .block1 td {
        width: 50%;
        border: none;
    }
    .block2 th, .block2 td {
        width: 11.11%;
        text-align: center;
        vertical-align: middle;
    }
    .block3 th, .block3 td {
        width: 100%;
        border: none;
    }





    .left {
        text-align: left;
    }

    .right {
        text-align: right;
    }

    .center {
        text-align: center;
    }

    .bold {
        font-weight: bold;
    }

    .bigsize {
        font-size: 9pt;
    }

</style>





<?php

for($i= 0; $i< sizeof($documents); $i++) {

?>




<page backleft="2mm" backright="2mm" backtop="2mm" backbottom="2mm" footer="page; date; heure">

    <table class="block1">
        <tr>
            <th class="left">
                <?php if($nomcommercials[$i]->logo != 'empty') { ?>
                    <img src="<?php echo '../upload/img/logo/' . $nomcommercials[$i]->logo ?>" />
                <?php } else { ?>
                    <!-- <img src="assets/img/logo.jpg" /> -->
                <?php } ?>
            </th>


            <th class="right bigsize">
                <?php echo $documents[$i]->header ?> N° <?php echo $documents[$i]->code ?>
                <br />

                Date : <?php echo $documents[$i]->datecreation ?>
                <br />

                <?php if($documents[$i]->dateecheance != '') { ?>
                    Echéance : <?php echo $documents[$i]->dateecheance ?>
                <?php } ?>
            </th>
        </tr>


        <tr>
            <td class="left">
                <br />
                <?php echo $nomcommercials[$i]->intitule ?>
                <br />

                <?php echo $nomcommercials[$i]->numcontribuable ?>
                <br />

                <?php echo $nomcommercials[$i]->adresse ?>
                &nbsp;
                <?php echo $nomcommercials[$i]->codepostal ?>
                <br />

                <?php echo $nomcommercials[$i]->ville ?>
                &nbsp;
                <?php echo $nomcommercials[$i]->pays ?>
                <br />

                <?php echo $nomcommercials[$i]->portable ?>
                / 
                <?php echo $nomcommercials[$i]->telephone ?>
                <br />

                <?php echo $nomcommercials[$i]->email ?>
                <br />

                <?php echo $nomcommercials[$i]->siteweb ?>
            </td>
            <td class="right">
                <br />
                <strong>
                    <?php echo $clients[$i]->nom ?>
                    &nbsp;
                    <?php echo $clients[$i]->prenom ?>
                </strong>
                <br />

                <strong>
                    <?php echo $clients[$i]->nomentreprise ?>
                </strong>
                <br />

                <?php echo $clients[$i]->portable ?>
                /
                <?php echo $clients[$i]->telephone ?>
                <br />

                <?php echo $clients[$i]->adresse ?>
                <br />

                <?php echo $clients[$i]->codepostal ?>
                &nbsp;
                <?php echo $clients[$i]->ville ?>
                &nbsp;
                <?php echo $clients[$i]->pays ?>
            </td>
        </tr>


        <tr>
            <td colspan="2" class="center">
                <br />
                <?php echo $documents[$i]->message ?>
            </td>
        </tr>
    </table>






























    <br />
    <table class="block2">
        <tr>
            <th>
                Ref
            </th>
            <th>
                Designation
            </th>
            <th>
                Date
            </th>
            <th>
                Qté
            </th>
            <th>
                Unité
            </th>
            <th>
                Prix unitaire
                <br />
                <?php echo $nomcommercials[$i]->devise ?>
            </th>
            <th>
                Remise
                <br />
                %
            </th>
            <th>
                TVA
                <br />
                %
            </th>
            <th>
                Montant
                <br />
                <?php echo $nomcommercials[$i]->devise ?>
            </th>
        </tr>


        <?php if($documents[$i]->listeproduits != '') { ?>
            <?php for($j= 0; $j<sizeof(explode(";", $documents[$i]->listeproduits)); $j++) { ?>
                <tr>
                    <td>
                        <?php echo explode("-->", explode(";", $documents[$i]->listeproduits)[$j])[0] ?>
                    </td>

                    <td>
                        <?php echo explode("-->", explode(";", $documents[$i]->listeproduits)[$j])[1] ?>
                    </td>

                    <td>
                        <?php echo explode("-->", explode(";", $documents[$i]->listeproduits)[$j])[2] ?>
                    </td>

                    <td>
                        <?php echo explode("-->", explode(";", $documents[$i]->listeproduits)[$j])[3] ?>   
                    </td>

                    <td>
                        <?php echo explode("-->", explode(";", $documents[$i]->listeproduits)[$j])[4] ?>
                    </td>

                    <td>
                        <?php echo explode("-->", explode(";", $documents[$i]->listeproduits)[$j])[5] ?>
                    </td>

                    <td>
                        <?php echo explode("-->", explode(";", $documents[$i]->listeproduits)[$j])[6] ?>
                    </td>

                    <td>
                        <?php echo explode("-->", explode(";", $documents[$i]->listeproduits)[$j])[7] ?>
                    </td>

                    <td>
                        <?php echo explode("-->", explode(";", $documents[$i]->listeproduits)[$j])[8] ?>
                    </td>
                </tr>
            <?php } ?>
        <?php } ?>


        <?php if($documents[$i]->listecharges != '') { ?>
            <?php for($j= 0; $j<sizeof(explode(";", $documents[$i]->listecharges)); $j++) { ?>
                <tr>
                    <td colspan="8" class="bold">
                        <?php echo explode("-->", explode(";", $documents[$i]->listecharges)[$j])[1] ?>
                    </td>

                    <td>
                        <?php echo explode("-->", explode(";", $documents[$i]->listecharges)[$j])[2] ?>
                    </td>
                </tr>
            <?php } ?>
        <?php } ?>


        <tr>
            <td colspan="8" class="bold">
                <?php echo 'Total (TTC)' ?>
            </td>

            <td>
                <?php echo $documents[$i]->montantttc ?>
            </td>
        </tr>


    </table>





























    <br />
    <table class="block3">
        <tr>
            <td>
                <?php if($documents[$i]->modepaiement != '') { ?>
                    <strong>Moyens de paiement :</strong> 
                    <?php echo explode("-->", $documents[$i]->modepaiement)[1] ?>
                <?php } ?>
                <br />

                <?php if($documents[$i]->conditionpaiement != '') { ?>
                    <strong>Condition de paiement :</strong> 
                    <?php echo explode("-->", $documents[$i]->conditionpaiement)[1] ?>
                <?php } ?>
                <br />

                <?php if($documents[$i]->dateecheance != '') { ?>
                    <strong>Echéance :</strong> 
                    <?php echo $documents[$i]->dateecheance ?>
                <?php } ?>
            </td>
        </tr>


        <tr>
            <td class="center">
                <br />
                <?php if($nomcommercials[$i]->cachet != 'empty') { ?>
                    <img src="<?php echo '../upload/img/cachet/' . $nomcommercials[$i]->cachet ?>" />
                <?php } else { ?>
                    <!-- <img src="assets/img/cachet.jpg" /> -->
                <?php } ?>


                <?php if($nomcommercials[$i]->signature != 'empty') { ?>
                    <img src="<?php echo '../upload/img/signature/' . $nomcommercials[$i]->signature ?>" />
                <?php } else { ?>
                    <!-- <img src="assets/img/signature.jpg" /> -->
                <?php } ?>

            </td>
        </tr>


        <tr>
            <td class="center">
                <br />
                <?php echo $documents[$i]->footer ?>
                <br />
            </td>
        </tr>
    </table>


    <page_footer>
        <?php echo $nomcommercials[$i]->intitule ?>
        <br />
        <?php echo $nomcommercials[$i]->adresse ?>
        <?php echo $nomcommercials[$i]->codepostal ?>
        <?php echo $nomcommercials[$i]->ville ?>
        <?php echo $nomcommercials[$i]->pays ?>
        <br />
        <?php echo $nomcommercials[$i]->numcontribuable ?>
    </page_footer>

</page>





<?php

}

?>























<?php

$content= ob_get_clean();

require_once '../../traitement/Package.php';
require_once 'html2pdf/vendor/autoload.php';

$package= new Package();


$chemin= realpath("files") . '\/web/';


$fichier= 'file-' . $idutilisateur . '.pdf';


$url= dirname($_SERVER['SERVER_PROTOCOL']) . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url= substr($url, 0, strrpos($url, "/")+1) . "files/web/";


try {
    $html2pdf = new HTML2PDF('L', 'A5', 'fr', true, 'UTF-8'); // P -- portrait et L -- paysage
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->pdf->SetAuthor('Flash Invoice');
    $html2pdf->pdf->SetTitle('Document-' . date('d.m.Y_H.i.s'));
    $html2pdf->pdf->SetSubject('Document comptable');
    $html2pdf->pdf->SetKeywords('Facture, Devis, Reçu, Client, Produit, Service, Rapport');

    $html2pdf->writeHTML($content);



    //--------> Pour envoyer le fihier au client (navigateur)
    //$html2pdf->Output($fichier);




    //-------> Pour forcer le navigateur a telecharger le fichier
    //header("Content-Type: application/pdf");
    //header("Content-Type: application/force-download");
    //$html2pdf->Output($fichier, 'D'); 



    //--------> Pour enregistrer le fichier sur le serveur
    $html2pdf->Output($chemin . $fichier, 'F'); 
    


    //-------> Mode debug
    //$html2pdf->setModeDebug(); 
}catch (HTML2PDF_exception $e) {
    die($e);
}





$tab= array(
    'documents' => $documents,
    'nomcommercials' => $nomcommercials,
    'clients' => $clients,
    'pdf' => $url . $fichier,
    'viewer' => $url . 'viewer.php?file=' . $fichier,
    'viewerprint' => $url . 'viewer.php?file=' . $fichier . '&print=1',
    'viewerdownload' => $url . 'viewer.php?file=' . $fichier . '&download=1'
);

echo json_encode($tab);



?>





