<!DOCTYPE html>
<?php
//déclarer session
session_start(); //démarrer session
include_once("php/code.php");

$user = new Users;
$work = new Works;
?>
<html lang="fr">
<head>
	<!-- afficher un élément récupéré côté utilisateur -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style.css">
    <title>php</title>
</head>
<body>
    <p>Bonjour <?php if(isset($_SESSION["account"]["username"]))
    //voir si l'utilisateur est connecté ou pas
    {
        echo($_SESSION["account"]["username"]);
    }
    else
    {
        echo "NOT CONNECTED";
    }
        ?></p>

    <br>
    <?php
        $allworks = $work->get_works();
        //test : print_r($allworks), affiche Titre 1 + Lorem ipsum1 ds tableau;
        foreach($allworks as $w) 
        	/* on prend le résultat avec notre tableau et on lui dit: --> chaque résultat du tbl va être une variable w --> et lui va boucler et le w va changer à chaque itération automatiquement */
        {
            echo($w["title"]); //affiche les deux titres
            // retour à la ligne : echo(PHP_EOL);
            echo("|");
            echo($w["description"]); // affiche les deux desciptions
        }

    ?>
</body>
</html>