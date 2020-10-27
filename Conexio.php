<?php

include_once 'Mp.php';
class Conexio
{
    private $host;
    private $db;
    private $dsn;
    private $user;
    private $pass;
    public $conexio;

    public function __construct()
    {
        $this->host = 'matricula.cxxmhim8hdqj.us-east-1.rds.amazonaws.com';
        $this->db = "matricula";
        $this->dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db . ';';
        $this->user = 'hector';
        $this->pass = "12345678";
    }

    public function openConnection(){
        try {
            $this->conexio = new PDO($this->dsn, $this->user, $this->pass);
            echo 'Connexio ok<br>';
            return $this->conexio;
        }catch (PDOException $ex){
            echo "Error: " . $ex;
            return null;
        }

    }

    public function closeConnection(){
        try {
            $this->conexio=null;
            return $this->conexio;
        }catch (PDOException $ex){
            echo "Error: " . $ex;
            return null;
        }

    }

    public function getAllMps(){
        try{
            $result = $this->conexio->query("SELECT * FROM mp");
            return $result;
        }catch(PDOException $ex){
            echo "Error: " . $ex;
        }

    }

    public function addMp($numMp,$nomMp){

        try{
            $result = $this->conexio->query("INSERT INTO mp (id_mp,nom_mp,num_mp) VALUES(null,'$nomMp','$numMp')");
            echo "Afegit<br>";
            return $result;
        }catch(PDOException $ex){
            echo "Error: " . $ex;
        }

    }

    public function getMpById($id){
        try{
            $query = "SELECT * FROM mp WHERE id_mp=$id";
            //echo $query . '<br>';
            $result = $this->conexio->query($query);
            return $result;
        }catch(PDOException $ex){
            echo "Error: " . $ex;
        }

    }

    public function getMpByIdP($id){
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


    public function updateMpById($mp){
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

    public function deleteMpById($id){
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

    public function getMpObjectById($id){
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



//https://academy.leewayweb.com/como-evitar-inyeccion-sql-php/
//https://xkcd.com/327/
}

