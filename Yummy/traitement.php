<?php   

require_once '../controller/controller.php';

$serveur = "localhost";
$utilisateur = "root";
$mdp = "";
$base = "restojeff";


try {
    $conn = new PDO("mysql:host=$serveur; dbname=$base",$utilisateur,$mdp);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("connexion a echoue:".$e->getMessage());
}


//Recuperation des donnees du formulaire

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];
$idtablerestaurant = $_POST['idtablerestaurant'];
$nbheures = $_POST['nbheures'];
$modepaiement = $_POST['modepaiement'];
$etat = $_POST['etat'];
$dateenregistrement = $_POST['dateenregistrement'];
$datereservation = $_POST['datereservation'];
$consignes = $_POST['consignes'];



$sql1= "INSERT INTO user(nom,prenom,telephone,email,password,role) VALUES(:nom,:prenom,:telephone,:email,:password,:role)";


$reqc = $conn->prepare($sql1);
$reqc->bindParam(':nom',$nom);
$reqc->bindParam(':prenom',$prenom);
$reqc->bindParam(':telephone',$telephone);
$reqc->bindParam(':email',$email);
$reqc->bindParam(':password',$password);
$reqc->bindParam(':role',$role);

try {
    $reqc->execute();
    echo "Client enregistré avec succes";
} catch (PDOException $e) {
    echo "Erreur:".$e->getMessage();
}


$iduser = $conn->lastInsertId();

$reqr = $conn->prepare("INSERT INTO reserver (iduser,idtablerestaurant,nbheures,modepaiement,etat,dateenregistrement,datereservation,consignes) VALUES (:iduser,:idtablerestaurant,:nbheures,:modepaiement,:etat,:dateenregistrement,:datereservation,:consignes)");

$reqr->bindParam(':iduser',$iduser);
$reqr->bindParam(':idtablerestaurant',$idtablerestaurant);
$reqr->bindParam(':nbheures',$nbheures);
$reqr->bindParam(':modepaiement',$modepaiement);
$reqr->bindParam(':etat',$etat);
$reqr->bindParam(':dateenregistrement',$dateenregistrement);
$reqr->bindParam(':datereservation',$datereservation);
$reqr->bindParam(':consignes',$consignes);

try {
    $reqr->execute();
    echo "Reservation enregistrée avec succes";
} catch (PDOException $e) {
    echo "Erreur:".$e->getMessage();
}
$use == false;

if($use == false) {
    

    $_SESSION['error']= array(
        'type' => 'info', 
        'message' => 'Reservation ajoutée avec succès'
    );

    //header('Location:../app.php?view=user');
    header('Location: index.php');
}


$conn = null;
?>