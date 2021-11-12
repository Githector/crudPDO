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







    public function addMp($numMp, $nomMp) : bool
    {
        try{
            $statement = $this->conexio->prepare("INSERT INTO mp (id_mp,num_mp,nom_mp) VALUES(1,?,?)");
            $res = $statement->execute(
                array($numMp,$nomMp)
            );
            return $res;
        }catch(PDOException $ex){
            echo "Error: " . $ex;
        }
        return false;
    }

    public function addMpOld($numMp, $nomMp) : bool
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

    public function getAllMps() : array
    {

        try{
            $statement = $this->conexio->prepare("SELECT * FROM mp");
            $statement->execute();
            $result = $statement->fetchAll();

            return $result;
        }catch(PDOException $ex){
            echo "Error: " . $ex;
        }
        return array();
    }

    public function getAllMpsOld() : array
    {
        try{
            $result = $this->conexio->query("SELECT * FROM mp");

            return $result;
        }catch(PDOException $ex){
            echo "Error: " . $ex;
        }
        return array();
    }

    public function getMpById($id) : Mp
    {
       $mp = null;
        try{

            $statement = $this->conexio->prepare("SELECT * FROM mp WHERE id_mp= ?");
            $statement->execute(
                array($id)
            );
            $result = $statement->fetch();
            $mp = new Mp($result['id_mp'],$result['num_mp'],$result['nom_mp']);
            return $mp;
        }catch(PDOException $ex){
            echo "Error: " . $ex;
            return $mp;
        }
    }

    public function getMpByIdOld($id)
    {
        $mp = null;
        try{
            $query = "SELECT * FROM mp WHERE id_mp=$id";
            $result = $this->conexio->query($query);

            return $result;
        }catch(PDOException $ex){
            echo "Error: " . $ex;
            return $mp;
        }

    }

    public function updateMpById($mp)
    {
        try{
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


}