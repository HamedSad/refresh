<?php ob_start();

    //session_start();
    
    $title= "Connexion"; ?>

    <div class="formAddBath">
        <h1>Connexion</h1>
        <form action="../register.php" method="post">   
                      
            <div>
                <label for="userName">Nom *</label>
                <input type="text" id="userName" name="userName" size="40" required><br><br>
            </div>  
            
            <div>
                <label for="userPassword">Mot de passe *</label>
                <input type="password" id="userPassword" name="userPassword" size="40" required>
            </div><br>
            
            <div>
                <input type="submit" value="Se connecter">
            </div><br>
            
            Pas encore inscrit.e? <a href="inscription.php">Inscription</a>
            
        </form>

    </div>
<?php $content = ob_get_clean();

    require('template.php');