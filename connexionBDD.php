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