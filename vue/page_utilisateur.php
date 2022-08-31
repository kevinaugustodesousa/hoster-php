<div class="wrapper">
<a id="retour" href="index.php?uc=utilisateur&action=affich">Retour</a>

    <div class="profil d-flex flex-column justify-content-around">
        <div class="d-flex flex-row justify-content-around align-item-center my-5 ">
            <img src="images/user-img.png" alt="" width="20%">
            <div class="d-flex flex-column justify-content-center" style="width: 30%;">
                <h2><?php echo $userProfile->getPrenom().' '.$userProfile->getNom();?></h2>
                <p><?php echo $userProfile->getMail();?></p>
            </div>
            <div class="d-flex flex-column justify-content-center" style="width: 30%;">
            <?php
                $ajouter = $userProfile->getDroit_Ajouter();
                $supprimer = $userProfile->getDroit_Supprimer();
                $admin = $userProfile->getAdmin();
                $autorise = $userProfile->getAutoriser();
                
                if($ajouter == 0)
                {
                    echo '<a href="index.php?uc=utilisateur&action=changerdroit_ajout&id='.$userProfile->getId().'">Donner le droit ajout</a>';
                }
                else
                {
                    echo '<a href="index.php?uc=utilisateur&action=changerdroit_ajout&id='.$userProfile->getId().'">Enlever le droit ajout</a>';
                }
                if($supprimer == 0)
                {
                    echo '<a href="index.php?uc=utilisateur&action=changerdroit_supprimer&id='.$userProfile->getId().'">Donner le droit supprimer</a>';
                }
                else
                {
                    echo '<a href="index.php?uc=utilisateur&action=changerdroit_supprimer&id='.$userProfile->getId().'">Enlever le droit supprimer</a>';
                }
                
                if ($userProfile->getId() != $_SESSION['connecte'])
                {
                    if($admin == 0)
                {
                    echo '<a href="index.php?uc=utilisateur&action=changeradmin&id='.$userProfile->getId().'">Donner le droit admin</a>';
                }
                else
                {
                    echo '<a href="index.php?uc=utilisateur&action=changeradmin&id='.$userProfile->getId().'">Enlever le droit admin</a>';
                }
                    if($autorise == 0)
                    {
                        $phrase = "Autoriser l'accès";
                        echo "<a href='index.php?uc=utilisateur&action=changerautoriser&id=".$userProfile->getId()."'>$phrase</a>";
                    }
                    else
                    {
                        
                        $phrase = "Supprimer l'accès";
                        echo "<a href='index.php?uc=utilisateur&action=changerautoriser&id=".$userProfile->getId()."'>$phrase</a>";
                    }
                }
            ?>
            
        </div>
        </div>
        

    </div>
    
    
    
</div>