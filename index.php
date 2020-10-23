<?php

include 'Conexio.php';

$con = new Conexio();
$con->openConnection();


$id = $_GET["id"];

echo $id . '<br>';





$result = $con->getMpById($id);

foreach ($result as $mp){
    echo $mp['num_mp'] . ' - ' . $mp['nom_mp'] . '<br>';
}


$con->closeConnection();