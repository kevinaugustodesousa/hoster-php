

<div class="wrapper">
    <?php
        include("header.php");
    ?>
    <div class="fichiers-section">
        
        
            <!-- <div class="card-dossier">
                <img class="dossier-img my-2" src="images/folder-img.png" alt="icon de fichier">
                <div class="row">

                        <h3 class="card-fichier-text">Nom du propriétaire</h3>

                </div>  
            </div> -->
            
        <?php
        if (empty($lesDossiers))
        {
            echo "<span>Il n'y a pas de dossiers.</span>";
        }
        else
        {
                foreach ($lesDossiers as $dossier)
                {
                    
                    $nom_dossier = $dossier -> getNom()." ".$dossier -> getPrenom();
                    $id_user = $dossier -> getId();
                    ?>
                        <a href="index.php?uc=fichier&fich=dossier&dos=<?php echo $id_user;?>">
                            <div class="card-dossier">
                                <img class="dossier-img my-2" src="images/folder-img.png" alt="icon de fichier">
                                <div class="row">
                                        <h3 class="card-fichier-text"><?php echo $nom_dossier; ?></h3>
                                </div>  
                            </div>
                        </a>

                                
                    <?php
                }
            }
            ?>
        
    </div>
</div>

