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
      <tr>
         
        <th>Nom Bug</th> 
        <th>Description</th>
        <th>Date Création</th>
        <th>Closed</th>
      </tr>
    </thead>
    <tbody>    
    <?php 
        $bugs = $parameters["bugs"];
        foreach ($bugs as $bug) {
            
    ?> 
        <tr class="table-primary">
            <td><?=$bug->getTitre();?></td>
            <td><?=$bug->getDescription();?></td>
            <td><?=$bug->getDate();?></td>
             <td><?=$bug->getClosed();?></td>
            <td><a href="show$<?=$bug->getId()?>"><?=$bug->getTitre();?></a></td>
        </tr>
     <?php }?>
      

 
    </tbody>
  </table>
       <a href="AjoutBug"><input class="btn btn-danger" type="button" value="Ajout Bug"</a>
</div>
  
</body>
</html>
