<?php ob_start();  

    
    $title= 'Confirmation de suppression du projet ' . $sup['bathroomProjectName']; ?>
    
    <div class="confirmation">

        <p>Etes-vous certain de vouloir supprimer le projet <?= $sup['bathroomProjectName'] ?> ?</p><br>
        
        <div class="choice" align="center">
            <?= '<a class="btn btn-danger" href="index.php?action=delProjectBath&amp;bathroomProjectId=' . $sup['bathroomProjectId'] . ' "><span class="glyphicon glyphicon-remove"></span> Oui </a>'; ?>
            <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Non</a>
        </div>
        
        <div style="text-align: center">
            <img src="https://cdn.dribbble.com/users/164889/screenshots/1192618/loading-red-spot.gif" align="center"><br>
        </div>

    </div>



<?php $content = ob_get_clean(); 

    require('template.php');