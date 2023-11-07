<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des tâches</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .lop {
            margin-left: 19%;
        }

        .navbar {
            background-color: green;
            text-align: center;
            padding: 20px 0;
        }

        .task-container {
            text-align: left;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            width: 60%;
        }

        .leye {
            color: rgb(251, 246, 246);
        }

        .task-container h1 {
            font-size: 24px;
        }

        .task-container p {
            font-size: 16px;
        }

        .task-container .inline-elements {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .task-container .inline-elements p {
            margin: 0;
            color: red;
            /* Change text color to red */
        }

        .task-container .inline-elements .paragraph {
            color: green;
        }

        .task-container input[type="submit"] {
            background-color: green;
            color: rgb(246, 244, 244);
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Additional CSS for new task elements */
        .task-container+.task-container {
            margin-top: 20px;
        }

        .lp {
            margin-top: 10px;
            color: black;
        }

        .add-task {
            text-align: left;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            width: 60%;
        }

        .add-task h1 {
            font-size: 24px;
            color: black;
        }

        .add-task label {
            display: block;
            margin-top: 10px;
        }

        .add-task select,
        .add-task input[type="text"],
        .add-task textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #e5e3e3;
            border-radius: 5px;
        }

        .add-task button {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* detailtache */


        body {
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: green;
            text-align: center;
            padding: 20px 0;
        }

        .navbar h1 {
            color: white;
        }

        .task-details {
            text-align: left;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            width: 60%;
        }

        .task-details h1 {
            font-size: 24px;
            margin: 5px;
            padding: 15px;
            height: 80px;
        }

        .task-details p {
            font-size: 16px;

        }

        label {
            font-size: 20px;
            width: 10px;
        }

        select {
            width: 400px;
        }

        textarea {
            width: 400px;
        }

        #sauvegard {
            background-color: green;
            color: rgb(246, 244, 244);
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 150px;
        }

        .task-details .inline-elements {
            display: flex;
            justify-content: left;
            align-items: center;
            height: 10px;
        }

        .task-details .inline-elements p {
            margin: 5px;
            height: 100px;
        }

        .task-details button {
            background-color: green;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .button-container {
            margin-top: 20px;
            text-align: left;
        }

        .button-retour {
            margin-top: 20px;
            text-align: center;
            width: 100%;
        }

        .priority {
            color: red;
        }

        .status {
            color: green;
            margin-left: 10px;


        }

        input {
            width: 400px;
            padding: 10px;
            vertical-align: middle;

        }

        /* Style des messages d'erreur */
        .error-message {
            color: #FF0000;
            font-size: 14px;
            margin-top: 10px;
            max-width: 200px;
        }

        .container {
            background-color: #fff;
            width: 842px;
            height: 300px;
            display: block;
            align-items: center;
            margin: 0 auto;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <h1>Gestion des tâches</h1>
    </div>
    <div class="container">
        <form action="" method="post">
            <h2>Ajouter une nouvelle tâche</h2>

            <label for="titre">Titre : </label>
            <input type="text" id=titre name="titr"><br><br>
            <label for="priorite">Prioririté</label>
            <select name="prio" id="priorities">
                <option value="Haute">Haute</option>
                <option value="Moyenne">Moyenne</option>
                <option value="Basse">Basse</option>
            </select>

            <br><br>
            <label for="status">Statuts:</label>
            <select name="statut" id="status">
                <option value="En attente">En attente</option>
                <option value="En cours">En cours</option>
                <option value="Terminée">Réalisé</option>
            </select><br><br>
            <label for="description">Description</label>
            <textarea id="description" name="descript"></textarea><br><br>
            <label for="date_task">Date</label>
            <input type="date" id="date_task" name="dat"><br><br>
            <input type="submit" value="Sauvegarder" name="sauver" id="sauvegard"><br><br>
        </form>
    </div>
</body>

</html>

<?php
include("bd_user.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["sauver"])) {

        $titre = $_POST["titr"];
        $prio = $_POST["prio"];
        $status = $_POST["statut"];
        $descript = $_POST["descript"];
        $date = $_POST["dat"];


        $sql2 = "INSERT INTO tache (titre, priorite, statut, description, date)
VALUES(:titre, :priorite, :statut, :description, :date)";
        $st = $conne->prepare($sql2);
        $st->bindValue(":titre", $titre);
        $st->bindValue(":priorite", $prio);
        $st->bindValue(":statut", $status);
        $st->bindValue(":description", $descript);
        $st->bindValue(":date", $date);


        if ($st->execute()) {
            // var_dump($st);
            echo $titre . "<br><br>";
            echo $prio . "<br><br>";
            echo $status . "<br><br>";
            echo $descript . "<br><br>";
            echo $date . "<br><br>";
            echo "Une tâche nouvellement créée <br><br>";
        } else {
            "Erreur !!!";
        }
    }
}

?>

<?php

// include("bd_user.php");

// $pdo = $conne->prepare("SELECT * FROM tache WHERE id_tache = :id_tache");
// $pdo->bindValue(':id_tache', $_POST["num"]);
// $pdo->execute();
// $ligne = $pdo->fetch();

?>