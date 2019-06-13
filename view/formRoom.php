<?php ob_start(); 

    session_start();

    setlocale(LC_TIME, 'fr_FR');
    $roomDate = strftime('%d/%m/%Y %H:%M:%S');
 
    $title = "Création de votre projet chambre"; ?>

    <div class="formAddRoom">
        <h1>Création de votre projet chambre</h1>
        <form action="../index.php?action=addRoom&amp" method="post">   
            
            <div>
                <label for="roomProjectName">Nom du projet</label>
                <input type="text" id="roomProjectName" name="roomProjectName" size="40" required><br><br>
            </div>
            
            <div>
                <label for="roomArea">Superficie de votre chambre (en m²)</label>
                <input type="number" id="roomArea" name="roomArea" size="5" step="0.01" required><br><br>
            </div>
            
            <div>
                <label for="roomHeight">Hauteur sur plafond (en m)</label>
                <input type="number" id="bathroomArea" name="roomHeight" size="5" step="0.01" required><br><br>
            </div>

            <div>
                <label for="roomGround">Type de sol</label>
                <select id="roomGround" name="roomGround">
                    <option value = 1>Carrelage</option>
                    <option value = 2>Lino</option>
                    <option value = 3>Parquet</option>
                    <option value = 4>Moquette</option>
                    <option value = 5>Autre</option>
                </select>
            </div><br>       
            
            <div class="userId">
                <input type="text" id="userId" name="userId" value="
                <?php echo $_SESSION['userId']; ?>" >
            </div>
            
            <input type="hidden" name="roomDate" value="<?php echo $roomDate ; ?>" >

            <div>
                <input type="submit" value="Valider">
            </div>

            
            
<?php $content = ob_get_clean(); 

require('template.php'); 