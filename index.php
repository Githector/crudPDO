<?php

include 'Conexio.php';
include_once 'Mp.php';

$con = new Conexio();
$con->openConnection();

echo htmlspecialchars($_GET['nomMp']);

//http://localhost/?nomMp=%3Cscript%3Ealert(%22Hello%22)%3C/script%3E


//Afegir Mp directe
$con->addMp(8,"sdlkf");

echo $con->getMpObjectById(4)->getNomMp();

//Afegir un Mp a través de dades rebudes amb get
//$con->addMp($_GET['numMp'],$_GET['nomMp']);

//Consulta llista de Mps
//$result = $con->getAllMps();
/*foreach ($result as $mp){
    echo $mp["num_mp"] . " -> " . $mp["nom_mp"] . "<br>";
}*/

//Consulta de un MP
/*$res = $con->getMpById($_GET['id']);
foreach ($res as $mp){
    echo $mp['num_mp'] . ' - ' . $mp['nom_mp'] . '<br>';
}*/

//URL's possibles
//http://localhost/?id=2
//http://localhost/?id=2 or 1=1
//http://localhost/?id=2; DROP TABLE mp;


//Si ara ho fem amb l'altre mètode'

/*$res = $con->getMpByIdP($_GET['id']);
foreach ($res as $mp){
    echo $mp['num_mp'] . ' - ' . $mp['nom_mp'] . '<br>';
}*/





$con->closeConnection();

?>


