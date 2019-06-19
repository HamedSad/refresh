<?php

$pdo = new PDO(
    'mysql:host=localhost;dbname=refresh', 'root', '');
	
//Nous vérifions que l'utilisateur a bien envoyé les informations demandées 
if(isset($_POST["userName"]) && isset($_POST["userPassword"])){
	//Nous allons demander le hash pour cet utilisateur à notre base de données :
	$query = $pdo->prepare('SELECT * FROM user WHERE userName = :userName');
	$query->bindParam(':userName', $_POST["userName"]);
	$query->execute();
	$result = $query->fetch();
	$hash = $result[3];
	
	//Nous vérifions si le mot de passe utilisé correspond bien à ce hash à l'aide de password_verify :
	$correctPassword = password_verify($_POST["userPassword"], $hash);
	
	if($_POST["userPassword"] ==  $hash ) {
		session_start();
        $_SESSION['userId'] = $result['userId'];
        $_SESSION['userName'] = $_POST["userName"];
		header('Location: ../index.php');
        
	}else{
		//Sinon nous signalons une erreur d'identifiant ou de mot de passe
		echo "login/password incorrect<br>";
        echo $_POST["userName"] . "<br>" ;
        echo $_POST["userPassword"] ."<br>";
        echo $hash;
	}
}
?>