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
            $bug = new Bug($données["id"],$données["titre"], $données["desc"],$données["createAt"],$données["closed"]);            
            $this->bug[]=$bug;            
        }
        return $this->bug;
               
    }

    function find($id) {

        $dbh = $this->connectDb();  
        $sth = $dbh->query('SELECT * FROM `bug` WHERE `id`='.$id, PDO::FETCH_ASSOC);

        $données = $sth->fetch();
        $bug = new Bug($données["id"],$données["titre"], $données["desc"],$données["createAt"],$données["closed"]);
        $bug->setId($données["id"]);
        $bug->setDate($données['createAt']);
        return $bug;
        
        
    }
        
        
    function add($bug) {
        
//        $stmt = $dbh->query("INSERT INTO bug (titre,desc,createAt,closed) VALUES (:titre,:desc,:createAt,:closed)");
        // var_dump($bug);die;
        $stmt = $this->dbh->prepare("INSERT INTO `bug` (`titre`, `desc`, `createAt`, `closed`) VALUES (:titre, :desc, :createAt, :closed)");
        $stmt->bindValue(':titre', $bug->getTitre());
        $stmt->bindValue(':desc', $bug->getDescription());
        $stmt->bindValue(':createAt',$bug->getDate());
        $stmt->bindValue(':closed', $bug->getClosed());
        $stmt->execute();
  
    }

    function update($bug) {
        $dbh = $this->connectDb();  
        $sth = $dbh->prepare("UPDATE `bug` SET `titre`=:titre, `desc`=:desc, `closed`=:closed WHERE `id`=:id");
        $sth->execute ([
            ':titre'=>$bug->getTitre(),
            ':desc'=>$bug->getDescription(),
            ':closed'=>$bug->getClosed(),
            ':id'=>$bug->getid()
        ]);
    }

    function findByStatut(){
        $dbh = $this->connectDb();
        $sth = $dbh->query('SELECT * FROM `bug` WHERE `closed`=0', PDO::FETCH_ASSOC);
        
        while ($données = $sth->fetch()) {
            $bug = new Bug($données["id"],$données["titre"], $données["desc"],$données["createAt"],$données["closed"]);            
            $this->bug[]=$bug;            
        }
        return $this->bug;

    }

}
?>