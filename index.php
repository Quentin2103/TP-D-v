<?php

require ('Controllers/bugController.php');

$uri = explode("/",$_SERVER["REQUEST_URI"]);

switch(true) {
      
    case ($uri[4] == "AjoutBug"):

        return (new bugController())->add();

        break;
    
    
    case ($uri[4] == 'list'):

        return (new bugController())->list();

        break;

//    case preg_match('#^show/(\d+)$#', $urii, $matches):
  
//        $id = $matches[1];
    case (preg_match('/^show/',$uri[4])):
        
        $id= substr($uri[4],-1);
        return (new bugController())->show($id);

        break;



    case (preg_match('/^update/',$uri[4])):
            
        $id= explode("?",$uri[4]);
        return (new bugController())->update($id[1]);
        
        break;
            
        
    default :
                
        return (new bugController())->list();
            
                
}