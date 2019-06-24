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

        if($_GET['action'] == 'oneBasket'){
            basket();
        }

        elseif($_GET['action'] == 'addBasket'){
            addBasket($_POST['basketProductName'], $_POST['basketProductPrice'], $_POST['basketProductQuantity'], $_POST['basketProductUrlImage'], $_POST['userId']);
        }

        elseif($_GET['action'] == 'delBasket'){
            if(isset($_GET['basketProductId']) && $_GET['basketProductId'] > 0){
                delBasket($_GET['basketProductId']);
            } else {
                echo 'impossible de supprimer l\'article';
            }
        }

        elseif($_GET['action'] == 'favourites'){
            favourites();
        }

         elseif($_GET['action'] == 'addFavouriteRoom'){
            addFavouriteRoom($_POST['favouriteRoomName'], $_POST['userId'], $_POST['roomProjectId']);
        }

        elseif($_GET['action'] == 'addFavouriteBath'){
            addFavouriteBath($_POST['favouriteBathName'], $_POST['userId'], $_POST['bathProjectId']);
        }

        elseif($_GET['action'] == 'delFavouriteRoom'){
            if(isset($_GET['favouriteRoomId']) && $_GET['favouriteRoomId'] > 0){
                delFavouriteRoom($_GET['favouriteRoomId']);
            }  else  {
                echo 'erreur lors de la suppression du projet chambre des favoris';
            }
        }


        elseif($_GET['action'] == 'delFavouriteBath'){
            if(isset($_GET['favouriteBathId']) && $_GET['favouriteBathId'] > 0){
                delFavouriteBath($_GET['favouriteBathId']);
            }  else  {
                echo 'erreur lors de la suppression du projet salle de bain des favoris';
            }
        }

        elseif($_GET['action'] == 'addBath'){
            addBath($_POST['bathroomProjectName'], $_POST['bathroomArea'], $_POST['bathroomGround'], $_POST['bathroomHeight'], $_POST['bathroomWC'], $_POST['bathroomShower'], $_POST['bathroomBath'], $_POST['bathroomSink'], $_POST['userId'], $_POST['bathroomDate'] );
        }

        elseif($_GET['action'] == 'addRoom'){
            addRoom($_POST['roomProjectName'], $_POST['roomArea'], $_POST['roomGround'], $_POST['roomHeight'], $_POST['userId'], $_POST['roomDate']);
        }

        elseif($_GET['action'] == 'addUser'){

            $userNameError = $userEmailError = $userPasswordError = $userPassword2Error = $userPassword3Error =  "";

            $isSucces = true;

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

        elseif($_GET['action'] == 'connectUser'){
            testPassword();        
        }

        elseif($_GET['action'] == 'projectRoom'){
            getOneRoom();   
            }

        elseif($_GET['action'] == 'projectBath'){
            getOneBath(); 
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
    echo 'Session expirée, vous serez redirigé dans quelques secondes secondes' ;
    header ("Refresh: 3;URL=view/connexion.php");
}


