<?php

$action = $_GET["admin"] ;

    switch($action){
        case "autorlecture":
            Admin::autorLecture($_POST["choixutil"]);
            break;
		case "autorAjout":
            Admin::autorAjout($_POST["choixutil"]);
            break;
        case "autorModif":
            Admin::autorModif($_POST["choixutil"]);
            break;
        case "suppression":
            Admin::supprUtil($_POST["choixutil"]);
            break;
        default:
            Admin::accesUtil($_POST["choixutil"]);
            break;
    }
?>