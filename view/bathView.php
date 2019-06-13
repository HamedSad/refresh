<?php ob_start();

    $title= "Mon projet " . $projectBath['bathroomProjectName'] ; ?>

    <h1>Mon projet</h1>
    <p>Récapitulatif du projet <?= $projectBath['bathroomProjectName'] ;?> </p>

    <?php
        echo 'Superficie de ' . $projectBath['bathroomArea'] . 'm²<br>';
        
        echo 'Hauteur sur plafond de ' . $projectBath['bathroomHeight'] . 'm<br>';
        
        if($projectBath['groundId'] == 5){
            echo 'Sol divers <br>';
        } else {
            echo 'Sol en ' . $projectBath['groundName'] . '<br><br>';
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
        
        echo '<a class="btn btn-danger" href="index.php?action=delProjectBath&amp;bathroomProjectId=' . $projectBath['bathroomProjectId'] . ' "><span class="glyphicon glyphicon-remove"></span> Supprimer ce projet </a>';
        
    ?>

    <h1>Nos recommandations</h1>

    <p>Quantité de peinture requise :</p> 

 <?php 
    
    $perimetre = sqrt($projectBath['bathroomArea']);
    $surface = $perimetre * $projectBath['bathroomHeight'];
    $surfaceRound = round($surface, 2);
    $totalLitre = round(($surface / 12)*2,2);

    echo 'Sur une base de 2 couches avec un pouvoir couvrant de 12m²/litre, nous aurons besoin de :<br>' . $totalLitre . ' litres de peinture, soit : ';

    if($totalLitre <= 10){
        echo ' 1 pot';
    } else if ($totalLitre <= 20 && $totalLitre > 10){
        echo ' 2 pots';
    } else if ($totalLitre <= 30 && $totalLitre > 20){
        echo ' 3 pots';
    } else if ($totalLitre <= 40 && $totalLitre > 30){
        echo ' 4 pots';
    } else if ($totalLitre <= 50 && $totalLitre > 40){
        echo ' 5 pots';
    }
    echo ' de peinture' ;

 ?>

    <br><br>Nos peintures : <br><br>

    <?php 
        echo '<div class="paint">' ;
            while($choice = $paint->fetch()){
                echo '<div class="paint2">' ;
                    echo '<img src="' . $choice['paintUrlImage'] . '"><br>' . $choice['paintName'] . ' à partir de ' . $choice['paintPrice'] . '€<br>';
                echo '</div>';   
        }
        echo '</div>'; 
    
    
        if($projectBath['bathroomWC'] == 1){
            echo '<br> Nos toilettes: <br>';
            echo '<div class="toilets">' ;
                while($all = $wc->fetch()){
                    echo '<div class="toilets2">' ;
                        echo '<img src="' . $all['toiletsUrlImage'] . '"><br> ' .$all['toiletsName'] . ' à partir de ' . $all['toiletsPrice'] . '€<br>';
                    echo '</div>';
                }

            }
            echo '</div>';

        if($projectBath['bathroomShower'] == 1){
            echo '<br> Nos douches : <br>'; 
            echo '<div class="shower">' ;
                while($all = $shower->fetch()){
                    echo '<div class="shower2">' ;
                        echo '<img src="' . $all['showerUrlImage'] . '"><br> ' . $all['showerName'] . ' à partir de ' . $all['showerPrice'] . '€<br>';
                    echo '</div>';
                }
            }
            echo '</div>';
        

        if($projectBath['bathroomBath'] == 1){
            echo '<br> Nos baignoires : <br>';
            echo '<div class="bathtub">' ;
                while($all = $bathtub->fetch()){
                    echo '<div class="bathtub2">' ;
                        echo '<img src="' . $all['bathtubUrlImage'] . '"><br> ' . $all['bathtubName'] . ' à partir de ' . $all['bathtubPrice'] . '€<br>';
                    echo '</div>';
                }
            }
            echo '</div>';
    

    $content = ob_get_clean();

    require('template.php'); 