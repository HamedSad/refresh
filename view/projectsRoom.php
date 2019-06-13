<?php ob_start(); 

    session_start();

    $_SESSION['userId'] = 1;
    $_SESSION['userName'] = 'Hamed';
    
    $title= "Mes projets"; ?>
    
<div class="wrapp">
    <h1>Mes projets</h1>
    <div class="bathroomProject">
        <?php

            echo "<br><br>Mes projets chambres à vivre : <br>";

            while($dataRoom = $room->fetch()){
                if($dataRoom['roomId'] != 0){                        
                    echo ' -' . '<a href="index.php?action=projectRoom&amp;roomId=' . $dataRoom['roomId'] . '">' . $dataRoom['roomProjectName'] . ' édité le '. date("d/m/Y", strtotime($dataRoom['roomDate'])) . '</a><br>';   
                }
            }
        ?>
    </div>
    </div>
<?php $content = ob_get_clean(); 

    require('template.php');