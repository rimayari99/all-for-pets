<?php
include 'include/carte.php ';
include 'include/carteC.php';

if(isset($_POST["ID_CLIENT"]) and isset($_POST["total"]) and isset($_POST["type"]))
{
    $C=new carte($_POST["ID_CLIENT"],$_POST["total"],$_POST["type"] );
 
    $ajouCa=new carteC();
    $ajouCa->ajoutCarte($C);
    header('location:carte.php');
}
else
{
    echo "Erreur";
}
?>

  