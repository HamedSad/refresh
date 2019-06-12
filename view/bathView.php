<?php ob_start(); ?>

<?php $title= "Mon projet " . $projectBath['bathroomProjectName'] ; ?>

    <h1>Mon projet</h1>
    <p>Récapitulatif du projet <?= $projectBath['bathroomProjectName'] ;?> </p>

    <?php
        echo 'Superficie de ' . $projectBath['bathroomArea'] . 'm²<br>';
        
        if($projectBath['groundId'] == 5){
            echo 'Sol divers <br>';
        } else {
            echo 'Sol en ' . $projectBath['groundName'] . '<br>';
        }
        

        if($projectBath['bathroomWC'] == 0){
           echo 'Pas besoin de WC<br>'; 
        } else {
            echo 'Vous souhaitez installer des toilettes<br>';
        }
        
        if($projectBath['bathroomShower'] == 0){
            echo 'Pas besoin de douche<br>';
        } else {
            echo 'Vous souhaitez installer une douche<br>';
        }

        if($projectBath['bathroomBath'] == 0){
           echo 'Pas besoin de baignoire<br>';
        } else {
            echo 'Vous souhaitez installer une baignoire<br>';
        }
        
        
    ?>

    <h1>Nos recommandations</h1>

    Nos peintures : <br><br>

    <?php 
        while($choice = $paint->fetch()){
            echo ' -' . $choice['paintName'] . ' pour ' . $choice['paintPrice'] . '€<br>';
            
        }
    ?>

    <?php if($projectBath['bathroomWC'] == 1){
            echo '<br> Nos toilettes: <br>';
            while($all = $wc->fetch()){
                echo ' -' . $all['toiletsName'] . ' pour ' . $all['toiletsPrice'] . '€<br>';
            }
            
        }
    ?>
    
    <?php include('painting.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>