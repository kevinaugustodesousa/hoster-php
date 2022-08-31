<header>
    <a href="index.php">
        <h1>MyFile.com</h1>
    </a>
        <h3>Bienvenue <span class="text-dark" style="text-shadow: 1px 2px 3px #1ac6ff9d;"><?php echo $connectedUser->getPrenom().' '.$connectedUser->getNom(); ?></span> </h3>
        <div class="d-flex flex-row flex-wrap">
        <?php
            if (($connectedUser -> getAdmin()) == 1)
            {
                echo '<a class="header-btn" href="index.php?uc=utilisateur&action=affich">Gérer les utilisateurs</a>';
            }
        ?>
        <a class="header-btn" href="index.php?uc=fichier&fich=dossier&dos=<?php echo $connectedUser->getId();?>">Mes Fichiers</a>
        
        <a class="header-btn" href="index.php?uc=utilisateur&action=deconnexion">Déconnexion</a>
        </div>
    </header>