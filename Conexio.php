<?php


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
            $result = $this->conexio->query("SELECT * FROM mp WHERE id_mp=$id");
            return $result;
        }catch(PDOException $ex){
            echo "Error: " . $ex;
        }

    }




}

