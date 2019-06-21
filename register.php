<?php

$pdo = new PDO(
    'mysql:host=localhost;dbname=refresh', 'root', '');

if(isset($_POST["userName"]) && isset($_POST["userPassword"])){

	$query = $pdo->prepare('SELECT * FROM user WHERE userName = :userName');
	$query->bindParam(':userName', $_POST["userName"]);
	$query->execute();
	$result = $query->fetch();
	$hash = $result[3];
	
	$correctPassword = password_verify($_POST["userPassword"], $hash);
	
	if($correctPassword) {
		session_start();
        $_SESSION['userId'] = $result['userId'];
        $_SESSION['userName'] = $_POST["userName"];
        
		header('Location: index.php');
        
	} else {
		echo "Utilisateur ou mot de passe incorrect<br>" . '<img src="https://cdn.dribbble.com/users/3968/screenshots/2207543/search_icon_animation.gif">';
	}
}