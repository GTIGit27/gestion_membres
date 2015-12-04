<?php

require_once(index.php);

if(isset($_POST["go"]) ) {// "inscription" est le name du bouton
    
    
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $adresse = $_POST["adresse"];
    $CP = $_POST["cp"];
    $ville = $_POST["ville"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
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
        $message_erreur .- "le champ pays est obligatoire !!!!<br/>";
    }
    
if( empty($_POST["password"]) ) {
//      echo "Le champ pays est obligatoire !!!!<br/>";
        $message_erreur .- "le champ pays est obligatoire !!!!<br/>";
    }
    

?>


<!DOCTYPE html>


<html>
   
    <head>
       <title>Formulaire dinscription</title>
    </head>
       
    <body>
        <form method="post">
            <input type="text" name="nom" placeholder="nom">
            <input type="text" name="prenom" placeholder="prenom">
            <input type="text" name="adresse" placeholder="adresse">
            <input type="text" name="cp" placeholder="cp">
            <input type="text" name="ville" placeholder="ville">
            <input type="email" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <input type="submit" name="go" value="S'inscrire">
        </form>