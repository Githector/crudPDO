<?php

require_once("IMpsService.php");

class MpsServiceImpl implements IMpsService
{
    private $host;
    private $db;
    private $dsn;
    private $user;
    private $pass;
    public $conexio;

    public function __construct()
    {
        $this->host = 'mysql';
        $this->db = "daw_db";
        $this->dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db . ';';
        $this->user = 'hector';
        $this->pass = "123456";
    }

    public function openConnection()
    {
        try {
            $this->conexio = new PDO($this->dsn, $this->user, $this->pass);
            echo 'Connexio ok<br>';
            return $this->conexio;
        }catch (PDOException $ex){
            echo "Error: " . $ex;
            return null;
        }
    }

    public function closeConnection()
    {
        try {
            $this->conexio=null;
            return $this->conexio;
        }catch (PDOException $ex){
            echo "Error: " . $ex;
            return null;
        }
    }

    public function getAllMps() : array
    {
        try{
            $result = $this->conexio->query("SELECT * FROM mp");
            return $result;
        }catch(PDOException $ex){
            echo "Error: " . $ex;
        }
        return array();
    }

    public function addMp($numMp, $nomMp) : boolean
    {

        try{
            $result = $this->conexio->query("INSERT INTO mp (id_mp,num_mp,nom_mp) VALUES(null,'$numMp','$nomMp')");
            echo "Afegit<br>";
            return true;
        }catch(PDOException $ex){
            echo "Error: " . $ex;
        }
        return false;
    }

    public function getMpById($id) : Mp
    {
        try{
            $query = "SELECT * FROM mp WHERE id_mp=$id";
            //echo $query . '<br>';
            $result = $this->conexio->query($query);
            return $result;
        }catch(PDOException $ex){
            echo "Error: " . $ex;
        }
        return null;
    }

    public function getMpByIdP($id)
    {
        try{
            //echo $id . '<br>';
            $statement = $this->conexio->prepare("SELECT * FROM mp WHERE id_mp= ?");
            /*$statement->execute(
                array(
                    ':id' => $id
                )
            );*/
            $statement->execute(
                array($id)
            );
            $result = $statement->fetchAll();
            return $result;
        }catch(PDOException $ex){
            echo "Error: " . $ex;
        }
    }

    public function updateMpById($mp)
    {
        try{
            echo "Dades rebudes a updateMpById: <br>";
            echo $mp->getNomMp() . '<br>';
            echo $mp->getNumMp() . '<br>';
            echo $mp->getIdMp() . '<br>';
            $querySql = "UPDATE mp SET nom_mp=?, num_mp=? WHERE id_mp=?";
            $statement = $this->conexio->prepare($querySql);
            $statement->execute(array(
                $mp->getNomMp(),
                $mp->getNumMp(),
                $mp->getIdMp()

            ));


        }catch(PDOException $ex){
            echo "Error: " . $ex;
        }
    }

    public function deleteMpById($id)
    {
        try{
            $querySql = "DELETE FROM mp WHERE id_mp=?";
            $statement = $this->conexio->prepare($querySql);
            $statement->execute(array(
                $id
            ));


        }catch(PDOException $ex){
            echo "Error: " . $ex;
        }
    }

    public function getMpObjectById($id)
    {
        try{
            $query = "SELECT * FROM mp WHERE id_mp=:id";
            $statement = $this->conexio->prepare($query);
            $statement->execute(
                array(
                    ':id' => $id
                )
            );

            $result = $statement->fetch();
            echo "Result <br>";
            //$statement->setFetchMode(PDO::FETCH_CLASS, 'Mp');
            //$mp = $statement->fetch();
            $mp = new Mp($result['id_mp'],$result['num_mp'],$result['nom_mp']);

            return $mp;
        }catch(PDOException $ex){
            echo "Error: " . $ex;
        }
    }


}