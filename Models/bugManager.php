<?php

include_once ('bug.php');
include_once ('Manager.php');


class bugmanager extends connectBDD {

    private $bugs = [];
    private $dbh;
    function __construct() {
        $this->dbh = $this->connectDb();
    }
 

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
        
        
    function add($bug) {
        
//        $stmt = $dbh->query("INSERT INTO bug (titre,desc,createAt,closed) VALUES (:titre,:desc,:createAt,:closed)");
        var_dump($bug);
        $stmt = $this->dbh->prepare("INSERT INTO bug (titre,desc,createAt,closed) VALUES (:titre, :desc, :createAt, :closed)");
        $stmt->bindValue(':titre', $bug->getTitre());
        $stmt->bindValue(':desc', $bug->getDescription());
        $stmt->bindValue(':createAt',$bug->getDate());
        $stmt->bindValue(':closed', $bug->getClosed());
        $stmt->execute();
  
    }

}

?>