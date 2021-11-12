<?php






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
?>