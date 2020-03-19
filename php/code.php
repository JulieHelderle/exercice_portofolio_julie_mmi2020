<?php
require("database.php");

class Users {
    function get_user($id)
    {
        global $db;

        //récupérer un élément ciblé à une base de donnée
        $request = "SELECT * FROM Users WHERE id=$id";
        $resultat = $db->query($request);
        $user = $resultat->fetch();

        return($user);
    }

    // stocker quelque part dans le cookie account les infos
    function connect($username, $password)
    {
        global $db;
        echo($username); // debug

        //chercher l'utilisateur
        $request = "SELECT * FROM Users WHERE username=\"$username\"";
        $resultat = $db->query($request);
        $user = $resultat->fetch();

        //vérifier que le mdp du user est le bon
        if(password_verify($password, $user["password"]))
        {
            session_start(); //démarrer ma session

            /*ma session = un tableau  |  acount id = id que j'ai récupéré
			 | account username= username que j'ai récupéré*/
            $_SESSION["account"] = [
                'id' => $user["id"],
                'username' => $user["username"]
            ];

            // rediriger l'utilisateur sur ma homepage
            header('Location: /');
        }
        else
        {
            echo("Impossible de se connecter");
        }
    }
}

class Works {
    function get_works()
    {
        global $db;

        $request = "SELECT * FROM works"; // requête
        $resultat = $db->query($request);
        $user = $resultat->fetchAll(); // récup tous ce qui a ds les travaux

        return($user);
    }

    //créer dans la base de donnée
	//protéger les requêtes
    function create($title, $description)
    {
        global $db;

        $request = $db->prepare('INSERT INTO works (title, description) VALUES (?, ?)'); // prepare protège contre l'injection sql
        $request->execute([$title, $description]); //excécuter requetes avec les 2 vraies valeurs
    }

    function update($title, $description, $id)
    {
        global $db;

        $request = $db->prepare('UPDATE works SET title=?, description=? WHERE id=?');
        $request->execute([$title, $description, $id]);
    }

}
?>