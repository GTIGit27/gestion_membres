<?php

?>
<!DOCTYPE html>


<html>

    <head>
        <title>BLOG</title>
    </head>

    <body>

    <?php
        if (isset($_SESSION["user"])) {
            
            
            
            
            echo "Bonjour " . $_SESSION["user"]["prenom_nom"];
        } else {
            echo "Adresse email déjà utilisée";
        }
    ?>

    </body>




</html>