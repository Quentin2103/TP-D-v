  <?php
        require("bugManager.php");

        $id = $_GET['Id'];
        $manager = new bugManager();
        $bug = $manager->find($id);
        ?>


<html>

    <body>
        
        <table>
            <tr>
                <td>Statut</td>
                <td>Description</td>
            </tr>
        
      
        <h1><?=$bug->getTitre();?></h1>

        <tbody>
            <tr>
                <td><?=$bug->getid();?></td>
                <td><?=$bug->getdescription();?></td>
                <td><?=$bug->getClosed();?></td>
                <td><?=$bug->getDate();?></td>
            <tr>    
        </tbody>
        

       
        </table>

            <a href="list.php"><input class="btn btn-primary" type="button" value="Retour"</a>
    </body>

</html>