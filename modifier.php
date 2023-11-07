<?php
include('bd_user.php');
if (isset($_POST["modif"])) {
    $id = $_POST['modi'];
    $update = $conne->prepare("UPDATE tache set statut = 'Terminée' WHERE id_tache=:id_tache");
    $update->bindValue(':id_tache', $id);
    $update->execute();
    echo "Donnée mise à jour <br><br>";
} else {
    echo "Donnée non mise à jour <br><br>";
}

if (isset($_POST["delete"])) {
    $id = $_POST['modi'];
    $delete =  $conne->prepare("DELETE FROM tache  WHERE id_tache=:id_tache");
    $delete->bindValue(':id_tache', $id);
    $delete->execute();
    echo "Donnée supprimée";
} else {
    echo "Donnée non supprimée";
}
