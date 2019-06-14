<?php 

require('controller/controller.php');

if (isset($_GET['action'])){
    
    if($_GET['action'] == 'myProjectsRoom'){
        listProjectsRoom();
        
    }
    elseif($_GET['action'] == 'myProjectsBathroom'){
        listProjectsBathroom();
    }
    
    elseif($_GET['action'] == 'addBath'){
        addBath($_POST['bathroomProjectName'], $_POST['bathroomArea'], $_POST['bathroomGround'], $_POST['bathroomHeight'], $_POST['bathroomWC'], $_POST['bathroomShower'], $_POST['bathroomBath'], $_POST['bathroomSink'], $_POST['userId'], $_POST['bathroomDate'] );
    }
    
    elseif($_GET['action'] == 'addRoom'){
        addRoom($_POST['roomProjectName'], $_POST['roomArea'], $_POST['roomGround'], $_POST['roomHeight'], $_POST['userId'], $_POST['roomDate']);
    }
    
    elseif($_GET['action'] == 'projectRoom'){
        getOneRoom();
        
        }
        
    elseif($_GET['action'] == 'projectBath'){
        getOneBath(); 
    }
    
    elseif($_GET['action'] == 'delProjectRoom'){
        if(isset($_GET['roomId']) && $_GET['roomId'] >0){
            suppr($_GET['roomId']);
        } else {
            echo 'erreur lors de la suppression du projet chambre';
        }
    }
    
    elseif($_GET['action'] == 'delProjectBath'){
        if(isset($_GET['bathroomProjectId']) && $_GET['bathroomProjectId'] > 0){
            supprBath($_GET['bathroomProjectId']);
        } else {
            echo 'erreur lors de la suppression du projet salle de bain';
        }
    }
}

else {
    echo listProjectsRoom();
    echo listProjectsBathroom();
}


