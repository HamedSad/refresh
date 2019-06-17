<?php ob_start();

    $title= $oneSink['sinkName'] ; ?>

<div class="material">
    
    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour</a>
    
    <div class="materialPic">
        <img src="<?= $oneSink['sinkUrlImage'] ;?>">
    </div>

    <div class="infoProduct">
        <?= $oneSink['sinkName'] . '<br><br>';?>
        <?= $oneSink['sinkPrice'] . '€' ;?>
    </div>
    
</div>

<br> Nos autres lavabos : <br>
    <div class="contain">
        <div class="row">
            <div class="row__inner">
           
            <?php while($all = $sink->fetch()){
        
              echo'<div class="tile">';
    
                echo'<div class="tile__media">';
                        
                    echo '<a href="index.php?action=oneSink&amp;sinkId='. $all['sinkId'] . '">' .
                        '<img class="tile__img" src="' . $all['sinkUrlImage'] . '"<br>' ;
                    
                echo'</div>';
                    echo $all['sinkName'] . '<br>' . $all['sinkPrice'] . '€';
              echo'</div>';  
            }
        
         ?>
        </div>
        </div>
    </div>

 <?php $content = ob_get_clean();

    require('template.php'); 