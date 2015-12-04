<?php
require_once('connexionBDD.php');
?>




<!DOCTYPE html>


<html>
   
    <head>
       <title>Formulaire de connexion</title>
    </head>
       
    <body>
         
        <form method="POST">
            <input type="text" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <input type="submit" name="go" value="Se connecter">
        </form>
            
    </body>
    
    
    
    
</html>