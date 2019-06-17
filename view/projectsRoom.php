<?php ob_start(); 
 
    $title= "Mes projets"; ?>
    
<div class="wrapp">
    <h1>Mes projets</h1>
    <div class="roomProject">
        
        <?php
            echo '<ul>';
            echo "<br><br><h3>Mes projets chambres à vivre :</h3><br>";

            while($dataRoom = $room->fetch()){
                if($dataRoom['roomId'] != 0){                        
                    echo '<li><a href="index.php?action=projectRoom&amp;roomId=' . $dataRoom['roomId'] . '">' . $dataRoom['roomProjectName'] . ' édité le '. date("d/m/Y", strtotime($dataRoom['roomDate'])) . '</a><br></li>';   
                }
            }
            echo '</ul>';
        ?>
    </div>
    </div>
<?php $content = ob_get_clean(); 

    require('template.php');