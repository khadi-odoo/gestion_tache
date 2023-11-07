<?php
// Inclure le fichier de connexion à la base de données
include("bd_user.php");

// Requête SQL pour récupérer les données
$sql = "SELECT * FROM tache";
$result = $conne->query($sql);

// Afficher les données dans un tableau HTML
if ($result->rowCount() > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Id tâche</th><th>Titres</th><th>Priorités</th><th>Statuts</th><th>Description</th><th>Dates</th><th>Actions</th></tr>";

    while ($row = $result->fetch()) {
        echo "<tr>";
        echo "<td>" . $row["id_tache"] . "</td>";
        echo "<td>" . $row["titre"] . "</td>";
        echo "<td>" . $row["priorite"] . "</td>";
        echo "<td>" . $row["statut"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>";
        echo "<form action='modifier.php' method='post'>";

        echo "<a href='modifier.php'><button style='background-color: green; color: white;' name='modif'>Modifiez</button></a>";
        echo '<input type="hidden" name="modi" value="' . $row["id_tache"] . '">';
        echo "<a href='modifier.php'><button style='background-color: red; color: white;' name='delete'>Supprimez</button></a>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 résultats";
}
