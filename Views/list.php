<?php
require_once ('../Controllers/index.php');
?>


<html lang="en">
<head>
  <title>Nom du Bug</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

  <table class="table">
    <thead>
      <tr>
         
        <th>Nom Bug</th> 
        <th>Description</th>
        <th>Date Création</th>
        <th>Closed</th>
      </tr>
    </thead>
    <tbody>    
    <?php 
        foreach ($Bugs as $bug) {
    ?> 
        <tr class="table-primary">
            <td><?=$bug->getTitre();?></td>
            <td><?=$bug->getDescription();?></td>
            <td><?=$bug->getDate();?></td>
             <td><?=$bug->getClosed();?></td>
            <td><a href="Show.php?Id=<?=$bug->getId()?>"><?=$bug->getId();?></a></td>
        </tr>
     <?php }?>
      

 
    </tbody>
  </table>
       <a href="AjoutBug.php"><input class="btn btn-danger" type="button" value="Ajout Bug"</a>
</div>
  
</body>
</html>
