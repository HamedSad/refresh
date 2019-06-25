<?php 

require('controller/controller.php');

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


if(isset($_SESSION['userId'])){


    if (isset($_GET['action'])){
        
//Project room~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        
        if($_GET['action'] == 'projectRoom'){
            getOneRoom();   
            }
        
        elseif($_GET['action'] == 'addRoom'){
            
            $roomProjectName = test_input($_POST["userName"]);
            $roomArea = test_input($_POST["roomArea"]);
            $roomGround = test_input($_POST["roomGround"]);
            $roomHeight = test_input($_POST["roomHeight"]);
            $userId = test_input($_POST["userId"]);
            $roomDate = test_input($_POST["roomDate"]);
         
            addRoom($roomProjectName, $roomArea, $roomGround, $roomHeight, $userId, $roomDate);
        }
        

        elseif($_GET['action'] == 'updateRoom'){
            if(isset($_GET['roomId']) && $_GET['roomId'] > 0){
                updateRoom($_GET['roomId']);
            }  else {
                echo 'erreur lors de la mise à jour du projet chambre';
            }
        }
        
        elseif($_GET['action'] == 'delProjectRoom'){
            if(isset($_GET['roomId']) && $_GET['roomId'] > 0){
                supprRoom($_GET['roomId']);
            } else {
                echo 'erreur lors de la suppression du projet chambre';
            }
        }

        elseif($_GET['action'] == 'affichageRoom'){
            affichageDelRoom();
        }
        
//Project Bath~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        elseif($_GET['action'] == 'projectBath'){
            getOneBath(); 
        }

        elseif($_GET['action'] == 'addBath'){
            
            $bathroomProjectName = test_input($_POST["bathroomProjectName"]);
            $bathroomArea = test_input($_POST["bathroomArea"]);
            $bathroomGround = test_input($_POST["bathroomGround"]);
            $bathroomHeight = test_input($_POST["bathroomHeight"]);
            $bathroomWC = test_input($_POST["bathroomWC"]);
            $bathroomShower = test_input($_POST["bathroomShower"]);
            $bathroomBath = test_input($_POST["bathroomBath"]);
            $bathroomSink = test_input($_POST["bathroomSink"]);
            $userId = test_input($_POST["userId"]);
            $bathroomDate = test_input($_POST["bathroomDate"]);
                            
            addBath($bathroomProjectName, $bathroomArea, $bathroomGround, $bathroomHeight, $bathroomWC, $bathroomShower, $bathroomBath, $bathroomSink, $userId, $bathroomDate );
        }
        
        elseif($_GET['action'] == 'delProjectBath'){
            if(isset($_GET['bathroomProjectId']) && $_GET['bathroomProjectId'] > 0){
                supprBath($_GET['bathroomProjectId']);
            } else {
                echo 'erreur lors de la suppression du projet salle de bain';
            }
        }

        elseif($_GET['action'] == 'affichageBath'){
            affichageDelBath();
        }
        
//Basket~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~     
        elseif($_GET['action'] == 'oneBasket'){
            basket();
        }

        elseif($_GET['action'] == 'addBasket'){
            
            $basketProductName = test_input($_POST['basketProductName']);
            $basketProductPrice = test_input($_POST['basketProductPrice']);
            $basketProductQuantity = test_input($_POST['basketProductQuantity']);
            $basketProductUrlImage = test_input($_POST['basketProductUrlImage']);
            $userId = test_input($_POST['userId']);
            
            addBasket($basketProductName, $basketProductPrice, $basketProductQuantity, $basketProductUrlImage, $userId);
        }

        elseif($_GET['action'] == 'delBasket'){
            if(isset($_GET['basketProductId']) && $_GET['basketProductId'] > 0){
                delBasket($_GET['basketProductId']);
            } else {
                echo 'impossible de supprimer l\'article';
            }
        }
        
        
//Favourites~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        elseif($_GET['action'] == 'favourites'){
            favourites();
        }
        
        elseif($_GET['action'] == 'addFavouriteRoom'){
            
            $favouriteRoomName = test_input($_POST['favouriteRoomName']);
            $userId = test_input($_POST['userId']);
            $roomProjectId = test_input($_POST['roomProjectId']);
            
            addFavouriteRoom($favouriteRoomName, $userId, $roomProjectId);
        }
        
        elseif($_GET['action'] == 'delFavouriteRoom'){
            if(isset($_GET['favouriteRoomId']) && $_GET['favouriteRoomId'] > 0){
                delFavouriteRoom($_GET['favouriteRoomId']);
            }  else  {
                echo 'erreur lors de la suppression du projet chambre des favoris';
            }
        }
        
        elseif($_GET['action'] == 'addFavouriteBath'){
            
            $favouriteBathName = test_input($_POST['favouriteBathName']);
            $userId = test_input($_POST['userId']);
            $bathProjectId = test_input($_POST['bathProjectId']);
            
            addFavouriteBath($favouriteBathName, $userId, $bathProjectId);
        }
        
        elseif($_GET['action'] == 'delFavouriteBath'){
            if(isset($_GET['favouriteBathId']) && $_GET['favouriteBathId'] > 0){
                delFavouriteBath($_GET['favouriteBathId']);
            }  else  {
                echo 'erreur lors de la suppression du projet salle de bain des favoris';
            }
        }

//User~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        elseif($_GET['action'] == 'addUser'){

            $userName = test_input($_POST["userName"]);
            $userEmail = test_input($_POST["userEmail"]);
            $userPassword = test_input($_POST["userPassword"]);
            $userPassword2 = test_input($_POST["userPassword2"]);        

            if(!empty($userName)&& !empty($userPassword)&& !empty($userPassword2)){

                if($userPassword == $userPassword2){
                    $hash = password_hash($userPassword, PASSWORD_DEFAULT);
                    addUser($userName, $userEmail, $hash, $_POST['userDateInscription']); 
                } else {
                    echo 'Les mots de passe ne sont pas identiques';        
                }

            } else {
                    echo 'Les champs ne sont pas tous remplis';
                }             
        }

//Material~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        
        elseif($_GET['action'] == 'onePaint'){
            if(isset($_GET['paintId']) && $_GET['paintId'] > 0 ){
            singlePaint();

            } else {
                echo 'erreur lors de la selection d\'une peinture'; 
            }
        }

        elseif($_GET['action'] == 'oneToilet'){
            if(isset($_GET['toiletsId']) && $_GET['toiletsId'] > 0 ){
            singleToilet();

            } else {
                echo 'erreur lors de la selection d\'une toilette'; 
            }
        }

        elseif($_GET['action'] == 'oneShower'){
            if(isset($_GET['showerId']) && $_GET['showerId'] > 0 ){
            singleShower();

            } else {
                echo 'erreur lors de la selection d\'une douche'; 
            }
        }

        elseif($_GET['action'] == 'oneBathtub'){
            if(isset($_GET['bathtubId']) && $_GET['bathtubId'] > 0 ){
            singleBathtub();

            } else {
                echo 'erreur lors de la selection d\'une baignoire'; 
            }
        }

        elseif($_GET['action'] == 'oneSink'){
            if(isset($_GET['sinkId']) && $_GET['sinkId'] > 0 ){
            singleSink();

            } else {
                echo 'erreur lors de la selection d\'un lévier'; 
            }
        }

        elseif($_GET['action'] == 'deconnexion'){
            deconnexion();
        } 
    }

    else {
            echo listProjects();
    }
    
    
} else  {
    echo 'Session expirée, vous serez redirigé dans quelques secondes<br> 
    <img src="http://gif.toutimages.com/images/ani_eau/grenouilles/grenouille_015.gif">' ;
    header ("Refresh: 3;URL=view/connexion.php");

    
}


