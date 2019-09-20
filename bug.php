<?php

class Bug {
    private $id;
    private $description;
    
    
    public function getid(){
        return $this->id; 
    }
    
    public function getdescription(){
        return$this->description;
    }
    
    function setId($id) {
        $this->id = $id;
    }

    function setDescription($description) {
        $this->description = $description;
    }
    function __construct($id, $description) {
        $this->id = $id;
        $this->description = $description;
    }


}




?>