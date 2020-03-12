<?php

namespace BugApp\Models;

class Bug {
    private $id;
    private $description;
    private $titre;
    private $date;
    private $closed;
    private $URL;
    private $NDD;
    private $IP;
    
    function getDate() {
        return $this->date;
        
    }

    function getClosed() {
        return $this->closed;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setClosed($closed) {
        $this->closed = $closed;
    }

        
    public function getid(){
        return $this->id; 
    }
    
    public function getDescription(){
        return $this->description;
    }
    
    function setId($id) {
        $this->id = $id;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function __construct($id,$titre, $description,$date,$closed,$URL,$NDD,$IP) {
        $this->id = $id;
        $this->titre = $titre;
        $this->description = $description;
        $this->date = $date;
        $this->closed = $closed;
        $this->URL = $URL;
        $this->NDD = $NDD;
        $this->IP = $IP;
        // var_dump($this);die();
        
    }

    function getTitre() {
        return $this->titre;
    }


    function setTitre($titre) {
        $this->titre = $titre;
    }

    function getNDD() {
        return $this->NDD;
    }


    function setNDD($NDD) {
        $this->NDD = $NDD;
    }

    function getIP() {
        return $this->IP;
    }


    function setIP($IP) {
        $this->IP = $IP;
    }

    function getURL() {
        return $this->URL;
    }


    function setURL($URL) {
        $this->URL = $URL;
    }

}




?>