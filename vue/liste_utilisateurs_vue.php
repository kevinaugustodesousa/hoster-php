

<div class="wrapper">
  <header>
  <a href="index.php">
        <h1>MyFile.com</h1>
    </a>
          
      <h3>Liste des utilisateurs </h3>
      <div class="d-flex flex-row flex-wrap">
         <?php
          // if ($utilisateur -> getDroitModif())
          //   {
          //       echo '<a href="">Mes Fichiers</a>';
          //   }
        ?>
        <a class="btn-list" href="<?php echo $lien ?>"><?php echo $message ?></a>
      </div>
          
          
    </header>
<table class="table table-striped">
  <thead>

    <!-- deux lignes d'exemple -->
    <tr>
      <th scope="col">#</th>
      <th scope="col">Prénom</th>
      <th scope="col">Nom</th>
      <th scope="col">Email</th>
      <th scope="col">Dèrnière IP</th>
      
      <th></th>
    </tr>
  </thead>
  <tbody>
    
    

    <!-- faut faire un form avec la boucle à l'interieur. -->
    <!-- mettre un input type=checkbox, la Value sera composer de l'$id de l'utilisateur de la liste pr savoir quel input concerne quel utilisateur en back-end-->
    
    <?php
        foreach ($lesUtilisateurs as $uti)
        {
            ?>
              <tr>
                <th scope="row"><?php echo $uti -> getId(); ?></th>
                <td><?php echo $uti -> getPrenom(); ?></td>
                <td><?php echo $uti -> getNom(); ?></td>
                <td><?php echo $uti -> getMail(); ?></td>
                <td><?php echo $uti -> getAddresseIP(); ?></td>
                <td><a href="index.php?uc=utilisateur&action=afficheun&id=<?php echo $uti->getId(); ?>">En savoir plus</a></td>
                
              </tr>

                         
            <?php
        }
    ?>

  
  </tbody>
</table>
</div>

