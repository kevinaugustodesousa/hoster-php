<?php
if(session_id() == ''){
    session_start();
 }
include_once("modele/Admin.class.php");
include_once("modele/MonPdo.php");
include_once("modele/Fichier.class.php");
include_once("modele/Utilisateur.class.php");
include_once("head.php");



    if(empty($_GET["uc"]))
    {
        if( !isset($_SESSION['connecte']) )
        {
            include("vue/ConnexionUtil.php");
        }
        else
        {
            $id = $_SESSION['connecte'];
            $resultat = Utilisateur::trouverUtilisateur($id);
            
            $connectedUser = $resultat;
            $lesDossiers = Utilisateur::getDossiers();
            include('vue/accueil.php');
        }
        
    }
    else {
        if( !isset($_SESSION['connecte']) )
        {
            
        }
        else
        {
            
            $id = $_SESSION['connecte'];
            $resultat = Utilisateur::trouverUtilisateur($id);
            
            $connectedUser = $resultat;
        }
        $uc=$_GET["uc"];
    
    
    
    
    switch($uc)
    {
        case "accueil" :
            include("vue/accueil.php") ;
        break;
    
        case "admin" :
            include("controller/controllerAdmin.php");
        break;
        case "fichier" :
            include("controller/controllerFichier.php");
        break;
        case "utilisateur" :
            include("controller/controllerUtilisateur.php");
        break;
    }



}



?>