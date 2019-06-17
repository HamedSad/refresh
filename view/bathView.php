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

        if($projectBath['bathroomSink'] == 0){
           echo 'Pas besoin de lavabo<br>';
        } else {
            echo 'Vous souhaitez installer un lavabo<br>';
        }
    
        
        echo '<a class="btn btn-danger" href="index.php?action=affichageBath&amp;bathroomProjectId=' . $projectBath['bathroomProjectId'] . ' "><span class="glyphicon glyphicon-remove"></span> Supprimer ce projet </a>';
        
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
    
<!--
    
-->
    
    <br> Nos peintures : <br>
    <div class="contain">
        <div class="row">
            <div class="row__inner">
           
            <?php while($choice = $paint->fetch()){
        
              echo'<div class="tile">';
    
                echo'<div class="tile__media">';
                    
                  echo'<img class="tile__img"';
                        
                    echo'<img src="' . $choice['paintUrlImage'] . '"<br>' ;
                    
                echo'</div>';
                    echo $choice['paintName'] . '<br>' . $choice['paintPrice'] . '€';
              echo'</div>';  
            }
        
         ?>
        </div>
        </div>
    </div>


    <?php
    if($projectBath['bathroomWC'] == 1){ ?>
    
    <br> Nos toilettes : <br>
    <div class="contain">
        <div class="row">
            <div class="row__inner">
           
            <?php while($all = $wc->fetch()){
        
              echo'<div class="tile">';
    
                echo'<div class="tile__media">';
                    
                  echo'<img class="tile__img"';
                        
                    echo'<img src="' . $all['toiletsUrlImage'] . '"<br>' ;
                    
                echo'</div>';
                    echo $all['toiletsName'] . '<br>' . $all['toiletsPrice'] . '€';
              echo'</div>';  
            }
        }
         ?>
        </div>
        </div>
    </div>

<!--

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
-->
    
    

       <?php
    if($projectBath['bathroomShower'] == 1){ ?>
    
    <br> Nos douches : <br>
    <div class="contain">
        <div class="row">
            <div class="row__inner">
           
            <?php while($all = $shower->fetch()){
        
              echo'<div class="tile">';
    
                echo'<div class="tile__media">';
                    
                  echo'<img class="tile__img"';
                        
                    echo'<img src="' . $all['showerUrlImage'] . '"<br>' ;
                    
                echo'</div>';
                    echo $all['showerName'] . '<br>' . $all['showerPrice'] . '€';
              echo'</div>';  
            }
        }
         ?>
        </div>
        </div>
    </div>


<!--
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
-->


    
    <?php
    if($projectBath['bathroomBath'] == 1){ ?>
    
    <br> Nos baignoires : <br>
    <div class="contain">
        <div class="row">
            <div class="row__inner">
           
            <?php while($all = $bathtub->fetch()){
        
              echo'<div class="tile">';
    
                echo'<div class="tile__media">';
                    
                  echo'<img class="tile__img"';
                        
                    echo'<img src="' . $all['bathtubUrlImage'] . '"<br>' ;
                    
                echo'</div>';
                    echo $all['bathtubName'] . '<br>' . $all['bathtubPrice'] . '€';
              echo'</div>';  
            }
        }
         ?>
           
        

        
<!--
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
        ?>
-->
                
        

            </div>
        </div>
    </div>


   <?php 
    
    if($projectBath['bathroomSink'] == 1){ ?>
    
    <br> Nos lavabos : <br>
    <div class="contain">
        <div class="row">
            <div class="row__inner">
           
            <?php while($all = $sink->fetch()){
        
              echo'<div class="tile">';
    
                echo'<div class="tile__media">';
                    
                  echo'<img class="tile__img"';
                        
                    echo'<img src="' . $all['sinkUrlImage'] . '"<br>' ;
                    
                echo'</div>';
                    echo $all['sinkName'] . '<br>' . $all['sinkPrice'] . '€';
              echo'</div>';  
            }
        }
        ?>

            </div>
        </div>
    </div>

   <?php $content = ob_get_clean();

    require('template.php'); 