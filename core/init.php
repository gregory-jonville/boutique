<?php ob_start();

include_once 'database/connexion.php';
include_once 'classes/user.php';

session_start();
$db = new Database();
$getFromU = new User($db);
$pdo = $db->connectDb();

define('BASE_URL', 'http://localhost/boutique/');




?>