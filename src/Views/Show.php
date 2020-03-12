<html>

    <body>
        
        <table>
            <tr>
                <td>Statut</td>
                <td>Description</td>
            </tr>
        
        <h1><?php $bug = $parameters["bug"];
        $bug->getTitre(); ?></h1>

        <tbody>
            <tr>
                <td><?=$bug->getid();?></td>
                <td><?=$bug->getdescription();?></td>
                <td><?=$bug->getClosed();?></td>
                <td><?=$bug->getDate();?></td>
            <tr>    
        </tbody>
        

       
        </table>

            <a href="list"><input class="btn btn-primary" type="button" value="Retour"</a>
    </body>

</html>