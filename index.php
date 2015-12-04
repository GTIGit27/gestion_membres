<?php
require_once('connexionBDD.php');

try {

    if(isset($_POST["go"])) {

//                                            $stmt = $db->query("SELECT password, prenom FROM membres WHERE email='".$_POST["email"]."'");
        $stmt = $db->prepare("SELECT * FROM membres WHERE email=?");
        $stmt->execute(array($_POST["email"]));
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
//        var_dump($result);

//                                            $db_password = $stmt->fetch();
//                                            print_r($db_password);
//                                            echo "sql : ".$db_password["password"] . "<br/>";
//                                            echo "input : " .password_hash($password, PASSWORD_DEFAULT). "<br/>" ;
                                    //        if(password_verify($password, $db_password["password"])) {
                                    //            
                                    //            echo "password Ok.";
                                    //        } else {
                                    //            echo "password no Ok.";
                                    //        }
        if($result) {
            if (password_verify($_POST["password"], $result["password"])) {
                echo "Bienvenue " . $result["nom"] . "  " . $result["prenom"];
                $_SESSION["user"]["id"] = $result["id"];
                $_SESSION["user"]["prenom_nom"] = $result["prenom"] . "  " . $result["nom"];
            } else {
                echo "Qui es-tu étranger ?";    
            }   
        
        }

    }
}

?>




<!DOCTYPE html>


<html>

    <head>
        <title>Formulaire de connexion</title>
    </head>

    <body>
    
    <?php 
        if (isset($_SESSION["user"])) {
            echo "Bonjour " . $_SESSION["user"]["prenom_nom"];
        }
    ?>
       
        <form method="POST">
            <input type="text" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <input type="submit" name="go" value="Se connecter">
        </form>

    </body>




</html>