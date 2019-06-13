<?php ob_start(); ?>

<?php $title= "Mes projets"; ?>

    <div class="roomProject">
    <?php 

        echo "<br><br>Mes projets salle de bain : <br>"; 

        while($dataBathroom = $bath->fetch()){

            if($dataBathroom['bathroomProjectId'] != 0){
                
                
                echo ' -' . '<a href="index.php?action=projectBath&amp;bathId=' . $dataBathroom['bathroomProjectId'] . '">' . $dataBathroom['bathroomProjectName'] . ' édité le ' . $dataBathroom['bathroomDate'] . '</a><br>';
            }
        }
    ?>

    </div>

    <div class="newProject">
        <h1><a href="view/createProject.php">Nouveau projet <br></a></h1>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
