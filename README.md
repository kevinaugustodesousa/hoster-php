# Site hoster php
Ceci est un site d'hébergement de fichier. Les utilisateurs peuvent créer un compte et uploader, supprimer et télécharger leurs fichiers.
Il y a aussi la possibilité d'avoir des comptes administrateurs qui permettent d'avoir plusieurs fonctionnalités dont la gestion des droits utilisateurs.
## Installation
	- Avoir un serveur apache (avec une BDD MySQL)
	- Crée une nouvelle base portant le nom "adminfichier"
	- Executer le script "adminfichier.sql" dans la base de données que vous avez crée (adminfichier)
	- Mettre à jour l'utilisateur de la BDD dans le fichier "modele/MonPdo.php" (lignes 7 et 8 ). 

## Login du site :
	Nom d'utilisateur : test@testmail.com
	Mot de passe : toto
