<?php ob_start(); ?>

<?php $title= "Mon projet " . $projectRoom['roomProjectName'] ; ?>

<h1>Mon projet</h1>
<p>Récapitulatif du projet <?= $projectRoom['roomProjectName'] ;?> </p>
<?php 

    echo $projectRoom['roomProjectName'] . '<br>' ;
    echo 'Pièce de ' . $projectRoom['roomArea'] . ' m²<br>';
    echo 'Hauteur sur plafont de ' . $projectRoom['roomHeight'] . 'm<br>';
    echo 'Sol en ' . $projectRoom['roomGround'] . '<br>';

?>

<h1>Nos recommandations</h1>



quantité de peinture requise : 



 <?php 
    
    $perimetre = sqrt($projectRoom['roomArea']);
    $surface = $perimetre * $projectRoom['roomHeight'];
    $surfaceRound = round($surface, 2);
    echo 'Périmètre de ' . $perimetre . 'm<br>';
    echo'Surface de ' . $surfaceRound . 'm²<br>';

    echo 'Sur une base de 2 couches avec un pouvoir recouvrant de 10m²/litre, nous aurons besoin de :<br>' . round(($surface / 10)*2,2) . ' litres de peinture, soit x pots' ;

; ?>

<br><br>Nos peintures : <br><br>

    <?php 
        while($choice = $paint->fetch()){
            echo ' - ' . $choice['paintName'] . ' à partir de ' . $choice['paintPrice'] . '€<br>';
            
        }
    ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>