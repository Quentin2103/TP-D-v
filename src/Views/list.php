<html lang="en">
<head>
  <title>Nom du Bug</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./bootstrap.css"/>
  <link rel="stylesheet" href="./Oui.css"/>
</head>
<body>

<div class="container">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand titre-nav" href="#" >Appli Bug</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div>
         <input type='checkbox' name='case' value='on'> 
          <p class = "filtre">Filtrer par Bugs non traité</p> 

       </div> 
</nav>

  <table class="table">
    <thead>
      <tr>
         
        <th>Nom Bug</th>
        <th>ID</th> 
        <th>Description</th>
        <th>Date Création</th>
        <th>URL</th>
        <th>Nom de domaine</th>
        <th>Adresse IP</th>
        <th>Statut</th>
      </tr>
    </thead>
    <tbody>    
    <?php 
        $bugs = $parameters["bugs"];
        foreach ($bugs as $bug) {
            
    ?> 
        <tr class="table-primary" id="Bug_<?=$bug->getid();?>">
            <td><a href="show$<?=$bug->getId()?>"><?=$bug->getTitre();?></a></td>

            <td><?=$bug->getid();?></td>
            <td><?=$bug->getDescription();?></td>
            <td><?=$bug->getDate();?></td>
            <td><?=$bug->getURL();?></td>
            <td><?=$bug->getNDD();?></td>
            <td><?=$bug->getIP();?></td>            
            <td id="td_<?=$bug->getid();?>">
            <?php
            if ($bug->getClosed()==0){?>

              <a class='trigger' href="update?<?=$bug->getId()?>" >Non traité </a>

              <?php }
              else{ ?>

              <span>Résolut</span>

              <?php } ?> </td>
        </tr>
     <?php }?>
      

 
    </tbody>
  </table>
       <a href="AjoutBug"><input class="btn btn-danger" type="button" value="Ajout Bug"</a>
      
       </div>          
      
</body>
<script src="src/Ressources/ajax.js"></script>
</html>
