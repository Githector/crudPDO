<?php
require_once("services/mp/MpsServiceImpl.php");
require_once("model/Mp.php");

$con = new MpsServiceImpl();

$con->openConnection();


//$res = $con->addMp(7,"Servidor");
//$res = $con->getAllMps();
//$mp = $con->getMpById(3);
//$mp = $con->getMpByIdOld(3);

/*
foreach ($mp as $item) {
    echo $item['nom_mp'] . "<br>";
}
*/

//echo $mp->getNomMp();


/*    foreach ($res as $mp){
        echo $mp["num_mp"] . " - " . $mp["nom_mp"] . "<br>";
    }*/


$con->closeConnection();


?>


