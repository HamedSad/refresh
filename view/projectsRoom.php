<?php ob_start(); ?>

<?php 

    session_start();

    $_SESSION['userId'] = 1;
    $_SESSION['userName'] = 'Hamed';
    
?>

<?php $title= "Mes projets"; ?>
    
<div class="wrapp">
    <h1>Mes projets</h1>
    <div class="bathroomProject">
        <?php
            
            echo $_SESSION['userName'];
            echo $_SESSION['userId'];

            echo "<br><br>Mes projets chambres à vivre : <br>";

            while($dataRoom = $room->fetch()){
                if($dataRoom['roomId'] != 0){
                    
                    
                    echo ' -' . 
                        
                        '<a href="index.php?action=projectRoom&amp;roomId=' . $dataRoom['roomId'] . '">' . $dataRoom['roomProjectName'] . '</a><br>';
                    
                    
                    
                }

            }
        ?>
    </div>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>