<?php

include_once ('bug.php');
include_once ('Manager.php');


class bugmanager extends connectBDD {

    private $bugs = [];

 

    function findAll() {

        $dbh = $this->connectDb();        
        $sth = $dbh->query('SELECT * FROM `bug` ORDER BY `id`', PDO::FETCH_ASSOC);

        while ($données = $sth->fetch()) {
            $bug = new Bug($données["titre"], $données["desc"]);
            $bug->setId($données["id"]);
            $bug->setDate($données["createAt"]);
            $bug->setClosed($données["closed"]);            
            $this->bug[]=$bug;            
        }
        return $this->bug;
               
    }

    function find($id) {

        $dbh = $this->connectDb();  
        $sth = $dbh->query('SELECT * FROM `bug` WHERE `id`='.$id, PDO::FETCH_ASSOC);

        $données = $sth->fetch();
        $bug = new Bug($données["titre"], $données["desc"]);
        $bug->setId($données["id"]);
        $bug->setDate($données['createAt']);
        return $bug;
        
    }
        
        
    function add(Bug $bug){
        
        // var_dump($bug->getTitre());  var_dump($bug->getDescription()); die();

        $dbh = $this->connectDb();  

            $sql = "INSERT INTO `bug`(`titre`, `desc`) VALUES (:titre, :desc)";
            $sth = $dbh->prepare($sql);
            $sth->execute([
                "titre" => $bug->getTitre(),
                "desc" => $bug->getDescription(),
            ]);            
        
    }

}

?>