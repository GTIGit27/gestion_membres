<?php

$user = "Pascual";
$password = "123";

try {   

    $db = new PDO("mysql:host=localhost;dbname=gestion_membres;charset=utf8", $user, $password);
    $db-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

    catch(PDOException $e) {
        
        die('Erreur : ' . $e->getMessage());
}


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