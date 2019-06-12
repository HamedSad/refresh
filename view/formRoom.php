<?php ob_start(); ?>

<?php 

    session_start();
?>

<?php $title= "Création de votre projet chambre"; ?>

    <div class="formAddRoom">
        <form action="../index.php?action=addRoom&amp" method="post">   
           
            <?php
            
            echo $_SESSION['userName'];
            echo $_SESSION['userId']; 
            
            ?>
            
            <div>
                <label for="roomProjectName">Nom du projet</label><br>
                <input type="text" id="roomProjectName" name="roomProjectName"><br><br>
            </div>
            
            <div>
                <label for="roomArea">Superficie de votre chambre (en m²)</label><br>
                <input type="text" id="roomArea" name="roomArea"><br><br>
            </div>

            <div>
                <label for="roomGround">Type de sol</label><br>
                <select id="roomGround" name="roomGround"><br>
                    <option value = 1>Carrelage</option>
                    <option value = 2>Lino</option>
                    <option value = 3>Parquet</option>
                    <option value = 4>Moquette</option>
                    <option value = 5>Autre</option>
                </select>
            </div>
            
            <div>
                <label for="roomHeight">Hauteur sur plafont (en m)</label><br>
                <input type="text" id="bathroomArea" name="roomHeight"><br><br>
            </div>
            
            <div>
                <input type="text" id="userId" name="userId" value="
                <?php echo $_SESSION['userId']; ?>" >
            </div>

            <div>
                <input type="submit" />
            </div>

            
            
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>