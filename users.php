<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;

        }

        input {
            width: 60%;
        }

        .navbar {
            background-color: darkgreen;
            text-align: center;
            padding: 20px 0;
        }

        .navbar h1 {
            color: white;
            margin: 0;
            font-size: 24px;
        }

        .container {
            display: flex;
            justify-content: space-around;
            margin: 20px;
            width: 50%;
            margin-left: 25%;

        }

        .form-container {
            background-color: white;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 45%;
        }

        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"] {
            width: 60%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container input[type="submit"] {
            background-color: darkgreen;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 10px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: darkgreen;
        }

        .login-form {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>

<body>
<div class="navbar">
        <h1>Inscription et Connexion</h1>
    </div>
    <div class="container">
    <div class="form-container">
        <h3>Formulaire d'inscription</h3>
        <form action="" method="post">
        <div>
            <label for="prenom">Nom complet : </label>
            <input type="text" id="prenom" name="nom"><br><br>
        </div>
        
        <div>
            <label for="mail"> Adresse mail :</label>
            <input type="email" id="mail" name="mail_adrs"><br><br>
        </div>

        <div>
            <label for="pwd">Mot de passse : </label>
            <input type="password" id="pwd" name="passW"><br><br>
        </div>
        
        <div>
            <label for="confirm">Confirmez le mot de passse : </label>
            <input type="password" id="pwd"><br><br>
         </div>

         <input type="submit" value="Entrez" name="entrer"><br><br>
        </form>
    </div>


 <hr>
    
    <div class="form-container">
        <h3>Formulaire de connexion</h3>
        <form action="" method="post">

        <div>    
            <label for="e_mail"> Adresse mail :</label>
            <input type="email" id="e_mail" name="adrs_mail"><br><br>
        </div>

    <div> 
            <label for="pw">Mot de passse : </label>
            <input type="password" id="pw" name="passw"><br><br>
    </div>
            <input type="submit" value="Connectez" name="connecter"><br><br>

        </form>

    </div>
    </div>
    


</body>


</html>


<?php

include("bd_user.php");
global $conne;

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    if (isset($_POST["entrer"])) {
        $nom = $_POST["nom"];
        $mail = $_POST["mail_adrs"];
        $pwd = $_POST["passW"];

        echo $nom . "<br>";
        echo $mail . "<br>";
        echo $pwd . "<br><br>";

        $sql = "INSERT INTO users (nom_user, mail_adress, passWord)
    VALUES(:nom_user, :mail_adress, :passWord)";
        $insert = $conne->prepare($sql);
        $insert->bindValue(':nom_user', $nom);
        $insert->bindValue(":mail_adress", $mail);
        $insert->bindValue(":passWord", $pwd);

        if ($insert->execute()) {
            echo "Insertion bi dialena";
        } else {
            "Kholaatal sa insertion";
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] === 'POST') {


    $message = '';
    if (isset($_POST["connecter"])) {
        $e_mail = $_POST["adrs_mail"];
        $pass = $_POST["passw"];

        $ql1 = "SELECT * FROM users WHERE mail_adress = :mail_adress";
        $stmt = $conne->prepare($ql1);
        $stmt->bindParam(":mail_adress", $e_mail);

        $stmt->execute();

        $user = $stmt->fetch();
        if ($user && $pass === $user['passWord']) {




            echo "User présent !!!";
        } else {
            $message = 'user absent ou données incorrectes';

            echo $message;
        }
    }
}



?>