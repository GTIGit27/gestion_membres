<?php

require_once('connexionBDD.php');

try {
    if ($_POST) { 
        
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    // trim supprime les espaces en début et en fin de chaîne de caractères

    if( filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($password) ) {
	$password = password_hash($password, PASSWORD_DEFAULT);
    
       
        $stmt = $db->prepare("INSERT INTO membres (nom, prenom, adresse, cp, ville, email, password, ma_photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute(array($_POST["nom"], $_POST["prenom"], $_POST["adresse"], $_POST["cp"], $_POST["ville"], $_POST["email"], $password, $_FILES["ma_photo"]["name"])); // on peut reprendre directement la variable $password

    }
    }// fin du if
} catch(PDOException $ex) {
    echo $ex->getMessage(); // debug
} // fin du catch

if(isset($_POST["go"]) ) {// "go" est le name du bouton
    
    
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $adresse = $_POST["adresse"];
    $CP = $_POST["cp"];
    $ville = $_POST["ville"];
    $email = ($_POST["email"]);
    $password = ($_POST["password"]);
    
    $message_erreur = "";

    if( empty($_POST["nom"]) ) {
        //      echo "le champ nom est obligatoire !!!!<br/>";
        $message_erreur .- "le champ nom est obligatoire !!!!<br/>";
    }

    if( empty($_POST["prenom"]) ) {
        //      echo "Le champ prenom est obligatoire !!!!<br/>";
        $message_erreur .- "le champ prenom est obligatoire !!!!<br/>";
    }

    if( empty($_POST["adresse"]) ) {
        //      echo "Le champ adresse est obligatoire !!!!<br/>";
        $message_erreur .- "le champ adresse est obligatoire !!!!<br/>";
    }

    if( empty($_POST["cp"]) ) {
        //      echo "Le champ CP est obligatoire !!!!<br/>";
        $message_erreur .- "le champ CP est obligatoire !!!!<br/>";
    }

    if( empty($_POST["ville"]) ) {
        //      echo "Le champ ville est obligatoire !!!!<br/>";
        $message_erreur .- "le champ ville est obligatoire !!!!<br/>";
    }

    if( empty($_POST["email"]) ) {
        //      echo "Le champ pays est obligatoire !!!!<br/>";
        $message_erreur .- "le champ email est obligatoire !!!!<br/>";
    }

    if( empty($_POST["password"]) ) {
        //      echo "Le champ pays est obligatoire !!!!<br/>";
        $message_erreur .- "le champ password est obligatoire !!!!<br/>";
    }
    
    if( empty($_FILES["ma_foto"]) ) {
        //      echo "Le champ pays est obligatoire !!!!<br/>";
        $message_erreur .- "Veuillez insérer une photo !!!!<br/>";
    }
//    var_dump($_FILES);
		$repertoire_upload = "./uploads/"; // en relatif : ./uploads/ ; en absolu : c://xampp//htdocs//FormulaireUploadFichier//uploads//
		$fichier_upload = $repertoire_upload . basename($_FILES['ma_photo']['name']);
//		echo $fichier_upload;
		if (move_uploaded_file($_FILES['ma_photo']['tmp_name'], $fichier_upload) ) {
			echo "Le téléversement est OK";
		} else {
			echo "Erreur...";
		}
    
}



?>
<!DOCTYPE html>


<html>

    <head>
        <title>Formulaire dinscription</title>
    </head>

    <body>
    
    <?php
        if (isset($_SESSION["user"])) {
            echo "Bonjour " . $_SESSION["user"]["prenom_nom"];
        }
    ?>
       
       
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="nom" placeholder="nom" value="<?= (isset($nom)) ? $nom : '' ?>"><br/>
            <input type="text" name="prenom" placeholder="prenom" value="<?= (isset($prenom)) ? $prenom : '' ?>"><br/>
            <input type="text" name="adresse" placeholder="adresse" value="<?= (isset($adresse)) ? $adresse : '' ?>"><br/>
            <input type="text" name="cp" placeholder="cp" value="<?= (isset($cp)) ? $cp : '' ?>"><br/>
            <input type="text" name="ville" placeholder="ville" value="<?= (isset($ville)) ? $ville : '' ?>"><br/>
            <input type="email" name="email" placeholder="email" value="<?= (isset($email)) ? $email : '' ?>"><br/>
            <input type="password" name="password" placeholder="password" value="<?= (isset($password)) ? $password : '' ?>"><br/>
            <input type="file" name="ma_photo" /><br/>
            <input type="submit" name="go" value="S'inscrire">
        </form>

    </body>

</html>