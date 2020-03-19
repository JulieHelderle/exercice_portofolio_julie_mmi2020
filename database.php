<?php
//se connecter et faire le lien avec une base de donnée
$DB_DSN = "mysql:dbname=juliehelderle;host=localhost";
$DB_USER = "juliehelderle";
$DB_PASSWORD = "vf8snb_R";

try {
    $db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
echo 'Echec de la connexion : ' . $e->getMessage();
}

?>