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
        addBath($_POST['bathroomProjectName'], 
                $_POST['bathroomArea'], 
                $_POST['bathroomGround'], 
                $_POST['bathroomWC'],
                $_POST['bathroomShower'], 
                $_POST['bathroomBath'],
                $_POST['userId']);
    }
    
    elseif($_GET['action'] == 'addRoom'){
        addRoom($_POST['roomProjectName'],
               $_POST['roomArea'],
               $_POST['roomGround'],
               $_POST['roomHeight'],
               $_POST['userId']);
    }
    
    elseif($_GET['action'] == 'projectRoom'){
        getOneRoom();
        
        }
        
    elseif($_GET['action'] == 'projectBath'){
        getOneBath(); 
    }
}

else {
    echo listProjectsRoom();
    echo listProjectsBathroom();
}

