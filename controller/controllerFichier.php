<?php
switch($_GET["fich"]){
case "ajouter" :
    //test du submit
    if (isset($_POST['submit']))
    {
        //taille max (en octets)
        $maxSize = 5000000;

        //test récupération du fichier
        if($_FILES['uploaded_file']['error'] > 0)
        {
            echo "erreur du transfert";
            die;
        }
        //taille du fichier
        $fileSize = $_FILES['uploaded_file']['size'];
        //test taille max
        if ($fileSize > $maxSize)
        {
            echo "trop grand";
            die;
        }
        //type du fichier
        $fileExt = $_FILES['uploaded_file']['type'];

        $tmpName = $_FILES['uploaded_file']['tmp_name'];
        //remplacement des espaces
        $fileName = str_replace(' ', '', $_FILES['uploaded_file']['name']);
        //vérification de l'existance du dossier
        $nomDossier = $connectedUser->getNom().'_'.$connectedUser->getPrenom().'_'.$connectedUser->getId(); 
        if ( !is_dir( "fichiers/$nomDossier" ) ) {
            mkdir("fichiers/$nomDossier");
        }

        $filePath = "fichiers/$nomDossier/".$fileName;
        move_uploaded_file($tmpName, $filePath);
    }
    $fichier = new Fichier();
    $fichier->setNom($fileName);
    $fichier->setChemin($filePath);
    
    $fichier->setTaille($fileSize);
    $fichier->setType($fileExt);
    $fichier->setIdutil($_SESSION['connecte']);
    Fichier::ajouter($fichier);
    $lesFichiers=Fichier::afficherTous();
    include("vue/fichiers_vue.php") ;
    break;
    case "supprimer" :
        $fichier=Fichier::trouverUnFichier($_GET["supp"]);
        Fichier::supprimer($fichier);
        $lesFichiers=Fichier::afficherTous();
        include("vue/fichiers_vue.php") ;
        break;
     case "acceuil" :

            $lesFichiers=Fichier::afficherTous();
            include("vue/fichiers_vue.php") ;
        break;
        case "dossier" :

            $lesFichiers=Fichier::afficherParIdutil($_GET["dos"]);
            include("vue/fichiers_vue.php") ;
        break;
        case "doajouter" :
            //test du submit
            if (isset($_POST['submit']))
            {
                //taille max (en octets)
                $maxSize = 5000000;
        
                //test récupération du fichier
                if($_FILES['uploaded_file']['error'] > 0)
                {
                    echo "erreur du transfert";
                    die;
                }
                //taille du fichier
                $fileSize = $_FILES['uploaded_file']['size'];
                //test taille max
                if ($fileSize > $maxSize)
                {
                    echo "trop grand";
                    die;
                }
                //type du fichier
                $fileExt = $_FILES['uploaded_file']['type'];
        
                $tmpName = $_FILES['uploaded_file']['tmp_name'];
                //remplacement des espaces
                $fileName = str_replace(' ', '', $_FILES['uploaded_file']['name']);
                //vérification de l'existance du dossier
                $nomDossier = $connectedUser->getNom().'_'.$connectedUser->getPrenom().'_'.$connectedUser->getId(); 
                if ( !is_dir( "fichiers/$nomDossier" ) ) {
                    mkdir("fichiers/$nomDossier");
                }
        
                $filePath = "fichiers/$nomDossier/".$fileName;
                move_uploaded_file($tmpName, $filePath);
            }
            $fichier = new Fichier();
            $fichier->setNom($fileName);
            $fichier->setChemin($filePath);
            
            $fichier->setTaille($fileSize);
            $fichier->setType($fileExt);
            $fichier->setIdutil($_SESSION['connecte']);
            Fichier::ajouter($fichier);
            $lesFichiers=Fichier::afficherParIdutil($_SESSION['connecte']);
            include("vue/fichiers_vue.php") ;
            break;
            case "dosupprimer" :
                $fichier=Fichier::trouverUnFichier($_GET["supp"]);
                Fichier::supprimer($fichier);
                $lesFichiers=Fichier::afficherParIdutil($_GET["dos"]);
                include("vue/fichiers_vue.php"); 
                break;
            case "telecharger" :
                $fichier=Fichier::trouverUnFichier($_GET["tel"]);
                file_get_contents($fichier->getChemin());
                $lesFichiers=Fichier::afficherTous();
                include("vue/fichiers_vue.php") ;
                break;
            case "dotelecharger" :
                $fichier=Fichier::trouverUnFichier($_GET["tel"]);
                $nom = $fichier->getNom();
                $chemin = $fichier->getChemin();
                $taille = $fichier->getTaille();
                Fichier::forcerTelechargement($nom, $chemin, $taille);

                $lesFichiers=Fichier::afficherParIdutil($_GET["dos"]);
                include("vue/fichiers_vue.php"); 
            break;
            case "dossier2":
                $id = $_GET["id"];
                $lesFichiers=Fichier::afficherParIdutil($id);
                if($_SESSION["autorisation"]->getId() == 0)
                {
                    include("vue/fichiers_vue.php");
                }
                else if($_SESSION["autorisation"]->getId() == $lesFichiers[0]->getIdutil())
                {
                    $ut=Utilisateur::trouverUtilisateur($_SESSION["autorisation"]->getId());
                    $da=$ut->getDroit_ajouter();
                    $ds=$ut->getDroit_supprimer();
                    if($da=="true"&&$ds=="true"){
                        include("??") ;      
                    } 
                    else if($da=="false"&& $ds=="true"){
                        include("??") ;
                    }
                    else if($da=="true"&& $ds=="false"){
                        include("??") ;
                    }
                    else if($da=="false"&& $ds=="false"){
                        include("??") ;
                    }
                } else{
                    include("??");
                }
            break;
            case"afficheun":
                Fichier::trouverFichier($_GET["??"]);
                include("??");
            break;
}
?>