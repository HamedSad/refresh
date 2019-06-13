<?php ob_start();

 $title= "Mon projet " . $projectRoom['roomProjectName'] ; ?>

<h1>Mon projet</h1>
<p>Récapitulatif du projet <?= $projectRoom['roomProjectName'] ;?> </p>

<?php 

    echo $projectRoom['roomProjectName'] . '<br>' ;
    echo 'Pièce de ' . $projectRoom['roomArea'] . ' m²<br>';
    echo 'Hauteur sur plafont de ' . $projectRoom['roomHeight'] . 'm<br>';
    echo 'Sol en ' . $projectRoom['roomGround'] . '<br>';

?>

<h1>Nos recommandations</h1>

<p>Quantité de peinture requise :</p> 

 <?php 
    
    $perimetre = sqrt($projectRoom['roomArea']);
    $surface = $perimetre * $projectRoom['roomHeight'];
    $surfaceRound = round($surface, 2);
    $totalLitre = round(($surface / 12)*2,2);

    echo 'Périmètre de ' . $perimetre . 'm<br>';
    echo'Surface de ' . $surfaceRound . 'm²<br>';

    echo 'Sur une base de 2 couches avec un pouvoir recouvrant de 10m²/litre, nous aurons besoin de :<br>' . $totalLitre . ' litres de peinture, soit ' ;

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
    
    $content = ob_get_clean();

    require('template.php');