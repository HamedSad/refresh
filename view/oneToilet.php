<?php ob_start();

    $title= $oneToilet['toiletsName'] ; ?>

<div class="material">
    
    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour</a>
    
    <div class="materialPic">
        <img src="<?= $oneToilet['toiletsUrlImage'] ;?>">
    </div>

    <div class="infoProduct">
        <?= $oneToilet['toiletsName'] . '<br><br>';?>
        <?= $oneToilet['toiletsPrice'] . '€' ;?>
    </div>
    
</div>
    
    <br> Nos toilettes : <br>
    <div class="contain">
        <div class="row">
            <div class="row__inner">
           
            <?php while($all = $wc->fetch()){
        
              echo'<div class="tile">';
    
                echo'<div class="tile__media">';
                        
                    echo '<a href="index.php?action=oneToilet&amp;toiletsId='. $all['toiletsId'] . '">' .
                        '<img class="tile__img" src="' . $all['toiletsUrlImage'] . '"<br>' ;
                    
                echo'</div>';
                    echo $all['toiletsName'] . '<br>' . $all['toiletsPrice'] . '€';
              echo'</div>';  
            }
        
         ?>
        </div>
        </div>
    </div>

 <?php $content = ob_get_clean();

    require('template.php'); 