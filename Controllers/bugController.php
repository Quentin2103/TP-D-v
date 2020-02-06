<?php
require_once('Models/bugManager.php');

class bugController{
    
    public function list(){
        $headers=apache_request_headers();
        var_dump($headers);
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

            $bugManager = new bugManager();
            $bugs = $bugManager->findAll();
            $content = $this->render('Views/list.php', ['bugs' => $bugs]);
            return $this->sendHttpResponse($content, 200);
        }
    }
    
    public function show($id){
        $BugManager = new bugManager();
        $bug = $BugManager->find($id);
        $content = $this->render('Views/Show.php',['bug' => $bug]);
        return $this->sendHttpResponse($content,200);
    }
    
    public function add(){
        // var_dump($_POST);
        if(isset($_POST["Titre"])){
            $bugManager = new bugManager();
            $bug = new Bug("",$_POST["Titre"],$_POST["Description"],$_POST["Date"],$_POST["Status"]);
            $bugManager->add($bug);
            header('Location: list');
        }
        else{
           $content = $this->render('Views/AjoutBug.php',[]);
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
        $bugManager = new bugManager();
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
}
?>