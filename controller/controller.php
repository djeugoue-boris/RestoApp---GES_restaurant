<?php
session_start();

require_once '../model/UserDB.php';
require_once '../model/CommandeDB.php';
require_once '../model/MenuDB.php';
require_once '../model/ReserverDB.php';
require_once '../model/TablerestaurantDB.php';
require_once '../model/TypemenuDB.php';
require_once '../model/TypetableDB.php';

require_once '../manage/Package.php';
require_once '../manage/Upload.php';
//require_once '../manage/SwiftMailerClass.php';
// require_once '../manage/PJmailClass.php';


$userdb= new UserDB();
$commandedb= new CommandeDB();
$menudb= new MenuDB();
$reserverdb= new ReserverDB();
$tablerestaurantdb= new TablerestaurantDB();
$typemenudb= new TypemenuDB();
$typetabledb = new TypetableDB();

$package= new Package();
$upload= new Upload();
//$swiftmailer= new SwiftMailerClass();
//$pjmail= new PJmailClass();



?>