<?php
include '../Models/bugManager.php'
?>



<html>
  <meta name="createAt" content="width=device-width, initial-scale=1">
 <body> 
<form method="post">
    <p>Titre : <input type="text" name="titre" /></p>
<legend>Description :</legend>
<textarea name="desc" rows="8" cols="45">
Votre message ici.
</textarea>
<p><input type="submit" value="envoyer le formulaire" name="envoie"/></p>
</form>

     <a href="list.php"><input class="btn btn-primary" type="button" value="Retour"</a>
     
</body>

</html>