<?php ob_start();

    session_start();

    $title= "Création de votre projet"; ?>

<div class="question">
    
    <a href="../index.php">Mes projets</a>
    <a href="../index.php?action=oneBasket">Mon panier</a>
    <a href="../index.php?action=favourites">Mes favoris</a>
    <a href="../disconnection.php">Déconnexion</a>
    
    <h2>Quelle pièce est à rénover?</h2>
    
    <div class="choice">
        
        <div class="room">
            <a href="formRoom.php"><img src="http://static.cotemaison.fr/medias_11806/w_1362,h_1362,c_crop,x_584,y_0/w_600,h_600,c_fill,g_north/v1523895389/jeux-de-formes-et-de-couleurs-dans-cette-chambre-pleine-de-pep_6045176.jpg"></a><br>
            <p>Chambre</p>
        </div>
        
        <div class="bath">
            <a href="formBath.php"><img src="http://static.cotemaison.fr/medias_11516/w_1011,h_1011,c_crop,x_428,y_0/w_600,h_600,c_fill,g_north/v1497274180/petite-salle-de-bains-avec-demi-verriere_5896409.jpg"></a><br>
            <p>Salle de bain</p>
        </div>
        
        <div class="kitchen">
            <a href="formKitchen.php"><img src="https://image.but.fr/is/image/but/Meubles_Hauts_Et_Bas_ID2287?$categ_niv123$"></a><br>
            <p>Cuisine</p>
        </div>
        
    </div>

</div>

<?php $content = ob_get_clean(); 
    require('template.php');