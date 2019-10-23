<?php

include '../Models/bugManager.php';

function liste() {
    $bugManager = new bugManager();
$Bugs = $bugManager->findAll();
}

function show() {
        $id = $_GET['Id'];
        $manager = new bugManager();
        $bug = $manager->find($id);
}

function add() {
    if (isset($_POST['envoie'])) {
    
    $bugManager = new bugmanager();
    
    $bug = new Bug($_POST["titre"], $_POST["desc"]);
    // return $Bugs;
    
    $bugManager->add($bug);
    
    header('Location:list.php');
    
                                }
}
?>