<?php
namespace BugApp\Controllers;

use BugApp\Models\BugManager;
use BugApp\Models\Bug;

class BugController{
    
    public function list(){
        $bugManager = new BugManager();
        $headers=apache_request_headers();
        
        if (isset ($headers['XMLhttpRequest'])) {
            if (isset ($_GET['filter'])){
                $bugs = $bugManager->findByStatut();
            } else{
                $bugs = $bugManager->findAll();
            }
            $response=[
            'succes'=>true,
            'bugs'=>$bugs 
        ];
            echo json_encode($response);
            
        }    
        else {
            

            $bugs = $bugManager->findAll();
            $content = $this->render('src/Views/list.php', ['bugs' => $bugs]);
            
            return $this->sendHttpResponse($content, 200);
        }
    }
    
    public function show($id){
        $bugManager = new BugManager();
        $bug = $bugManager->find($id);
        $content = $this->render('src/Views/Show.php',['bug' => $bug]);
        return $this->sendHttpResponse($content,200);
    }
    
    public function add(){
        // var_dump($_POST);
        if(isset($_POST["Titre"])){
            $bugManager = new BugManager();
            $address_ip = $bugManager->ip_api($_POST["NDD"]);
            $bug = new Bug(null,$_POST["Titre"],$_POST["Description"],$_POST["Date"],$_POST["Status"],$_POST["URL"],$_POST["NDD"],$address_ip);
            $bugManager->add($bug);
            header('Location: list');
        }
        else{
           $content = $this->render('src/Views/AjoutBug.php',[]);
           return $this->sendHttpResponse($content,200);
        }
    }
        
    public function render($templatePath, $parameters){
        ob_start();
        $parameters;
        require($templatePath);
        return ob_get_clean();
        
    }
    
    public static function sendHttpResponse($content,$code = 200){
        http_response_code($code);
        header('Content-Type: text/html');
        echo $content;
    }

    public function update($id) {
        $bugManager = new BugManager();
        $bug = $bugManager->find($id);
        if (isset($_POST['statut'])){
            $bug->setClosed($_POST['statut']);
        };     
        $bugManager->update($bug);
    
        http_response_code(200);
        header ('Content-type:application/json');
        $response=[
            'succes'=>true,
            'id'=>$bug->getId()
        ];
        echo json_encode($response);
    }

    public function ip_api(){

    }
}
?>