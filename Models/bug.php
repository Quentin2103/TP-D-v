<?php

class Bug {
    private $id;
    private $description;
    private $titre;
    private $date;
    private $closed;
    
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
    function __construct($titre, $description) {
        $this->titre = $titre;
        $this->description = $description;
    }

    function getTitre() {
        return $this->titre;
    }


    function setTitre($titre) {
        $this->titre = $titre;
    }

}




?>