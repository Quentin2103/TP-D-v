<html lang="en">
<head>
  <title>Nom du Bug</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
</head>
<body>

<div class="container">

  <table class="table">
    <thead>
    <div>
         <input type='checkbox' name='case' value='on'> 
          Filtrer par Bugs non traité 

       </div>   

      <tr>
         
        <th>Nom Bug</th>
        <th>ID</th> 
        <th>Description</th>
        <th>Date Création</th>
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
            <td id="td_<?=$bug->getid();?>"><?php
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
<script src="Ressources/ajax.js"></script>
</html>
