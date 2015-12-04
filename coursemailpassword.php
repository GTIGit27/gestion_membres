<?php
$email = trim($_POST["email"]);
$password = trim($_POST["password"]);
// trim supprime les espaces en début et en fin de chaîne de caractères

if( filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($password) ) {
	$password = password_hash($password, PASSWORD_DEFAULT);
}

?>