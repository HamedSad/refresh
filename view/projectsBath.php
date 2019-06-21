<?php ob_start(); 

    $title= "Mes projets"; ?>

    <div class="wrapp">
 
        <div class="roomProject">
        <?php 

            echo "<br><br><h3>Mes projets salle de bain : </h3>"; 

            echo '<ul>';

            while($dataBathroom = $bath->fetch()){    

                if($dataBathroom['bathroomProjectId'] != 0){

                    echo '<li>' . '<a href="index.php?action=projectBath&amp;bathId=' . $dataBathroom['bathroomProjectId'] . '">' . $dataBathroom['bathroomProjectName'] . ' édité le ' . date("d/m/Y", strtotime($dataBathroom['bathroomDate'])) . '</a><br></li>';
                }
            }
            echo '</ul>';
        ?>

        </div>
    
    </div>

    <div class="newProject">
        <h1><a href="view/createProject.php">Nouveau projet <br></a></h1>
    </div>
<?php $content = ob_get_clean(); 

    require('template.php');
