<?php
namespace BugApp\Models;
use BugApp\Models\Bug;
use BugApp\Models\Manager;

class BugManager extends Manager {

    private $bugs = [];
    private $dbh;

    function __construct() {
        $this->dbh = $this->connectDb();
    }
 

    function findAll() {

        $dbh = $this->connectDb();        
        $sth = $dbh->query('SELECT * FROM `bug` ORDER BY `id`', \PDO::FETCH_ASSOC);

        while ($données = $sth->fetch()) {
            $bug = new Bug($données["id"],$données["titre"], $données["desc"],$données["createAt"],$données["closed"],$données["URL"],$données["NDD"],$données["IP"]);            
            $this->bug[]=$bug;            
        }
        return $this->bug;
               
    }

    function find($id) {

        $dbh = $this->connectDb();  
        $sth = $dbh->query('SELECT * FROM `bug` WHERE `id`='.$id, \PDO::FETCH_ASSOC);

        $données = $sth->fetch();
        $bug = new Bug($données["id"],$données["titre"], $données["desc"],$données["createAt"],$données["closed"],$données["NDD"],$données["IP"]);
        $bug->setId($données["id"]);
        $bug->setDate($données['createAt']);
        return $bug;
        
        
    }
        
        
    function add(Bug $bug) {
        
//        $stmt = $dbh->query("INSERT INTO bug (titre,desc,createAt,closed) VALUES (:titre,:desc,:createAt,:closed)");
        // var_dump($bug);die;
        $dbh = $this->connectDb();  
        $stmt = $dbh->prepare("INSERT INTO `bug` (`id`,`titre`, `desc`, `createAt`, `closed`, `URL`,` `NDD`, `IP`) VALUES (:id,:titre, :desc, :createAt, :closed, :URL, :NDD, :IP)");
        $stmt->bindValue(':id', $bug->getid());
        $stmt->bindValue(':titre', $bug->getTitre());
        $stmt->bindValue(':desc', $bug->getDescription());
        $stmt->bindValue(':createAt',$bug->getDate());
        $stmt->bindValue(':closed', $bug->getClosed());
        $stmt->bindValue(':URL',$bug->getURL());
        $stmt->bindValue(':NDD',$bug->getNDD());
        $stmt->bindValue(':IP', $bug->getIP());
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
            $bug = new Bug($données["id"],$données["titre"], $données["desc"],$données["createAt"],$données["URL"],$données["closed"]);            
            $this->bug[]=$bug;            
        }
        return $this->bug;

    }

    function ip_api($domain){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://ip-api.com/json/'.$domain);
        $json = $response->getBody();
        $data = json_decode($json,true);
        return $data['query'];
    }

}
?>