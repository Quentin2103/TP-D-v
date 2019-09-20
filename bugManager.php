<?php

include 'bug.php';

class bugmanager {
    private $bugs;
    
    function getBugs() {
        return $this->bugs;
    }

    function setBugs($bugs) {
        $this->bugs = $bugs;
    }

    function __construct($bugs) {
        $this->bugs = $bugs;
    }

    //Objectif: Chargée en mémoire ce qu'il se trouve en source de données
    function load() {
        
    }
    
    //Objectif: Ajouter un bug à la liste
    function add(Bug $bug){
        $this->bugs[$bug->getid()]=$bug;
    }
    
    //Objectif: Supprimer un bug à la liste
    function remove(bug $bug){
        if(in_array($bug, $this->bugs)){
            unset($this->bugs[$bug->getid()]);
        }

    }
    
    
    
 }


?>