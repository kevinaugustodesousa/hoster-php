
 <?php
use function PHPSTORM_META\type;
?>
<link rel="stylesheet" href="../style/styleaccueil.css">
    <link rel="stylesheet" href="../style/stylelisteutilisateurs.css">

<div class="wrapper">
    <?php
        include("header.php");
    ?>
    <div class="fichiers-section">
        <nav>
            
        </nav>
       
        <?php
        if (empty($lesFichiers))
        {
            echo "<span>Vous n'avez pas uploadé de fichiers.</span>";
        }
       else
       {
            foreach ($lesFichiers as $fichier)
            {
                ?>
                    <div class="card-fichier">
                        <img class="fichier-img my-2" src="images/fileicon.png" alt="icon de fichier">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 class="card-fichier-text"><?php echo $fichier -> getNom() ?></h3>
                                <br>
                                <p class="card-fichier-text"><?php echo $fichier -> getTaille() ?> ko</p>
                                
                                
                            </div>
                            <div class="col-md-2 d-flex flex-column align-items-center ">
                                <a href="index.php?uc=fichier&fich=dotelecharger&tel=<?php echo $fichier->getId();?>&dos=<?php echo $fichier->getIdUtil()?>"> <span class="py-auto fa-solid fa-download fa-2x basic-color"></span></a>
                                <?php
                                    if (($connectedUser->getDroit_supprimer() == 1 & $connectedUser->getId() == $_GET['dos'])|| $connectedUser->getAdmin()==1)
                                    {
                                        echo '
                                        <a href="index.php?uc=fichier&fich=dosupprimer&supp='.$fichier->getId().'&dos='.$fichier->getIdUtil().'"> <span class="fa-solid fa-trash fa-2x" style="color: #c56d6d;"></span></a>
                                        ';
                                    }
                                ?>

                            </div>
                        </div>  
                    </div>       
                <?php
            }
        }
?>

<?php
    if (($connectedUser->getDroit_ajouter() == 1 & $connectedUser->getId() == $_GET['dos'])|| $connectedUser->getAdmin()==1)
    {
        echo '<button type="button" class="card-fichier" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color:white; border:none">
        <div class="mx-auto my-auto" href="" data-msg="Ajouter un fichier">
            <span class="fa-solid fa-plus fa-7x basic-color plus"></span> 
        </div>
    </button>';
    }
?>
        
    </div>
</div>

<!-- à réécrire -->


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un fichier</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="index.php?uc=fichier&fich=doajouter&dos=<?php echo $connectedUser->getId();?>" method="POST" enctype="multipart/form-data">
            <input type="file" name="uploaded_file" required>
        
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <input class="valide-btn" type="submit" name="submit" value="Valider">
        </form>
      </div>
    </div>
  </div>
</div>

