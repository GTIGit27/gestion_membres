<?php
require_once('connexionBDD.php');

try {

    if(isset($_POST["go"])) {

        $stmt = $db->query("SELECT password FROM membres WHERE email='".$_POST["email"]."'");

        $db_password = $stmt->fetch();
//        print_r($db_password);
//        echo "sql : ".$db_password["password"] . "<br/>";
//        echo "input : " .password_hash($password, PASSWORD_DEFAULT). "<br/>" ;
        if(password_verify($password, $db_password["password"])) {
            
            echo "password Ok.";
        } else {
            echo "password no Ok.";
        }
    }

} catch(PDOException $ex) {



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