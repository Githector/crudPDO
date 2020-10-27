<?php

include 'Conexio.php';
include_once 'Mp.php';

$con = new Conexio();
$con->openConnection();


$id = $_GET["id"];



/*


$result = $con->getMpById($id);

foreach ($result as $mp){
    echo $mp['num_mp'] . ' - ' . $mp['nom_mp'] . '<br>';
}

$result = $con->getMpByIdP($id);

foreach ($result as $mp){
    echo $mp['num_mp'] . ' - ' . $mp['nom_mp'] . '<br>';
}*/



$mp = $con->getMpObjectById(5);

echo "Dades rebudes a index.php: <br>";
echo $mp->getNomMp() . '<br>';
echo $mp->getNumMp() . '<br>';
echo $mp->getIdMp() . '<br>';
$mp->setNomMp("Bases de dades");
$con->updateMpById($mp);
$con->deleteMpById(15);







$con->closeConnection();
