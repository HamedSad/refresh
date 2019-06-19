<?php

session_start();

    $_SESSION['userId'] = 1;
    $_SESSION['userName'] = 'Hamed';
//sortir tous les projets en fonction de l'utilisateur~~~~~~~~~~~~~~~~~~~~
//function getProjects(){
//   
//    $db = dbConnect();
//    
//    $req = $db->query('SELECT * FROM project 
//    
//    LEFT JOIN bathroom
//    ON project.bathroomId = bathroom.bathroomProjectId
//    
//    LEFT JOIN room
//    ON project.roomId = room.roomId
//    
//    WHERE project.userId = 1
//    
//    ORDER BY bathroom.bathroomProjectId DESC
//    
//    ');
//    
//    return $req;
//    
//}